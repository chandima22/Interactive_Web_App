<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

init_session();
$all_events = get_all_events($pdo);

// Prepare data for JS
$events_json = json_encode($all_events);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events - EventMate</title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script>
        // Inject database events into JS global scope
        window.eventsData = <?php echo $events_json; ?>;
    </script>
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
                        <a href="events.php" class="nav-link active">Events</a>
                        <a href="register.php" class="nav-link">Register</a>
                        <a href="contact.php" class="nav-link">Contact</a>
                    </nav>
                </div>
                <div class="header-right">
                    <button class="icon-btn">
                        <i data-lucide="bell"></i>
                    </button>
                    <?php if (is_logged_in()): ?>
                        <a href="dashboard.php" class="icon-btn" title="Dashboard">
                            <i data-lucide="layout-dashboard"></i>
                        </a>
                        <a href="auth/logout.php" class="btn btn-primary header-cta">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="icon-btn" title="Login">
                            <i data-lucide="user"></i>
                        </a>
                        <a href="signup.php" class="btn btn-primary header-cta">
                            Get Started
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header container">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; right: -10%;"></div>
                    <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; right: -10%;"></div>
                </div>

                <div class="page-header-content">
                    <h1 class="page-title">
                        Discover <span class="text-gradient">Events</span>
                    </h1>
                    <p class="page-desc">
                        Explore a world of possibilities. From intimate workshops to massive festivals, find the
                        experiences that move you.
                    </p>
                </div>

                <div class="search-box">
                    <i data-lucide="search" class="search-icon"></i>
                    <input type="text" placeholder="Search for events..." class="search-input" />
                </div>
            </div>

            <div class="container section" style="padding-top: 2rem;">
                <!-- Filters Bar -->
                <div class="filter-bar glass">
                    <div class="filter-tags">
                        <button class="filter-tag active">All</button>
                        <button class="filter-tag">Academic</button>
                        <button class="filter-tag">Cultural</button>
                        <button class="filter-tag">Sports</button>
                        <button class="filter-tag">Social</button>
                        <button class="filter-tag">Business</button>
                    </div>
                    <div class="sort-control">
                        <div style="width: 1px; height: 1.5rem; background-color: rgba(255,255,255,0.1);"
                            class="hidden md-flex"></div>
                        <button class="sort-btn">
                            <i data-lucide="sliders-horizontal" style="width: 1rem; height: 1rem;"></i>
                            Sort By
                            <i data-lucide="chevron-down" style="width: 1rem; height: 1rem;"></i>
                        </button>
                    </div>
                </div>

                <!-- Events Grid -->
                <div class="events-grid-compact">
                    <!-- Events dynamically rendered by script.js using window.eventsData -->
                </div>
            </div>
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
                        <div class="footer-dot"></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>
