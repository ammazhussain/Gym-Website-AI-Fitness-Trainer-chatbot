import pandas as pd
import sys

# Define workout categories by day
CATEGORIES = {
    "Monday": "Back",
    "Tuesday": "Chest",
    "Wednesday": "Legs",
    "Thursday": "Shoulders",
    "Friday": "Arms",
    "Saturday": "Core",
    "Sunday": "Rest Day"
}

# Function to generate a workout plan
def generate_workout_plan(weight, height, workout_type, goal, dataset):
    """
    Generates a custom workout plan with 4 exercises per day, handling filtering and fallbacks.
    """
    plan = {}

    for day, category in CATEGORIES.items():
        if category == "Rest Day":
            plan[day] = [{"Exercise": "Rest Day", "Sets/Duration": "N/A", "Reps": "N/A"}]
            continue

        # Filter exercises by type, goal, and category
        filtered_data = dataset[
            (dataset['Type'].str.strip().str.lower() == workout_type.strip().lower()) &
            (dataset['Goal'].str.strip().str.lower() == goal.strip().lower()) &
            (dataset['Category'].str.strip().str.lower() == category.strip().lower())
        ]

        # Handle cases where fewer than 4 exercises are available
        if len(filtered_data) >= 4:
            exercises = filtered_data.sample(4, replace=False)
        else:
            fallback_data = dataset[
                (dataset['Type'].str.strip().str.lower() == workout_type.strip().lower()) &
                (dataset['Goal'].str.strip().str.lower() == "general fitness") &
                (dataset['Category'].str.strip().str.lower() == category.strip().lower())
            ]
            combined_data = pd.concat([filtered_data, fallback_data]).drop_duplicates()
            exercises = combined_data.sample(4, replace=len(combined_data) < 4)

        # Prepare the exercise list
        plan[day] = [
            {
                "Exercise": row['Exercise'],
                "Sets/Duration": row['Sets/Duration'] if 'Sets/Duration' in row else "N/A",
                "Reps": "12 reps" if 'Sets/Duration' in row else "N/A"
            }
            for _, row in exercises.iterrows()
        ]

    return plan


# Read inputs passed from PHP script
weight = float(sys.argv[1])
height = float(sys.argv[2])
workout_type = sys.argv[3]
goal = sys.argv[4]

# Load the dataset
dataset = pd.read_csv('dataset/modified_megaGymDataset_v6.csv')

# Generate the workout plan
plan = generate_workout_plan(weight, height, workout_type, goal, dataset)

# Print the workout plan
for day, exercises in plan.items():
    print(f"{day} ({CATEGORIES[day]} Exercises):")
    for exercise in exercises:
        print(f"  {exercise['Exercise']} - {exercise['Sets/Duration']} sets of {exercise['Reps']}")
