<?php
session_start();


if (isset($_SESSION['user_id'])) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}
?>
