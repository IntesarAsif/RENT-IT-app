<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "rentitdb");

// Get the OwnerID value from the URL parameter
$ownerID = $_GET['ownerID'];

// Delete the records from the 'apartment_ownerstb' table based on OwnerID
$query = "DELETE FROM apartment_ownerstb WHERE OwnerID='$ownerID'";
mysqli_query($connection, $query);

// Redirect back to the previous page
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
