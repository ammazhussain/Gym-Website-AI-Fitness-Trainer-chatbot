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
            width: 240px;
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
            background-color: rgba(0, 0, 0, 0.2); /* Semi-transparent background for the navbar */
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
        }

        .nav-links ul li a {
            text-decoration: none;
        }

        .btn {
            border-radius: 5px;
            color: white;
            background-color: rgba(0, 0, 0, 0.2);
            opacity: 2s;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }

        .btn:hover {
            color: orange;
            width: 100px;
        }
        #align-boxes{
            width: 275px;
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
        <div class="registration-box">
            <h2>Appointment</h2>
           <?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "gym";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table only once
$create_table_query = "CREATE TABLE IF NOT EXISTS appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    trainer VARCHAR(30) NOT NULL,
    datetime DATETIME NOT NULL
)";
mysqli_query($conn, $create_table_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $trainer = $_POST['trainer'];
    $datetime = $_POST['datetime'];

    // Insert the data
    $insert_query = "INSERT INTO appointment (first_name, last_name, trainer, datetime) 
                     VALUES ('$first_name', '$last_name', '$trainer', '$datetime')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<p style='color: green;'>Appointment booked successfully.</p>";
    } else {
        echo "<p style='color: red;'>ERROR: Could not book appointment. " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>


           <form action="appointment.php" method="post">
    <div id="align-boxes" style="background-color: rgba(0, 0, 0, 0.2)">
        <div>
            <div class="input-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="input-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="input-group">
                <label for="trainer">Select Trainer:</label>
                <select id="trainer" name="trainer">
                    <option value="Sam">Sam</option>
                    <option value="Anas">Anas</option>
                    <option value="Ammaz">Amaaz</option>  
                    <option value="Ronnie">Ronnie Coleman</option>
                    <option value="Cbum">Cbum</option>
                    <option value="Zulaikha">Zulaikha</option>
                </select>
            </div>
            <div class="input-group">
                <label for="datetime">Time and Date</label>
                <input type="datetime-local" id="datetime" name="datetime" required>
            </div>
        </div>
    </div>
    <div class="input-group full-width">
        <input type="submit" value="Appointment" name="save">
    </div>
</form>

        </div>
    </div>
</body>
</html>
