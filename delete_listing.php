<?php
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $path = 'listings/' . $filename;

    if (file_exists($path)) {
        unlink($path); // Delete the file
        header('Location: admin_dashboard.html'); // Redirect back to the dashboard
    } else {
        echo "File not found.";
    }
}
?>
