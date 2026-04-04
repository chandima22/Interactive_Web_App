<?php
// Utility functions for EventMate

// Start session if not already started
function init_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Sanitize user input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Check if user is logged in
function is_logged_in() {
    init_session();
    return isset($_SESSION['user_id']);
}

// Redirect if not logged in
function require_login() {
    if (!is_logged_in()) {
        header("Location: login.php");
        exit();
    }
}

// Get all events from database
function get_all_events($pdo) {
    $stmt = $pdo->query("SELECT * FROM events ORDER BY created_at DESC");
    return $stmt->fetchAll();
}

// Get featured events (e.g., specific IDs or latest)
function get_featured_events($pdo, $limit = 3) {
    // You can customize this to pick featured events. 
    // For now, let's just pick the latest 3.
    $stmt = $pdo->prepare("SELECT * FROM events ORDER BY id DESC LIMIT :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Get user info by ID
function get_user_by_id($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}
?>
