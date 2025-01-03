<?php
// Database connection
$servername = "localhost";  // Your server name (usually 'localhost')
$username = "root";         // Your database username (usually 'root')
$password = "";             // Your database password (usually empty in local setup)
$dbname = "contact_form";   // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }

    // If no errors, store in database and send email
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO submissions (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Thank you for contacting us, we will get back to you soon!</p>";
        } else {
            echo "<p style='color: red;'>Oops! Something went wrong. Please try again later.</p>";
        }

        $stmt->close(); // Close the prepared statement

        // Send email
        $to = "contact@yourwebsite.com"; // Change to your email address
        $subject = "New Contact Us Message from $name";
        $body = "Name: $name\nEmail: $email\nMessage: \n$message";
        $headers = "From: $email";

        
    }

    $conn->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Contact Us</title>
    <style>
        /* Styles go here */
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding-top: 80px; /* Space for fixed header */
        }

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

        /* Main content */
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

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    <a href="index.php" class="logo">Maxzen Training Hub</a>
</header>
<br>

<!-- Contact Us Form Section -->
<h2>Contact Us</h2>

<form action="contact.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required>
    <span style="color: red;"><?php echo $name_err; ?></span>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
    <span style="color: red;"><?php echo $email_err; ?></span>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="5" placeholder="Enter your message" required><?php echo $message; ?></textarea>
    <span style="color: red;"><?php echo $message_err; ?></span>

    <button type="submit" class="submit-btn">Send Message</button>
</form>

<!-- Footer Section -->
<footer>
    <div class="footer-container">
        <div class="footer-info">
            <h3>About Us</h3>
            <p>We provide comprehensive training courses in IoT, Web Development, and more!</p>
        </div>
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Maxzen Training Hub | All rights reserved.</p>
    </div>
</footer>

</body>
</html>
