<?php
// Display a message (optional)
$message = isset($_GET['message']) ? $_GET['message'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Enroll Now</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Header Section */
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 1.8em;
            font-weight: bold;
            color: #f39c12;
            text-decoration: none;
            text-transform: uppercase;
            margin-left: 20px;
        }

        header nav {
            float: right;
            margin-right: 20px;
        }

        header nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 1.1em;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        header nav ul li a:hover {
            background-color: #f39c12;
        }

        /* Adjust layout for smaller screens */
        @media screen and (max-width: 768px) {
            header .logo {
                font-size: 1.5em;
            }

            header nav {
                float: none;
                text-align: center;
                margin: 0;
            }

            header nav ul {
                flex-direction: column;
            }

            header nav ul li {
                margin: 10px 0;
            }

            header nav ul li a {
                font-size: 1.2em;
                padding: 10px 25px;
            }
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            font-size: 32px;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .mode-options label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .mode-options input {
            margin-right: 10px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0c5bbf;
        }

        .back-home-btn {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-home-btn:hover {
            background-color: #555;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            font-family: lucida;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-info, .footer-links, .footer-social {
            flex: 1;
            padding: 0 20px;
        }

        .footer-info h3, .footer-links h4, .footer-social h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin: 10px 0;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #f1c40f; /* Hover color */
        }

        .footer-social .social-icons {
            display: flex;
            gap: 15px;
        }

        .footer-social .social-icon {
            color: #fff;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-social .social-icon:hover {
            color: #f1c40f; /* Hover color */
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        /* Logo Styling */
        .footer-logo .logo {
            width: 150px; /* Adjust size as needed */
            height: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
            }

            .footer-info, .footer-links, .footer-social {
                text-align: center;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <a href="images/logo.jpg" class="logo">Maxzen Training Hub</a>
        <nav>
            <ul>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
        </nav>
    </header>
	<br>
	<br>
	<br>
    <?php if ($message): ?>
        <div style="background-color: #f39c12; color: white; text-align: center; padding: 10px;">
            <strong><?php echo $message; ?></strong>
        </div>
    <?php endif; ?>

    <h2>Enroll Now</h2>
    <form action="submit_enroll.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="college">College Name:</label>
        <input type="text" id="college" name="college" placeholder="Enter your college name" required>

        <label for="roll">Registration Number:</label>
        <input type="text" id="roll" name="roll" placeholder="Enter your roll number" required>

        <label for="phone">Contact Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="Enter your address" required></textarea>

        <label for="course">Select Course:</label>
        <select id="course" name="course">
            <option value="gen-ai">Gen AI</option>
            <option value="prompt-engineering">Prompt Engineering</option>
            <option value="digital-marketing">Digital Marketing</option>
            <option value="aws-devops">AWS DevOps</option>
            <option value="python-fullstack">Python Full Stack</option>
            <option value="ai">AI</option>
        </select>

        <label>Mode:</label>
        <div class="mode-options">
            <label><input type="radio" name="mode" value="online" required> Online</label>
            <label><input type="radio" name="mode" value="offline"> Offline</label>
            <label><input type="radio" name="mode" value="both"> Online/Offline</label>
        </div>

        <button type="submit" class="submit-btn">Submit</button>
        <button type="button" class="back-home-btn" onclick="location.href='index.html'">Back to Home</button>
    </form>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h3>IT Training Hub</h3>
                <p>Your one-stop destination for high-quality IT training and certification programs.</p>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-logo">
                <img src="images/logo.jpg" alt="Company Logo" class="logo">
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="footer-bottom">
            <p>&copy; 2025 IT Training Hub. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
