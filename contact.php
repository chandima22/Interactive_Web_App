<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

init_session();

$success_msg = "";
$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = sanitize($_POST['first_name'] ?? '');
    $last_name = sanitize($_POST['last_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $message = sanitize($_POST['message'] ?? '');

    if (empty($first_name) || empty($last_name) || empty($email) || empty($message)) {
        $error_msg = "Please fill in all fields.";
    } else {
        $full_name = $first_name . ' ' . $last_name;
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$full_name, $email, $message])) {
            $success_msg = "Thank you! Your message has been sent successfully.";
        } else {
            $error_msg = "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - EventMate</title>
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
                        <a href="contact.php" class="nav-link active">Contact</a>
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
            <section class="contact-hero container section">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; left: -10%;"></div>
                    <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; right: -10%;"></div>
                </div>

                <div class="contact-grid">
                    <div>
                        <h1 class="hero-title" style="text-align: left;">Let's <span
                                class="text-gradient">Connect</span>.</h1>
                        <p class="hero-desc" style="text-align: left; margin-left: 0;">Have questions about an event or
                            want to partner with us? Our team is here to help you create extraordinary experiences.</p>

                        <div class="contact-items">
                            <div class="contact-item glass">
                                <div class="contact-icon"><i data-lucide="mail"></i></div>
                                <div class="contact-label">Email Us</div>
                                <div class="contact-value">hello@eventmate.com</div>
                            </div>
                            <div class="contact-item glass">
                                <div class="contact-icon"><i data-lucide="phone"></i></div>
                                <div class="contact-label">Call Us</div>
                                <div class="contact-value">+1 (555) 000-0000</div>
                            </div>
                            <div class="contact-item glass">
                                <div class="contact-icon"><i data-lucide="map-pin"></i></div>
                                <div class="contact-label">Visit Us</div>
                                <div class="contact-value">San Francisco, CA</div>
                            </div>
                            <div class="contact-item glass">
                                <div class="contact-icon"><i data-lucide="globe"></i></div>
                                <div class="contact-label">Support</div>
                                <div class="contact-value">help.eventmate.com</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-card" style="transition-delay: 200ms;">
                        <div class="form-header">
                            <div class="form-header-icon"
                                style="background-color: rgba(16, 185, 129, 0.1); color: var(--color-brand-secondary);">
                                <i data-lucide="message-square"></i>
                            </div>
                            <h2 class="form-header-title">Send a Message</h2>
                        </div>

                        <?php if ($success_msg): ?>
                            <div class="glass" style="padding: 1rem; border-radius: 1rem; border-left: 4px solid var(--color-brand-secondary); margin-bottom: 1.5rem;">
                                <p style="color: var(--color-brand-secondary); font-weight: 600;"><?php echo $success_msg; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if ($error_msg): ?>
                            <div class="glass" style="padding: 1rem; border-radius: 1rem; border-left: 4px solid #ef4444; margin-bottom: 1.5rem;">
                                <p style="color: #ef4444; font-weight: 600;"><?php echo $error_msg; ?></p>
                            </div>
                        <?php endif; ?>

                        <form action="contact.php" method="POST">
                            <div class="form-row">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" placeholder="Jane" class="form-control" required />
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Doe" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" placeholder="jane@example.com" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Your Message</label>
                                <textarea name="message" rows="6" placeholder="How can we help you today?"
                                    class="form-control form-textarea" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-glow form-submit"
                                style="width: 100%;">
                                Send Message
                                <i data-lucide="send"></i>
                            </button>
                        </form>
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
                        <div class="footer-dot"></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>
