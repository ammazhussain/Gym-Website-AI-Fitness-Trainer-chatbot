<?php
error_reporting(E_ALL); // Enable error reporting for debugging
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM register";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <style>
                .header, .footer {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: orange;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #111;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            width: 100%;
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
        .hero-1 {
            height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/breadcrumb-bg.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .hero-1 h1 {
            font-size: 4em;
        }
        .container {
            padding: 0;
            margin: 0;
            border: 0;
        }
        .content {
            margin:0;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .bottom-right {
            position: absolute;
            text-align: center;
        }
        .bottom-right h4 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .bottom-right h1 {
            font-size: 3em;
            line-height: 1.2;
        }
        span{
            color: orange;
        }
        .size_text{
            font-size: 80px;
        }
        #align-boxes{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: auto;
            background-color: black;
            padding: 25px;
        }
        #align-boxes div{
            color: white;
            text-align: center;
            margin: 5px;
        }
        .logo-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .logo-btn img {
            width: 100px;
        }

        .logo-btn:hover {
            color: orange;
        }
        .container {
            margin: 0;
            padding: 0;
            border: 0;
            position: relative;
            width: 100%;
            height: auto;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .overlay-text {
            position: absolute;
            bottom: 0;
            left: 0;
            width: auto;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        ------
        body, html {
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .hero-section {
            height: 100vh;
            width: 100%;
            background-image: url('images/Background-1.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .center-content {
            color: white;
            text-align: center;
        }

        .center-content h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .center-content p {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            color: darkorange;
            background-color: white;
        }
        <---------------->
         * {
             padding: 0;
             margin: 0;
             box-sizing: border-box;
         }

        body, html {
            height: 100%;
            width: 100%;
            background-color: #1a1a1a;
            font-family: Arial, sans-serif;
            color: white;
        }

        .pricing-section {
            text-align: center;
            padding: 50px 20px;
        }

        .pricing-section h2 {
            color: orange;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .pricing-section h1 {
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .pricing-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .pricing-card {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, background-color 0.3s;
            width: 250px;
        }

        .pricing-card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .pricing-card h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: orange;
        }

        .pricing-card p {
            font-size: 1em;
            margin-bottom: 20px;
        }

        .pricing-card ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .pricing-card ul li {
            margin-bottom: 10px;
        }

        .enroll-button {
            background-color: #333;
            border: 2px solid orange;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
        }

        .enroll-button:hover {
            background-color: orange;
            color: black;
        }

        .pricing-card.highlight {
            background-color: white;
            color: black;
            transform: scale(1.1);
        }

        .pricing-card.highlight h2 {
            color: orange;
        }

        .pricing-card.highlight .enroll-button {
            background-color: orange;
            color: black;
            border: 2px solid black;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-top {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #444;
        }

        .footer-top .contact-item {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .footer-top .contact-item i {
            font-size: 20px;
            margin-right: 10px;
            color: #ff6600;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            text-align: left;
        }

        .footer-logo img {
            width: 50px;
            margin-bottom: 10px;
        }

        .footer-logo p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-links,
        .footer-support,
        .footer-tips {
            max-width: 200px;
        }

        .footer-links h4,
        .footer-support h4,
        .footer-tips h4 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .footer-links ul,
        .footer-support ul,
        .footer-tips ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li,
        .footer-support ul li,
        .footer-tips ul li {
            margin-bottom: 8px;
        }

        .footer-links ul li a,
        .footer-support ul li a,
        .footer-tips ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links ul li a:hover,
        .footer-support ul li a:hover,
        .footer-tips ul li a:hover {
            text-decoration: underline;
        }

        .footer-tips ul li span {
            display: block;
            font-size: 12px;
            color: #888;
            margin-top: 2px;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            margin: 0 5px;
            font-size: 16px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #ff6600;
        }
        .calculator {
            background-color: black;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .calculator div {
            margin-bottom: 10px;
        }
        .calculator input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }
        .calculator button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="hero-1">
        <nav>
            <a href="#"><img src="images/logo.png" alt="Logo"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="home.html"><button class="btn">Home</button></a></li>
                    <li><a href="About.html"><button class="btn">About Us</button></a></li>
                    <li><a href="services.html"><button class="btn">Services</button></a></li>
                    <li><a href="BMI.php"><button class="btn">BMI</button></a></li>
                    <li><a href="index.html"><button class="btn">AI Chatbot</button></a></li>

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
    <h1><span>Records</span></h1>
    <table >
        <tr style="color: #000;">
            <th >Id No</th>
            <th >First Name</th>
            <th >Last Name</th>
            <th >Email</th>
            <th >Address</th>
            <th >Phone Number</th>
            <th >Postal Code</th>
            <th >Package</th>
        </tr>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td> <!-- Assuming 'id' is the correct column name for the primary key -->
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['postal_code']); ?></td>
                    <td><?php echo htmlspecialchars($row['select_package']); ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="8">No records found</td>
            </tr>
        <?php } ?>
    </table>
</div>

</div>
</div>
<footer class="footer">
    <div class="footer-top">
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/ADDRESS-Logo.png" alt="Logo" style="width: 100px"></a>
            </p>
            <i class="fas fa-map-marker-alt"></i>
            <span>Cliffton Town, Rawalpipndi</span>
        </div>
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/NUMBER-Logo.png" alt="Logo"></a>
            </p>
            <i class="fas fa-phone-alt"></i>
            <span>125-711-811 | 125-668-886</span>
        </div>
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/MAIL-LOGO.png" alt="Logo"></a>
            </p>
            <i class="fas fa-envelope"></i>
            <span>getfit@gmail.com</span>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-logo">
            <img src="images/logo.png" alt="Gym Logo" style="width: 170px">
            <p>Join us to achieve your dream physique. With hardwork and<br>dedication everything is achieveable.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"; style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-twitter"  style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-youtube"  style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-instagram" style="color: grey;"></i></a>
                <a href="#"><i class="fas fa-envelope" style="color: grey;"></i></a>
            </div>
        </div>

        <div class="footer-links">
            <h4>Useful links</h4>
            <ul style="color: grey";>
                <li><a href="About.html"  style="color: grey;">About</a></li>
                <li><a href="Regi.php" style="color: grey;">Blog</a></li>
                <li><a href="Regi.php" style="color: grey;">Classes</a></li>
                <li><a href="Regi.php" style="color: grey;">Contact</a></li>
            </ul>
        </div>
        <div class="footer-support">
            <h4>Support</h4>
            <ul style="color:grey";>
                <li><a href="login.php"  style="color: grey;;">Login</a></li>
                <li><a href="Regi.php"  style="color: grey;">My account</a></li>
                <li><a href="Regi.php"  style="color: grey;";>Subscribe</a></li>
                <li><a href="Regi.php"  style="color: grey;";>Contact</a></li>
            </ul>
        </div>
        <div class="footer-tips">
            <h4>Tips & Guides</h4>
            <ul>
                <li><a href="#">Physical fitness may help prevent depression, anxiety</a> <span>3 min read | 20 Comment</span></li>
                <li><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a> <span>3 min read | 20 Comment</span></li>
            </ul>
        </div>
    </div>
</footer>
<div class="footer">
    <p>&copy; 2024 Gym Management System. All rights reserved.</p>
</div>

    </body>
</html>