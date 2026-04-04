<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

init_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        header("Location: ../signup.php?error=empty_fields");
        exit();
    }

    // Map first + last to username as discussed
    $username = $first_name . ' ' . $last_name;

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header("Location: ../signup.php?error=email_exists");
        exit();
    }

    // Securely hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $hashed_password])) {
        // Automatically log in user after signup
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php?success=signup");
        exit();
    } else {
        header("Location: ../signup.php?error=execution_failed");
        exit();
    }
} else {
    header("Location: ../signup.php");
    exit();
}
?>
