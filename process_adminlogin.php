<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentitdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admintb WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['adminID']; // Store user ID in session
    
    // Redirect to dashboard or protected page
    header("Location: admin_dashboard.html");

    // Set up a flag to indicate successful login
    $_SESSION['login_success'] = true;
} else {
    $_SESSION['login_error'] = "Invalid credentials"; // Store error message in session
    header("Location: adminLogin.html"); // Redirect back to login page
}

$conn->close();
?>
