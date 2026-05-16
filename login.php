<?php
session_start();
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password
$database_name = "gym_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Input validation
    if (empty($email) || empty($password)) {
        echo "Please fill out both fields.";
        exit();
    }

    // Sanitize email input
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password);
        $stmt->fetch();

        // Verify password
        if ($password == $stored_password) {  // Note: For security, you should use password_verify() if passwords are hashed.
            // Password is correct, start a session
            $_SESSION['email'] = $email;
            header("Location: home.html"); // Redirect to a protected page
            exit();
        } else {
          echo  "<p style='color: red;'>Incorrect password.</p>";

        }
    } else {
        echo "<p style='color: red;'>No user found with that email.</p>";
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('hero/hero-2.jpg'); /* Make sure to replace 'background.jpg' with the path to your background image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            padding: 20px;
        }

        .registration-box {
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            background: rgba(0, 0, 0, 0.3);
            animation: growFromCorners 1s ease-out;
            gap: 20px;
        }

        @keyframes growFromCorners {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        h2 {
            grid-column: span 2;
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group.full-width {
            grid-column: span 2;
        }

        .input-group input[type="submit"] {
            background: orange;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .input-group input[type="submit"]:hover {
            background: white;
            color: orange;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

         nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background for the navbar */
            padding: 10px 20px;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav img {
            width: 100px; /* Adjust logo size as needed */
        }
        .nav-links ul {
            list-style: none;
            display: flex;
        }
        .nav-links ul li {
            margin: 0 10px;
            position: relative; /* To position dropdown relative to the parent */
        }
        .nav-links ul li a {
            text-decoration: none;
        }
        .btn {
            border-radius: 5px;
            color: white;
            background-color: black;
            opacity: 2s;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        .btn:hover {
            color: orange;
            width: 60px;
            opacity: 1s;
        }

        /* Dropdown styles */
        .nav-links ul li .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            min-width: 60px;
        }

        .nav-links ul li:hover .dropdown {
            display: block;
        }

        .dropdown a {
            display: block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
        }
        .dropdown a:hover {
            background-color: #444;
        }
        .btn_dropdown {
            border-radius: 5px;
            color: white;
            background-color: black;
            opacity: 2s;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        .btn_dropdown:hover {
            color: orange;
            width: 115px;
            opacity: 1s;
        }
        #align-boxes{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: auto;
            background-color: black;
            padding: 5px;
        }
        #align-boxes div{
            color: white;
            text-align: center;
            margin: 5px;
        }
    </style>
</head>
<body>
        <nav>
            <a href="#"><img src="images/logo.png" alt="Logo"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="home.html"><button class="btn">Home</button></a></li>
                    <li><a href="About.html"><button class="btn">About Us</button></a></li>
                    <li><a href="services.html"><button class="btn">Services</button></a></li>
                    <li><a href="BMI.php"><button class="btn">BMI</button></a></li>
                    <li><a href="Team.html"><button class="btn">Our Team</button></a></li>
                    <li class="records" style=" padding-top: 9px; font-weight:lighter; font-size: 14px;">
                        <a href="#" class="btn">Records</a>
                        <div class="dropdown">
                            <a href="appointment_test.php" class="btn_dropdown">Appointments</a>
                            <a href="records_test.php" class="btn_dropdown">Register</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
<div class="container">
    <div class="registration-box">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div id="align-boxes" style="background-color: rgba(0, 0, 0, 0.2)">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <div class="input-group full-width">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div>
</body>
</html>
