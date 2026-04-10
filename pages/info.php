<?php
require_once '../includes/functions.php';
init_session();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info - EventMate</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="noise-overlay"></div>

        <!-- Header -->
        <nav class="navbar navbar-expand-lg sticky-top nav-glass">
            <div class="container">
                <a class="navbar-brand logo d-flex align-items-center gap-2" href="../index.php">
                    <div class="logo-icon">
                        <img src="../assets/images/Logo.png" alt="Logo" width="32" height="32">
                    </div>
                    <span class="logo-text">EventMate</span>
                </a>
                
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i data-lucide="menu" class="text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="icon-btn">
                            <i data-lucide="bell"></i>
                        </button>
                        <?php if (is_logged_in()): ?>
                            <a href="dashboard.php" class="icon-btn" title="Dashboard">
                                <i data-lucide="layout-dashboard"></i>
                            </a>
                            <a href="../auth/logout.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta">
                                Logout
                            </a>
                        <?php else: ?>
                            <a href="login.php" class="icon-btn" title="Login">
                                <i data-lucide="user"></i>
                            </a>
                            <a href="signup.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta">
                                Get Started
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content py-5">
            <div class="container position-relative">
                <div class="hero-blobs position-absolute top-0 start-50 translate-middle-x z-0 w-100 h-100" style="pointer-events: none;">
                    <div class="blob-1 opacity-10"></div>
                </div>

                <div id="about" class="py-5 position-relative z-10">
                    <div class="glass p-4 p-md-5 rounded-5 mb-5 border-white-5 shadow-lg">
                        <h1 class="display-4 fw-bold mb-4">About <span class="text-gradient">EventMate</span></h1>
                        <p class="lead opacity-75 mb-4 max-w-3xl">
                            EventMate is the world's leading platform for discovering and managing extraordinary events. 
                            Founded in 2026, we've helped millions of people find their next great adventure.
                        </p>
                        <p class="opacity-50 max-w-3xl">
                            Our mission is to bring people together through shared experiences. We believe that 
                            every event has the potential to create a memory that lasts forever.
                        </p>
                    </div>
                </div>

                <div class="row g-4 position-relative z-10">
                    <div class="col-lg-6" id="privacy">
                        <div class="glass p-4 p-md-5 rounded-5 h-100 border-white-5 shadow-lg">
                            <h2 class="h3 fw-bold mb-4">Privacy <span class="text-gradient">Policy</span></h2>
                            <div class="opacity-75 lh-lg">
                                <p>Your privacy is important to us. It is EventMate's policy to respect your privacy regarding any information we may collect from you across our website.</p>
                                <p class="mt-3">We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6" id="terms">
                        <div class="glass p-4 p-md-5 rounded-5 h-100 border-white-5 shadow-lg">
                            <h2 class="h3 fw-bold mb-4">Terms of <span class="text-gradient">Service</span></h2>
                            <div class="opacity-75 lh-lg">
                                <p>By accessing the website at EventMate, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
                                <p class="mt-3">The materials contained in this website are protected by applicable copyright and trademark law.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="help">
                        <div class="glass p-4 p-md-5 rounded-5 border-white-5 shadow-lg text-center">
                            <h2 class="display-6 fw-bold mb-4">Help <span class="text-gradient">Center</span></h2>
                            <p class="lead opacity-75 mb-4 max-w-2xl mx-auto">
                                Need help? Our support team is available 24/7 to assist you with any questions or issues you may have.
                            </p>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="contact.php" class="btn btn-primary rounded-pill px-5 py-3 fw-bold h-glow shadow-lg">
                                    Contact Support
                                    <i data-lucide="send" class="ms-2" style="width: 1.25rem;"></i>
                                </a>
                                <a href="mailto:support@eventmate.com" class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold h-glow border-white-10">
                                    Email Us
                                    <i data-lucide="mail" class="ms-2" style="width: 1.25rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-5 mt-5 border-top border-white-5 opacity-75">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-5">
                        <a href="../index.php" class="navbar-brand logo d-flex align-items-center gap-2 mb-4">
                            <div class="logo-icon">
                                <img src="../assets/images/Logo.png" alt="Logo" width="32" height="32">
                            </div>
                            <span class="logo-text">EventMate</span>
                        </a>
                        <p class="max-w-xs opacity-50 mb-4 lh-lg">
                            Discover and manage extraordinary events with the most sophisticated platform for event
                            organizers and attendees.
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Platform</h4>
                        <nav class="nav flex-column gap-2 footer-nav">
                            <a href="info.php#about" class="nav-link p-0 text-white-50">About Us</a>
                            <a href="events.php" class="nav-link p-0 text-white-50">Discover Events</a>
                            <a href="register.php" class="nav-link p-0 text-white-50">Register Now</a>
                            <a href="contact.php" class="nav-link p-0 text-white-50">Contact Support</a>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Legal</h4>
                        <nav class="nav flex-column gap-2 footer-nav">
                            <a href="info.php#privacy" class="nav-link p-0 text-white-50">Privacy Policy</a>
                            <a href="info.php#terms" class="nav-link p-0 text-white-50">Terms of Service</a>
                            <a href="info.php#help" class="nav-link p-0 text-white-50">Help Center</a>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
