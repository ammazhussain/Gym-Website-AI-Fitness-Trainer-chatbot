import pandas as pd
import spacy
import re
from flask import Flask, request, jsonify
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.cluster import KMeans

# Initialize
nlp = spacy.load("en_core_web_sm")
app = Flask(__name__)
state_store = {}

# Load dataset
try:
    df = pd.read_csv("dataset/modified_megaGymDataset_v6.csv")
except FileNotFoundError:
    raise Exception("CSV file not found. Please ensure the path is correct.")

if 'goal_corpus' not in df.columns and 'Goal' in df.columns:
    df['goal_corpus'] = df['Goal']

# Vectorize and cluster
vectorizer = TfidfVectorizer(stop_words='english')
X = vectorizer.fit_transform(df['goal_corpus'].fillna(''))
kmeans = KMeans(n_clusters=5, random_state=42, n_init=10).fit(X)
df["GoalCluster"] = kmeans.labels_  # 🛠️ FIX: Add GoalCluster column to dataset

# Questions
questions = [
    "Great! First, how old are you?",
    "And your height? (e.g., 170 cm, 1.75 m, 5'9\")",
    "And your weight? (e.g., 70 kg, 150 lbs)",
    "Thanks! Let’s calculate your BMI.",
    "What is your fitness goal? (e.g., get lean, bulk up, cut fat)",
    "What’s your workout experience? (beginner/intermediate/advanced)",
    "Do you prefer gym or home workouts?",
    "Which area do you want to target? (arms/abs/full body/legs/shoulders/back/core)"
]

# Utilities
def extract_number(text):
    for token in nlp(text):
        if token.like_num:
            return float(token.text)
    match = re.search(r"\d+", text)
    return float(match.group()) if match else None

def parse_height(text):
    if "'" in text or "ft" in text:
        match = re.match(r"(\d+).*(\d+)", text)
        if match:
            ft, inch = int(match.group(1)), int(match.group(2))
            return round(ft * 30.48 + inch * 2.54, 1)
    if "cm" in text or text.strip().isdigit():
        val = extract_number(text)
        return val if 90 <= val <= 250 else None
    if "m" in text:
        val = extract_number(text)
        return round(val * 100, 1) if 0.9 <= val <= 2.5 else None
    return None

def parse_weight(text):
    if "lb" in text or "pound" in text:
        val = extract_number(text)
        return round(val * 0.4536, 1) if val else None
    val = extract_number(text)
    return val if 30 <= val <= 250 else None

@app.route("/chat", methods=["POST"])
def chat():
    data = request.json
    convo = data.get("conversation", [])
    user_id = data.get("user_id", "default")  # fallback for now

    answers = [msg["content"].strip().lower() for msg in convo if msg["role"] == "user"]
    step = len(answers) - 1

    if user_id not in state_store:
        state_store[user_id] = {}

    state = state_store[user_id]

    if not answers or answers[0] not in ["yes", "ready", "sure", "let's go"]:
        return jsonify({"reply": "Hi! I'm your AI Personal Trainer 🤖💪\nLet's build your perfect workout. Ready?"})

    try:
        if step == 0:
            return jsonify({"reply": questions[0]})
        elif step == 1:
            age = extract_number(answers[1])
            if not age or not (10 <= age <= 80):
                return jsonify({"reply": "Please enter a valid age (10–80)."})
            state["age"] = age
            return jsonify({"reply": questions[1]})
        elif step == 2:
            h = parse_height(answers[2])
            if not h:
                return jsonify({"reply": "Please enter a valid height like 170 cm or 5'9\"."})
            state["height"] = h
            return jsonify({"reply": questions[2]})
        elif step == 3:
            w = parse_weight(answers[3])
            if not w:
                return jsonify({"reply": "Please enter a valid weight in kg or lbs."})
            state["weight"] = w
            h_m = state["height"] / 100
            bmi = round(w / (h_m * h_m), 1)
            label = "Underweight" if bmi < 18.5 else "Normal" if bmi < 25 else "Overweight" if bmi < 30 else "Obese"
            return jsonify({"reply": f"📊 Your BMI is {bmi} ({label}).\n{questions[4]}"})
        elif step == 4:
            vec = vectorizer.transform([answers[4]])
            state["goal_cluster"] = int(kmeans.predict(vec)[0])
            return jsonify({"reply": questions[5]})
        elif step == 5:
            state["level"] = answers[5]
            return jsonify({"reply": questions[6]})
        elif step == 6:
            state["type"] = answers[6]
            return jsonify({"reply": questions[7]})
        elif step == 7:
            state["target"] = answers[7]
            cluster = state.get("goal_cluster", 0)
            plan_df = df[df["GoalCluster"] == cluster]

            if "level" in state and "Level" in plan_df.columns:
                plan_df = plan_df[plan_df["Level"].astype(str).str.lower().str.contains(state["level"])]
            if "type" in state and "Type" in plan_df.columns:
                plan_df = plan_df[plan_df["Type"].astype(str).str.lower().str.contains(state["type"])]
            if "target" in state and "Category" in plan_df.columns:
                mask = pd.Series(False, index=plan_df.index)
            for t in state["target"].split():
                mask |= plan_df["Category"].astype(str).str.lower().str.contains(t)
                plan_df = plan_df[mask]


            if plan_df.empty:
                plan_df = df.sample(21)

            days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
            plan = "📅 Here's your personalized 7-day workout plan:\n\n"

            # Repeat exercises if less than 21 rows
            repeated = pd.concat([plan_df] * ((21 // len(plan_df)) + 1), ignore_index=True) if len(plan_df) < 21 else plan_df
            repeated = repeated.sample(21, replace=False)

            for i, day in enumerate(days):
                sub = repeated.iloc[i * 3:i * 3 + 3]
                plan += f"{day}:\n"
                for ex, sets, reps in sub[["Exercise", "Sets/Duration", "Reps"]].values:
                    plan += f"  - {ex} | {sets} | {reps}\n"
                plan += "\n"

            plan += "Would you like a tailored diet plan too?"

            return jsonify({"reply": plan})
        elif step == 8:
            if "yes" in answers[8]:
                return jsonify({"reply": "🥗 Here's your tailored diet plan:\nBreakfast: Oats & eggs\nLunch: Grilled chicken + salad\nDinner: Steamed fish & rice\nSnacks: Almonds & Greek yogurt"})
            else:
                return jsonify({"reply": "Alright! You can ask for it anytime 💡"})

    except Exception as e:
        return jsonify({"reply": f"An error occurred: {str(e)}"})

    return jsonify({"reply": questions[step] if step < len(questions) else "Let’s continue!"})

if __name__ == "__main__":
    app.run(debug=True)
