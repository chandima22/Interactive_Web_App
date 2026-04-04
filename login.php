<?php
require_once 'includes/functions.php';
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
                    <a href="login.php" class="icon-btn" style="color: var(--color-brand-primary);">
                        <i data-lucide="user"></i>
                    </a>
                    <a href="signup.php" class="btn btn-primary header-cta">
                        Get Started
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content auth-container mesh-bg relative">
            <div class="hero-blobs">
                <div class="blob blob-1 animate-pulse" style="top: -10%; right: -10%;"></div>
                <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; left: -10%;"></div>
            </div>

            <div class="container relative z-10 w-full">
                <div class="auth-grid">
                    <div>
                        <h1 class="auth-title">
                            Welcome <span class="text-gradient">Back</span>.
                        </h1>
                        <p class="auth-desc">
                            Sign in to your EventMate account to manage your bookings, discover new experiences, and
                            access your tickets.
                        </p>

                        <div class="auth-features">
                            <div class="auth-feature">
                                <div class="auth-feature-icon">
                                    <div class="auth-feature-dot"></div>
                                </div>
                                <div>
                                    <h3 class="auth-feature-title">Exclusive Access</h3>
                                    <p class="auth-feature-desc">Get tickets before they go public.</p>
                                </div>
                            </div>
                            <div class="auth-feature">
                                <div class="auth-feature-icon">
                                    <div class="auth-feature-dot"></div>
                                </div>
                                <div>
                                    <h3 class="auth-feature-title">Personalized Feed</h3>
                                    <p class="auth-feature-desc">Events tailored to your interests.</p>
                                </div>
                            </div>
                            <div class="auth-feature">
                                <div class="auth-feature-icon">
                                    <div class="auth-feature-dot"></div>
                                </div>
                                <div>
                                    <h3 class="auth-feature-title">Easy Management</h3>
                                    <p class="auth-feature-desc">Keep track of all your bookings in one place.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-card" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
                        <div
                            style="position: absolute; top: 0; right: 0; width: 16rem; height: 16rem; background-color: rgba(139, 92, 246, 0.1); border-radius: 50%; filter: blur(80px); transform: translate(50%, -50%);">
                        </div>

                        <div style="position: relative; z-index: 10;">
                            <h2 style="font-size: 1.875rem; font-weight: 700; margin-bottom: 2.5rem;">Sign In</h2>

                            <?php if ($error_msg): ?>
                                <div class="glass" style="padding: 1rem; border-radius: 1rem; border-left: 4px solid #ef4444; margin-bottom: 1.5rem;">
                                    <p style="color: #ef4444; font-weight: 600;"><?php echo $error_msg; ?></p>
                                </div>
                            <?php endif; ?>

                            <form action="auth/login_handler.php" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div class="form-control-icon-wrap">
                                        <i data-lucide="mail" class="form-control-icon"></i>
                                        <input type="email" name="email" placeholder="jane@example.com"
                                            class="form-control form-control-with-icon" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <div class="form-control-icon-wrap">
                                        <i data-lucide="lock" class="form-control-icon"></i>
                                        <input type="password" name="password" placeholder="••••••••"
                                            class="form-control form-control-with-icon" required />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-glow form-submit"
                                    style="width: 100%;">
                                    Sign In
                                    <i data-lucide="log-in"></i>
                                </button>
                            </form>

                            <div class="auth-form-footer">
                                Don't have an account?
                                <a href="signup.php" class="auth-form-link">Create Account</a>
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
