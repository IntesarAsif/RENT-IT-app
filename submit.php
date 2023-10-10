<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentitdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$sql = "INSERT INTO contact_information (FirstName, LastName, Phone, Email, Message)
        VALUES ('$first_name', '$last_name', '$phone', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    $successMessage = "Message sent successfully! Thank you for contacting RENT IT support team, we will get back to you shortly!";
} else {
    $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Message Status</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #1b2029;
        color: rgb(210, 208, 208);
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .success-message {
        font-size: 24px;
        color: green;
        text-align: center;
        margin: 0 auto;
    }
    
    .error-message {
        font-size: 24px;
        color: red;
        text-align: center;
        margin: 0 auto;
    }
</style>
</head>
<body>
<?php if (isset($successMessage)) { ?>
    <div class="success-message">
        <?php echo $successMessage; ?>
    </div>
<?php } elseif (isset($errorMessage)) { ?>
    <div class="error-message">
        <?php echo $errorMessage; ?>
    </div>
<?php } ?>
</body>
</html>
