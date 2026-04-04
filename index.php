<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

init_session();
$featured_events = get_featured_events($pdo, 3);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EventMate</title>
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
                        <a href="index.php" class="nav-link active">Home</a>
                        <a href="events.php" class="nav-link">Events</a>
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

            <!-- Hero Section -->
            <section class="hero mesh-bg">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse"></div>
                    <div class="blob blob-2 animate-pulse delay-700"></div>
                    <div class="blob blob-3 animate-float"></div>
                </div>

                <div class="hero-content">
                    <h1 class="hero-title">
                        Create <span class="text-gradient">Memories</span> <br />
                        That Last Forever.
                    </h1>
                    <p class="hero-desc">
                        Discover and join amazing events near you. EVENT MATE brings Academic, Cultural, Sports,
                        Business events and social programs together in one place
                    </p>
                    <div class="hero-actions">
                        <a href="events.php" class="btn btn-primary btn-lg btn-glow">
                            Explore Events
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats">
                <div class="container-sm">
                    <div class="stats-grid">
                        <div class="stat-card glass">
                            <div class="stat-icon">
                                <i data-lucide="calendar"></i>
                            </div>
                            <div>
                                <div class="stat-value">50+</div>
                                <div class="stat-label">Active Events</div>
                            </div>
                        </div>
                        <div class="stat-card glass">
                            <div class="stat-icon">
                                <i data-lucide="users"></i>
                            </div>
                            <div>
                                <div class="stat-value">10k+</div>
                                <div class="stat-label">Happy Attendees</div>
                            </div>
                        </div>
                        <div class="stat-card glass">
                            <div class="stat-icon">
                                <i data-lucide="trophy"></i>
                            </div>
                            <div>
                                <div class="stat-value">25</div>
                                <div class="stat-label">Award Wins</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Events Section -->
            <section class="section container">
                <div class="section-header">
                    <div>
                        <h2 class="section-title">Featured <span class="text-gradient">Events</span></h2>
                        <p class="section-desc">
                            Handpicked experiences curated just for you. Don't miss out on the most anticipated
                            gatherings of the season.
                        </p>
                    </div>
                    <a href="events.php" class="section-link">
                        View All Events
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>

                <div class="events-grid">
                    <?php foreach ($featured_events as $event): ?>
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>" class="event-img" referrerpolicy="no-referrer" />
                            <div class="event-overlay"></div>
                            <span class="event-tag btn-glass"><?php echo $event['category']; ?></span>
                            <div class="event-info">
                                <div class="event-date">
                                    <span><i data-lucide="calendar"></i> <?php echo $event['event_date']; ?></span>
                                </div>
                                <h3 class="event-title"><?php echo $event['title']; ?></h3>
                            </div>
                        </div>
                        <div class="event-footer">
                            <div class="event-location">
                                <i data-lucide="map-pin"></i>
                                <span><?php echo $event['location']; ?></span>
                            </div>
                            <a href="register.php?event=<?php echo $event['id']; ?>" class="event-action glass">
                                <i data-lucide="arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="section container">
                <div class="cta-box glass mesh-bg">
                    <div class="cta-content">
                        <h2 class="cta-title">Ready to start your <br /> next <span
                                class="text-gradient">adventure?</span></h2>
                        <p class="cta-desc">
                            Join thousands of event enthusiasts and organizers. Sign up today and get exclusive access
                            to early-bird tickets and VIP experiences.
                        </p>
                        <a href="signup.php" class="btn btn-primary btn-lg btn-glow">
                            Join the Community
                            <i data-lucide="arrow-right"></i>
                        </a>
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

    <script src="assets/js/script.js"></script>
    <script>
        // Initialize Lucide Icons again for dynamic content
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>
