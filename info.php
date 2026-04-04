<?php
require_once 'includes/functions.php';
init_session();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About - EventMate</title>
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
            <section class="container section">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; left: -10%;"></div>
                </div>

                <div id="about" class="glass p-8 rounded-3xl mb-12" style="padding: 3rem; border-radius: 2rem; margin-bottom: 3rem;">
                    <h1 class="section-title">About <span class="text-gradient">EventMate</span></h1>
                    <p class="hero-desc" style="text-align: left; margin-left: 0; max-width: 800px;">
                        EventMate is the world's leading platform for discovering and managing extraordinary events. 
                        Founded in 2026, we've helped millions of people find their next great adventure, 
                        from local workshops to international music festivals.
                    </p>
                    <p class="hero-desc" style="text-align: left; margin-left: 0; max-width: 800px; margin-top: 1rem;">
                        Our mission is to bring people together through shared experiences. We believe that 
                        every event has the potential to create a memory that lasts a forever.
                    </p>
                </div>

                <div id="privacy" class="mb-12" style="margin-bottom: 3rem;">
                    <h2 class="section-title" style="font-size: 2rem;">Privacy <span class="text-gradient">Policy</span></h2>
                    <div class="glass p-6" style="padding: 2rem; border-radius: 1.5rem; color: rgba(255,255,255,0.7); line-height: 1.6;">
                        <p>Your privacy is important to us. It is EventMate's policy to respect your privacy regarding any information we may collect from you across our website.</p>
                        <p style="margin-top: 1rem;">We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent.</p>
                    </div>
                </div>

                <div id="terms" class="mb-12" style="margin-bottom: 3rem;">
                    <h2 class="section-title" style="font-size: 2rem;">Terms of <span class="text-gradient">Service</span></h2>
                    <div class="glass p-6" style="padding: 2rem; border-radius: 1.5rem; color: rgba(255,255,255,0.7); line-height: 1.6;">
                        <p>By accessing the website at EventMate, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
                    </div>
                </div>

                <div id="help" class="mb-12" style="margin-bottom: 3rem;">
                    <h2 class="section-title" style="font-size: 2rem;">Help <span class="text-gradient">Center</span></h2>
                    <div class="glass p-6" style="padding: 2rem; border-radius: 1.5rem; color: rgba(255,255,255,0.7); line-height: 1.6;">
                        <p>Need help? Our support team is available 24/7 to assist you with any questions or issues you may have. Contact us at support@eventmate.com or visit our contact page.</p>
                        <a href="contact.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-flex;">Contact Support</a>
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
</body>

</html>
