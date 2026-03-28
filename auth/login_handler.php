<?php
// auth/login_handler.php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        redirect('../login.php');
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            redirect('../dashboard.php');
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            redirect('../login.php');
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "System Error: " . $e->getMessage();
        redirect('../login.php');
    }
} else {
    redirect('../login.php');
}
?>
