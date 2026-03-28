<?php
// includes/functions.php

session_start();

/**
 * Clean user input
 */
function sanitize_input($data) {
    if (!$data) return '';
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Check if user is logged in
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Redirect user
 */
function redirect($url) {
    header("Location: $url");
    exit();
}
?>
