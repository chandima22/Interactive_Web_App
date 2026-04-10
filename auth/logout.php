<?php
require_once '../includes/functions.php';

init_session();

// Clear and destroy session
$_SESSION = array();
session_destroy();

// Redirect to login page
header("Location: ../pages/login.php");
exit();
?>
