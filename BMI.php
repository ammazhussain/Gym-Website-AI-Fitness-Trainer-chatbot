<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS & Icons -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>Gym Management System</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            width: 100%;
        }
        /* NAVBAR */
        .navbar {
        background: linear-gradient(black,#0e0e0e);
        height: auto;
        padding: 10px 20px;
        z-index: 1050;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
        }

        /* Navbar Brand Logo */
        .navbar-brand img {
        height: 25px;
        width: auto;
        }

        /* Toggler Button */
        .navbar-toggler {
        border: none;
        font-size: 1.5rem;
        color: #f36100;
        }

        .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(243,97,0, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        /* Toggler & Close focus */
        .navbar-toggler:focus,
        .btn-close {
        box-shadow: none;
        outline: none;
        }

        /* Nav Links */
        .nav-link {
        color: white;
        font-weight: 500;
        font-size: 16px;
        position: relative;
        margin-right: 28px;
        transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link:active,
        .nav-link.active {
        color: #f36100 !important;
        }

        /* Dropdown */
        .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        }

        .nav-item.dropdown .dropdown-menu {
        display: none;
        background-color: #1e1e1e;
        border: none;
        padding: 5px;
        box-shadow: 0 0 10px rgba(243, 97, 0, 0.2);
        }

        .dropdown-item {
        color: white;
        padding: 6px;
        }

        .dropdown-item:hover {
        background-color: #f36100;
        color: #0e0e0e;
        transform: 0.5s;
        border-radius: 4px;
        padding: 5px;
        }

        /* Offcanvas Styling for Mobile */
        .offcanvas {
        background-color: #0e0e0e;
        color: white;
        }

        .offcanvas-header {
        border-bottom: 1px solid #1e1e1e;
        }

        .offcanvas-title {
        font-size: 1.5rem;
        color: #f36100;
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


        .hero-text {
        text-align: center;
        }

        .hero-text h1 {
        font-weight: 900;
        font-size: 3.5rem;
        color: #ffffff;
        }

        .hero-text h4 {
        font-weight: 500;
        font-size: 1.4rem;
        color: #ccc;
        }

        .hero-text h4 span {
        color: #f36100;
        }

        .btn-custom-1 {
        color: white;
        background-color: #f36100 ;
        border: none;
        transition: all 0.3s ease;
        }

        .btn-custom-1:hover {
            color: #f36100 ;
            background-color: white;
        }
        .btn-custom {
        color: white;
        background-color: transparent;
        border: none;
        transition: all 0.3s ease;
        border: 1px solid #f36100 ;
        }

        .btn-custom:hover {
            color: black;
            background-color: #f36100 ;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .footer a:hover {
        color: #f36100 !important;
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
        
        
        
        /* Modal Popup Styles */
.popup-modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
}

.popup-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border-radius: 5px;
    width: 50%;
    text-align: center;
}

.close-btn {
    position: absolute;  /* Position the button inside the popup content */
    top: 10px;  /* Distance from the top edge */
    right: 10px;  /* Distance from the right edge */
    color: white;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
    padding: 0;
    background-color: transparent;
    border: none;
}

.close-btn:hover {
    color: #ff3333;  /* Change color on hover */
}
#bmiPopup {
    display: none;  /* Hide by default */
    position: fixed;  /* Fixed position to keep it centered even when the page scrolls */
    top: 50%;  /* Center vertically */
    left: 50%;  /* Center horizontally */
    transform: translate(-50%, -50%);  /* Offset by 50% of the element’s width and height for true centering */
    background-color: rgba(0, 0, 0, 0.7);  /* Dark background with some transparency */
    color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    z-index: 1000;  /* Make sure it's above other elements */
    width: 300px;  /* Specify width to make close button position predictable */
}
#popupContent {
    display: flex;
    flex-direction: column;
    align-items: center;
}

button.close {
    background-color: transparent;
    color: white;
    border: none;
    font-size: 18px;
    cursor: pointer;
    padding: 5px;
}
.calculator.card-body {
  padding: 16px 20px;
  background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
  border-top: 1px solid #333;
  border-radius: 10px;
  box-shadow: inset 0 0 10px rgba(243, 97, 0, 0.1);
  color: #e0e0e0;
  transition: background 0.3s ease;
}

.calculator.card-body:hover {
  background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
  box-shadow: inset 0 0 14px rgba(243, 97, 0, 0.15);
}


    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="images/logo.png" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="About.html">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="BMI.php">BMI</a></li>
              <li class="nav-item"><a class="nav-link" href="Team.html">Our Team</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Records</a>
                <ul class="dropdown-menu" style="min-width: 128px;">
                  <li style="width: 113px;"><a class="dropdown-item" href="appointments_test.php" style="width: 107px; padding: 6px;">Appointments</a></li>
                  <li style="width: 113px;"><a class="dropdown-item" href="register_test.php" style="width: 107px; padding: 6px;">Register</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="hero-1">
    <div class="hero-text">
        <h1 class="size_text">BMI CALCULATOR</h1>
        <h4>Home ><span> BMI Calculator</span></h4>
    </div>
  </div>

    <div class="text-white py-5 custom-section" style="background: linear-gradient(120deg,#0e0e0e, #1a1a1a,#1a1a1a, #ff5e00); position: relative;">
        <div class="container py-5">
            <div class="row">

            <!-- BMI Chart Section -->
            <div class="col" style="padding-left: 50px;">
                <div class="text-left">
                  <h4 style="
                      font-size: 19px; 
                      color: #f36100; 
                      letter-spacing: 1.5px; 
                      text-transform: uppercase; 
                      margin-bottom: 8px;
                  ">
                    CHECK YOUR BODY
                  </h4>
                  <h1 style="
                      color: white; 
                      font-weight: 700; 
                      font-size: 32px; 
                      text-shadow: 0 0 10px rgba(255, 165, 0, 0.2); 
                      margin-bottom: 10px;
                  ">
                    BMI CALCULATOR CHART
                  </h1>
                </div>
                <div class="image-container">
                <img src="images/BMI%20Table.png" alt="Logo" class="img-fluid rounded shadow">
                </div>
            </div>

            <!-- BMI Calculator Section -->
            <div class="col" style="padding-left: 50px;">
                <div class="text-left">
                  <h4 style="
                      font-size: 19px; 
                      color: #f36100; 
                      letter-spacing: 1.5px; 
                      text-transform: uppercase; 
                      margin-bottom: 8px;
                  ">
                    CHECK YOUR BODY
                  </h4>
                  <h1 style="
                      color: white; 
                      font-weight: 700; 
                      font-size: 32px; 
                      text-shadow: 0 0 10px rgba(255, 165, 0, 0.2); 
                      margin-bottom: 10px;
                  ">
                    CALCULATE YOUR BMI
                  </h1>
                </div>
                <div class="calculator card-body">
                <form id="bmiform" action="BMI.php" method="POST">
                    <div class="mb-2">
                    <label for="height" class="form-label text-light">Height / cm</label>
                    <input type="number" id="height" name="height" class="form-control bg-black text-white border-0" required>
                    </div>
                    <div class="mb-2">
                    <label for="weight" class="form-label text-light">Weight / kg</label>
                    <input type="number" id="weight" name="weight" class="form-control bg-black text-white border-0" required>
                    </div>
                    <div class="mb-2">
                    <label for="age" class="form-label text-light">Age</label>
                    <input type="number" id="age" name="age" class="form-control bg-black text-white border-0" required>
                    </div>
                    <div class="mb-3">
                    <label for="gender" class="form-label text-light">Gender</label>
                    <select id="gender" name="gender" class="form-select bg-black text-white border-0" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="undefined">Undefined</option>
                        <option value="Non-binary">Non-binary</option>
                    </select>
                    </div>
                    <input type="hidden" id="bmi" name="bmi">
                    <button type="submit" class="btn w-100" style="color: #f36100; border: 1px solid #f36100; background-color: transparent; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f36100'; this.style.color='#0e0e0e';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#f36100';" onclick="calculateBMI(event)">Calculate</button>
                </form>

                <div id="result">
                    <div id="bmiPopup" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.8); color:white; padding:20px; border-radius:8px; box-shadow: 0 0 15px rgba(0,0,0,0.5); z-index:1000; width:300px;">
                    <div id="popupContent" class="text-center">
                        <p>Your BMI: <span id="popupBmi"></span></p>
                        <span class="close-btn" onclick="closePopup()" style="cursor:pointer; font-size: 20px; color: #f36100;">&times;</span>
                    </div>
                    </div>
                </div>

                </div>
            </div>

            </div>
        </div>
        </div>
</div>
        <script>
        function calculateBMI(event) {
        event.preventDefault();
        const height = document.getElementById('height').value;
        const weight = document.getElementById('weight').value;
        const bmi = weight / ((height / 100) ** 2);
        document.getElementById('bmi').value = bmi;
        document.getElementById('popupBmi').textContent = bmi.toFixed(2);
        document.getElementById('bmiPopup').style.display = 'block';
        }
        function closePopup() {
        document.getElementById('bmiPopup').style.display = 'none';
        }
        </script>

    <footer class="footer text-white py-5" style="background:linear-gradient(135deg,#0e0e0e,#1e1e1e,#1e1e1e); font-size: 14px;">
        <div class="container" style="padding-left:90px">
          <!-- Top Contact Info -->
          <div class="row text-center text-md-start mb-4 small">
            <div class="col-md-4 mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
              <img src="images/ADDRESS-Logo.png" alt="Address Logo" class="me-2" style="border-radius: 50%; width: 40px;">
              <span></i>Shaheen Town, Rawalpindi</span>
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
              <img src="images/NUMBER-Logo.png" alt="Phone Logo" class="me-2" style="border-radius: 50%; width: 40px;">
              <span></i>125-711-811 | 125-668-886</span>
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
              <img src="images/MAIL-LOGO.png" alt="Mail Logo" class="me-2" style="border-radius: 50%; width: 40px;">
              <span></i>getfit@gmail.com</span>
            </div>
          </div>
      
          <!-- Footer Main Content -->
          <div class="row text-center text-md-start">
            <!-- Logo and Social -->
            <div class="col-md-3 mb-4">
              <img src="images/logo.png" alt="Gym Logo" style="width: 100px;" class="mb-3">
              <p class="text-secondary">Achieve your dream body with the right guidance, consistency, and effort.</p>
              <div class="d-flex justify-content-center justify-content-md-start gap-3">
                <a href="https://www.instagram.com/ammazhussain1/"><i class="fab fa-facebook-f text-secondary"></i></a>
                <a href="#"><i class="fab fa-twitter text-secondary"></i></a>
                <a href="#"><i class="fab fa-youtube text-secondary"></i></a>
                <a href="https://www.instagram.com/ammazhussain1/"><i class="fab fa-instagram text-secondary"></i></a>
                <a href="#"><i class="fas fa-envelope text-secondary"></i></a>
              </div>
            </div>
      
            <!-- Useful Links -->
            <div class="col-md-2 mb-4">
              <h6 class="text-white mb-3">Useful Links</h6>
              <ul class="list-unstyled text-secondary">
                <li><a href="About.html" class="text-secondary text-decoration-none">About</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">Blog</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">Classes</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">Contact</a></li>
              </ul>
            </div>
      
            <!-- Support -->
            <div class="col-md-2 mb-4">
              <h6 class="text-white mb-3">Support</h6>
              <ul class="list-unstyled text-secondary">
                <li><a href="login.php" class="text-secondary text-decoration-none">Login</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">My Account</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">Subscribe</a></li>
                <li><a href="Regi.php" class="text-secondary text-decoration-none">Contact</a></li>
              </ul>
            </div>
      
            <!-- Tips & Guides -->
            <div class="col-md-5 mb-4">
              <h6 class="text-white mb-3">Tips & Guides</h6>
              <ul class="list-unstyled text-secondary">
                <li class="mb-2">
                  <a href="#" class="text-secondary text-decoration-none">
                    Physical fitness may help prevent depression, anxiety
                  </a>
                  <br><small>3 min read | 20 Comments</small>
                </li>
                <li>
                  <a href="#" class="text-secondary text-decoration-none">
                    Fitness: The best exercise to lose belly fat and tone up...
                  </a>
                  <br><small>3 min read | 20 Comments</small>
                </li>
              </ul>
            </div>
          </div>
      
          <!-- Bottom Footer -->
          <div class="text-center border-top pt-3 mt-4 small" style="border-color: rgba(255,255,255,0.1);">
            <p class="mb-0 text-secondary">&copy; 2024 Gym Management System. All rights reserved.</p>
          </div>
        </div>
      </footer>
<script>
   function calculateBMI(event) {
    event.preventDefault();  // Prevents the form from submitting and the page from reloading

    var height = document.getElementById('height').value;
    var weight = document.getElementById('weight').value;

    // Perform BMI calculation
    var bmi = weight / ((height / 100) * (height / 100));

    // Update the value of the hidden input field
    document.getElementById('bmi').value = bmi;

    // Display the result in the popup
    document.getElementById('popupBmi').textContent = bmi.toFixed(2);

    // Show the popup
    document.getElementById('bmiPopup').style.display = 'block';
}

function closePopup() {
    document.getElementById('bmiPopup').style.display = 'none';
}

</script>
    </body>
</html>



