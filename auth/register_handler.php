<?php
// auth/register_handler.php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        redirect('../signup.php');
    }

    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "Email already registered.";
            redirect('../signup.php');
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $hashed_password])) {
            $_SESSION['success'] = "Registration successful! Please log in.";
            redirect('../login.php');
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            redirect('../signup.php');
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "System Error: " . $e->getMessage();
        redirect('../signup.php');
    }
} else {
    redirect('../signup.php');
}
?>
