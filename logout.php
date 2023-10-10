<?php
session_start();
session_destroy(); // Destroy the session
header("Location: login.html"); // Redirect to login page after logout
?>
