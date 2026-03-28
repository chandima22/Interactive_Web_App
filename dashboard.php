<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!is_logged_in()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$username = htmlspecialchars($_SESSION['username']);

// Fetch user's registered events
$stmt = $pdo->prepare("
    SELECT er.id as registration_id, er.created_at, e.title, e.event_date, e.location 
    FROM event_registrations er
    JOIN events e ON er.event_id = e.id
    WHERE er.user_id = ?
    ORDER BY er.created_at DESC
");
$stmt->execute([$user_id]);
$registrations = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Dashboard - EventMate</title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <style>
        .dashboard-table { width: 100%; border-collapse: collapse; margin-top: 1rem; color: rgba(255,255,255,0.8); }
        .dashboard-table th, .dashboard-table td { padding: 1rem; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dashboard-table th { font-weight: 600; color: #fff; }
        .dashboard-table tbody tr:hover { background: rgba(255,255,255,0.05); }
        .badge { display: inline-block; padding: 0.25rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: rgba(139, 92, 246, 0.2); color: #c4b5fd; border: 1px solid rgba(139, 92, 246, 0.3); }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="noise-overlay"></div>

        <!-- Header -->
        <header class="header glass">
            <div class="header-inner container">
                <div class="header-left">
                    <a href="index.php" class="logo">
                        <div class="logo-icon">
                            <img src="assets/images/Logo.png" alt="Logo">
                        </div>
                        <span class="logo-text">EventMate</span>
                    </a>
                    <nav class="nav-links">
                        <a href="index.php" class="nav-link">Home</a>
                        <a href="events.php" class="nav-link">Events</a>
                        <a href="register.php" class="nav-link">Register</a>
                        <a href="contact.php" class="nav-link">Contact</a>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="dashboard.php" class="icon-btn" style="color: var(--color-brand-primary);">
                        <i data-lucide="layout-dashboard"></i>
                    </a>
                    <a href="auth/logout.php" class="btn btn-primary header-cta" style="background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.1);">
                        Log Out
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <section class="container section">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; left: -10%;"></div>
                </div>

                <div style="max-width: 1000px; margin: 0 auto; position: relative; z-index: 10;">
                    <h1 class="page-title" style="text-align: left; margin-bottom: 0.5rem;">
                        Welcome back, <span class="text-gradient"><?php echo $username; ?></span>!
                    </h1>
                    <p class="page-desc" style="text-align: left; margin-bottom: 3rem;">
                        Manage your upcoming event registrations and tickets here.
                    </p>

                    <div class="form-card" style="max-width: 100%;">
                        <div class="form-header">
                            <div class="form-header-icon" style="background-color: rgba(139, 92, 246, 0.1); color: var(--color-brand-primary);">
                                <i data-lucide="ticket"></i>
                            </div>
                            <h2 class="form-header-title">My Registrations</h2>
                        </div>

                        <?php if (count($registrations) > 0): ?>
                            <div style="overflow-x: auto;">
                                <table class="dashboard-table">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($registrations as $reg): ?>
                                            <tr>
                                                <td style="font-weight: 500; color: #fff;"><?php echo htmlspecialchars($reg['title']); ?></td>
                                                <td><i data-lucide="calendar" style="width:14px; height:14px; display:inline-block; vertical-align:middle; margin-right:4px;"></i> <?php echo htmlspecialchars($reg['event_date']); ?></td>
                                                <td><i data-lucide="map-pin" style="width:14px; height:14px; display:inline-block; vertical-align:middle; margin-right:4px;"></i> <?php echo htmlspecialchars($reg['location']); ?></td>
                                                <td><span class="badge">Confirmed</span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div style="text-align: center; padding: 3rem 1rem;">
                                <div style="width: 4rem; height: 4rem; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; color: rgba(255,255,255,0.3);">
                                    <i data-lucide="calendar-x" style="width: 2rem; height: 2rem;"></i>
                                </div>
                                <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">No Registrations Yet</h3>
                                <p style="color: rgba(255,255,255,0.6); margin-bottom: 1.5rem;">You haven't registered for any events yet. Find an event and secure your spot!</p>
                                <a href="events.php" class="btn btn-primary">Browse Events</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-about">
                        <a href="index.php" class="footer-logo">
                            <div class="logo-icon">
                                <img src="assets/images/Logo.png" alt="Logo">
                            </div>
                            <span class="footer-logo-text">EventMate</span>
                        </a>
                        <p class="footer-desc">
                            Discover and manage extraordinary events with the most sophisticated platform for event
                            organizers and attendees.
                        </p>
                    </div>
                    <div>
                        <h4 class="footer-heading">Platform</h4>
                        <nav class="footer-nav">
                            <a href="info.php#about">About Us</a>
                            <a href="events.php">Discover Events</a>
                            <a href="register.php">Register Now</a>
                            <a href="contact.php">Contact Support</a>
                        </nav>
                    </div>
                    <div>
                        <h4 class="footer-heading">Legal</h4>
                        <nav class="footer-nav">
                            <a href="info.php#privacy">Privacy Policy</a>
                            <a href="info.php#terms">Terms of Service</a>
                            <a href="info.php#help">Help Center</a>
                        </nav>
                    </div>
                </div>
                <div class="footer-bottom">
                    <span>© 2026 EventMate. All rights reserved.</span>
                    <div class="footer-bottom-right">
                        <span>Built with Passion</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Need script.js for lucide icons if it handles instantiation -->
    <script src="assets/js/script.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>
</html>
