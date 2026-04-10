<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

init_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple validation
    if (empty($email) || empty($password)) {
        header("Location: ../pages/login.php?error=empty_fields");
        exit();
    }

    // Check if email exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        // Log in user on valid password
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../pages/dashboard.php");
        exit();
    } else {
        header("Location: ../pages/login.php?error=invalid_credentials");
        exit();
    }
} else {
    header("Location: ../pages/login.php");
    exit();
}
?>
