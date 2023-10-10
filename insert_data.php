<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentitdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gather form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$city = $_POST['city'];
$area = $_POST['area'];
$zip = $_POST['zip'];
$rentalHistory = $_POST['rental_history'];
$employment = $_POST['employment_status'];
$apartmentName = $_POST['apartmentName'];
$sqrfoot = $_POST['sqrfoot'];
$rent = $_POST['rent'];
$roomNo = $_POST['roomNo'];

// SQL query to insert data into apartment_ownerstb
$sqlInsertData = "INSERT INTO apartment_ownerstb (name, email, phone, DOB, NID, Address, City, Area, ZipCode, RentalHistory, Employment, Ap_name, sqrfoot, rent, roomNo) 
        VALUES ('$name', '$email', '$phone', '$dob', '$nid', '$address', '$city', '$area', '$zip', '$rentalHistory', '$employment', '$apartmentName', '$sqrfoot', '$rent', '$roomNo')";

// Perform the insertion
if ($conn->query($sqlInsertData) === TRUE) {
    $response = array('success' => true, 'message' => 'Data saved successfully');
} else {
    $response = array('success' => false, 'message' => 'Error: ' . $conn->error);
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>