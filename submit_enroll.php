<?php
// Database connection details
$servername = "localhost"; // Change to your database server name (e.g., localhost)
$username = "root"; // Your database username
$password = ""; // Your database password (default is empty for localhost)
$dbname = "contact_form"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data using POST
$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$roll = $_POST['roll'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$mode = $_POST['mode'];
$address = $_POST['address'];
$dob = $_POST['dob'];

// SQL query to insert the data into the enrollments table
$sql = "INSERT INTO enrollments (name, email, college, roll, phone, course, mode, address, dob)
        VALUES ('$name', '$email', '$college', '$roll', '$phone', '$course', '$mode', '$address', '$dob')";

// Execute the query and check if the insertion was successful
if ($conn->query($sql) === TRUE) {
    echo "<p style='color: green;'>Enrollment successful! Your data has been submitted.</p>";
} else {
    echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
}

// Close the database connection
$conn->close();
?>
