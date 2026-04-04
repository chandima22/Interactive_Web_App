<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

require_login(); // Ensure user is logged in
$user_id = $_SESSION['user_id'];
$user = get_user_by_id($pdo, $user_id);

// Fetch user's event registrations
$stmt = $pdo->prepare("
    SELECT r.*, e.title, e.event_date, e.location, e.image 
    FROM event_registrations r
    JOIN events e ON r.event_id = e.id
    WHERE r.user_id = ?
    ORDER BY r.created_at DESC
");
$stmt->execute([$user_id]);
$registrations = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - EventMate</title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/styles.css" />
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
                    <button class="icon-btn">
                        <i data-lucide="bell"></i>
                    </button>
                    <a href="dashboard.php" class="icon-btn active" title="Dashboard">
                        <i data-lucide="layout-dashboard"></i>
                    </a>
                    <a href="auth/logout.php" class="btn btn-primary header-cta">
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <section class="container section">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; left: -10%;"></div>
                    <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; right: -10%;"></div>
                </div>

                <div class="dashboard-header mb-12" style="margin-bottom: 3rem;">
                    <h1 class="page-title">
                        Welcome, <span class="text-gradient"><?php echo htmlspecialchars($user['username']); ?></span>
                    </h1>
                    <p class="page-desc">
                        Your personalized event dashboard. Manage your registrations and discover more experiences.
                    </p>
                </div>

                <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    <!-- User Info Card -->
                    <div class="glass p-8" style="padding: 2.5rem; border-radius: 2rem;">
                        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">Account Overview</h2>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <span style="color: rgba(255,255,255,0.5);">Username</span>
                                <span style="font-weight: 600;"><?php echo htmlspecialchars($user['username']); ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <span style="color: rgba(255,255,255,0.5);">Email</span>
                                <span style="font-weight: 600;"><?php echo htmlspecialchars($user['email']); ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <span style="color: rgba(255,255,255,0.5);">Member Since</span>
                                <span style="font-weight: 600;"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Card -->
                    <div class="glass p-8" style="padding: 2.5rem; border-radius: 2rem; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Total Registrations</h2>
                            <div style="font-size: 4rem; font-weight: 800; color: var(--color-brand-primary); line-height: 1;">
                                <?php echo count($registrations); ?>
                            </div>
                        </div>
                        <a href="events.php" class="btn btn-primary" style="margin-top: 1rem; width: fit-content;">
                            Explore More Events
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="section-header" style="margin-top: 4rem;">
                    <div>
                        <h2 class="section-title">Your <span class="text-gradient">Registrations</span></h2>
                    </div>
                </div>

                <div class="events-grid-compact">
                    <?php if (empty($registrations)): ?>
                        <div style="grid-column: 1/-1; text-align: center; padding: 4rem 2rem; color: rgba(255,255,255,0.5);">
                            <i data-lucide="calendar-x" style="width: 3rem; height: 3rem; margin-bottom: 1rem; display: block; margin-inline: auto;"></i>
                            <p style="font-size: 1.125rem;">You haven't registered for any events yet.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($registrations as $reg): ?>
                            <div class="event-card-compact">
                                <div class="event-img-compact">
                                    <img src="<?php echo $reg['image']; ?>" alt="<?php echo $reg['title']; ?>" class="event-img" />
                                    <div class="event-overlay"></div>
                                    <span class="event-tag" style="font-size: 0.625rem;">Registered</span>
                                </div>
                                <h3 class="event-title-compact"><?php echo $reg['title']; ?></h3>
                                <div class="event-meta">
                                    <span>
                                        <i data-lucide="calendar" style="width: 1rem; height: 1rem; color: var(--color-brand-primary);"></i>
                                        <?php echo $reg['event_date']; ?>
                                    </span>
                                    <span>
                                        <i data-lucide="map-pin" style="width: 1rem; height: 1rem; color: var(--color-brand-primary);"></i>
                                        <?php echo $reg['location']; ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
                </div>
                <div class="footer-bottom">
                    <span>© 2026 EventMate. All rights reserved.</span>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>
