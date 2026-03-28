<?php
require_once 'includes/functions.php';
if (is_logged_in()) {
    redirect('dashboard.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - EventMate</title>
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
                    <?php if (is_logged_in()): ?>
                        <a href="dashboard.php" class="icon-btn">
                            <i data-lucide="layout-dashboard"></i>
                        </a>
                        <a href="auth/logout.php" class="btn btn-primary header-cta" style="background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.1);">
                            Log Out
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="icon-btn">
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
        <main class="main-content auth-container mesh-bg relative">
            <div class="hero-blobs">
                <div class="blob blob-1 animate-pulse" style="top: -10%; right: -10%;"></div>
                <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; left: -10%;"></div>
            </div>

            <div class="container relative z-10 w-full">
                <div class="auth-grid">
                    <div>
                        <h1 class="auth-title">
                            Join the <span class="text-gradient">Elite</span> <br />
                            Event Community.
                        </h1><br><br>
                        <p class="auth-desc">
                            Create an account to unlock exclusive access to VIP tickets, early-bird notifications, and
                            personalized event recommendations.
                        </p><br><br>

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
                            <h2 style="font-size: 1.875rem; font-weight: 700; margin-bottom: 2.5rem;">Create Account
                            </h2>

                            <?php
                            if (isset($_SESSION['error'])) {
                                echo '<div style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; padding: 1rem; border-radius: 0.75rem; border: 1px solid rgba(239, 68, 68, 0.3); margin-bottom: 1.5rem; text-align: center; font-size: 0.875rem;">' . $_SESSION['error'] . '</div>';
                                unset($_SESSION['error']);
                            }
                            ?>
                            <form action="auth/register_handler.php" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <div class="form-control-icon-wrap">
                                        <i data-lucide="user" class="form-control-icon"></i>
                                        <input type="text" name="username" placeholder="johndoe" class="form-control form-control-with-icon" required />
                                    </div>
                                </div>

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
                                    Create Account
                                    <i data-lucide="user-plus"></i>
                                </button>
                            </form>

                            <div class="auth-form-footer">
                                Already have an account?
                                <a href="login.php" class="auth-form-link">Sign In</a>
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
