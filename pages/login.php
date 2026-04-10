<?php
require_once '../includes/functions.php';
init_session();

// Redirect if already logged in
if (is_logged_in()) {
    header("Location: dashboard.php");
    exit();
}

$error = $_GET['error'] ?? '';
$error_msg = "";
if ($error === 'invalid_credentials') {
    $error_msg = "Invalid email or password.";
} elseif ($error === 'empty_fields') {
    $error_msg = "Please fill in all fields.";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - EventMate</title>
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
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="contact.php">Contact</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a href="login.php" class="icon-btn" style="color: var(--color-brand-primary);"><i data-lucide="user"></i></a>
                        <a href="signup.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta text-dark">Get Started</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content py-5 d-flex align-items-center">
            <div class="container py-lg-5 position-relative">
                <div class="hero-blobs position-absolute inset-0 z-0 opacity-10" style="pointer-events: none;">
                    <div class="blob-1"></div>
                </div>

                <div class="row g-5 align-items-center position-relative z-10">
                    <div class="col-lg-6">
                        <h1 class="display-3 fw-bold mb-4">Welcome <span class="text-gradient">Back</span>.</h1>
                        <p class="lead opacity-75 mb-5 mb-lg-0">Sign in to your EventMate account to manage your bookings, discover new experiences, and access your tickets.</p>
                        
                        <div class="d-none d-lg-block mt-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary rounded-circle" style="width: 10px; height: 10px;"></div>
                                <span class="fw-medium opacity-75">Exclusive access to early-bird tickets</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary rounded-circle" style="width: 10px; height: 10px;"></div>
                                <span class="fw-medium opacity-75">Personalized event recommendations</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary rounded-circle" style="width: 10px; height: 10px;"></div>
                                <span class="fw-medium opacity-75">Manage all your RSVPs in one place</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1">
                        <div class="glass p-4 p-md-5 rounded-5 shadow-2xl position-relative border-white-5 overflow-hidden">
                            <div class="position-absolute top-0 end-0 bg-primary opacity-10 blur-3xl rounded-circle" style="width: 200px; height: 200px; transform: translate(30%, -30%);"></div>
                            
                            <div class="position-relative z-10">
                                <h2 class="h3 fw-bold mb-4">Sign In</h2>

                                <?php if ($error_msg): ?>
                                    <div class="alert alert-danger bg-glass border-0 border-start border-4 border-danger py-2 px-3 text-white small rounded-3 mb-4">
                                        <?php echo $error_msg; ?>
                                    </div>
                                <?php endif; ?>

                                <form action="../auth/login_handler.php" method="POST">
                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-uppercase opacity-50">Email Address</label>
                                        <div class="input-group bg-glass border-white-10 rounded-3 overflow-hidden">
                                            <span class="input-group-text bg-transparent border-0 text-white-50"><i data-lucide="mail" style="width: 1.125rem;"></i></span>
                                            <input type="email" name="email" class="form-control bg-transparent border-0 text-white py-3 shadow-none" placeholder="jane@example.com" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-uppercase opacity-50">Password</label>
                                        <div class="input-group bg-glass border-white-10 rounded-3 overflow-hidden">
                                            <span class="input-group-text bg-transparent border-0 text-white-50"><i data-lucide="lock" style="width: 1.125rem;"></i></span>
                                            <input type="password" name="password" class="form-control bg-transparent border-0 text-white py-3 shadow-none" placeholder="••••••••" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold h-glow mt-2 shadow-lg">
                                        Sign In
                                        <i data-lucide="log-in" class="ms-2"></i>
                                    </button>
                                </form>

                                <div class="text-center mt-5 small opacity-75">
                                    Don't have an account? <a href="signup.php" class="text-white fw-bold text-decoration-none border-bottom border-primary">Create Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-about">
                        <a href="../index.php" class="footer-logo">
                            <div class="logo-icon">
                                <img src="../assets/images/Logo.png" alt="Logo">
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

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
