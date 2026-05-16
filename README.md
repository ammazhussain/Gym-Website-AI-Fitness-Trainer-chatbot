
# 🧠 AI Fitness Trainer & Gym Website

## Overview

This project is a full-featured **AI-powered Fitness Trainer Chatbot** integrated into a professionally designed **Gym Website**. It combines natural language understanding with personalized fitness plan generation based on user input like weight, age, height, and fitness goals.

The chatbot is hosted using **Flask** and leverages **spaCy NLP**, **TF-IDF vectorization**, and **KMeans clustering** to deliver adaptive workout and diet recommendations. The front end is developed in **HTML/CSS/Bootstrap**, providing a clean and interactive user experience.

---

## 💡 Features

### Chatbot Intelligence
- ⚡ Natural language processing via `spaCy` for input extraction
- 📊 Clustering with `KMeans` to understand fitness goals
- 🧮 BMI calculation with classification (underweight, healthy, etc.)
- 🧠 Dynamic workout generation based on user data and goal
- 🥗 Optional diet plan recommendation

### Web Functionality
- 🏋️ Homepage, About Us, Services, and Team sections
- 🗓️ Appointment form (PHP-based)
- 💬 Chatbot page integrated with backend API
- 📥 BMI calculator and contact forms
- 👤 User login, registration, and workout history (PHP + form-based)

---

## 🧠 AI Workflow (Backend)

The core logic is defined in `app.py` and `chatbot.py`.

### Data Used
- `dataset/modified_megaGymDataset_v6.csv`: Contains curated exercise plans categorized by:
  - Goal (e.g. fat-loss, muscle-gain)
  - Category (e.g. Back, Chest, Legs)
  - Type (e.g. Home, Gym)

### Process
1. **User Input**: Age → Height → Weight → Goal → Workout Type → Focus Area
2. **BMI Calculation**: Based on height and weight, classified accordingly.
3. **Goal Clustering**: KMeans clusters fitness goals into groups.
4. **Workout Plan Generation**: Selected from the dataset using filters; fallback logic used for sparsity.
5. **Final Output**: A 6-day dynamic plan + diet suggestion.

---

## 📁 Project Structure

```plaintext
AI Chatbot Final/
│
├── app.py                  # Main Flask API backend
├── chatbot.py              # Workout plan logic
├── dataset/
│   └── modified_megaGymDataset_v6.csv
│
├── chat.html               # Chatbot frontend interface
├── home.html, About.html   # Main site pages (Bootstrap-based)
├── BMI.php, login.php      # PHP forms for BMI and login
├── appointment.php         # Appointment submission
├── services.html, Team.html
├── results/                # Saved user-generated plans
├── images/, gallery/, hero/, team/  # UI/UX images and media
```

---

## 🚀 How to Run

### Backend (Flask)
```bash
pip install -r requirements.txt  # includes Flask, pandas, spacy, sklearn
python -m spacy download en_core_web_sm
python app.py
```

Visit `http://127.0.0.1:5000` or connect your frontend via `/chatbot` API endpoint.

### Frontend
Just open `home.html` or `chat.html` in your browser. Connects to Flask server running locally.

---

## 📸 Recommended Screenshots

For GitHub:
- Chatbot conversation (from `chat.html`)
- Home page
- BMI Calculator section
- Appointment page
- Mobile view demo (optional)

---

## 👥 Authors

- **Chaudhary Ammaz Hussain**  
- **Muhammad Anas**  
📍 *Bahria University Islamabad*

---

## 📦 Tech Stack

- Python, Flask, spaCy, scikit-learn, Pandas
- HTML5, CSS3, Bootstrap
- PHP (for appointments, forms)
- JavaScript (light usage in front end)

---

## 📌 Note

The chatbot backend must be running locally for `chat.html` to function correctly.

If deployed online, update the AJAX/JS calls in `chat.html` to use the hosted API endpoint.

