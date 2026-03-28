<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = sanitize_input($_POST['full_name']);
    $email = sanitize_input($_POST['email']);
    $event_id = sanitize_input($_POST['event_id']);
    $message = sanitize_input($_POST['message']);
    $user_id = is_logged_in() ? $_SESSION['user_id'] : null;

    if (empty($full_name) || empty($email) || empty($event_id)) {
        $error = "Required fields are missing.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO event_registrations (user_id, full_name, email, event_id, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $full_name, $email, $event_id, $message]);
            $success = "Registration confirmed! Check your email for details.";
        } catch(PDOException $e) {
            $error = "Registration failed. Try again later.";
        }
    }
}

// Fetch events for JS
$stmt = $pdo->query("SELECT * FROM events");
$all_events = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - EventMate</title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script>
        window.eventsData = <?php echo json_encode($all_events); ?>;
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
                        <a href="events.php" class="nav-link">Events</a>
                        <a href="register.php" class="nav-link active">Register</a>
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
        <main class="main-content">
            <section class="contact-hero container section">
                <div class="hero-blobs">
                    <div class="blob blob-1 animate-pulse" style="top: -10%; left: -10%;"></div>
                    <div class="blob blob-2 animate-pulse delay-700" style="bottom: -10%; right: -10%;"></div>
                </div>

                <div class="contact-grid relative">
                    <div style="z-index: 0;">
                        <h1 class="page-title" style="text-align: left; font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 1rem;">Register For An <span
                                class="text-gradient">Event</span></h1>
                        <p class="hero-desc" style="text-align: left; margin-left: 0;">Secure your spot at the most
                            anticipated events. Fill out the form below to register and receive your digital ticket
                            instantly.</p>
                        <?php if ($success): ?>
                            <div style="background: rgba(16, 185, 129, 0.2); color: #6ee7b7; padding: 1rem; border-radius: 0.75rem; border: 1px solid rgba(16, 185, 129, 0.3); margin-bottom: 2rem; font-size: 1rem;"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <?php if ($error): ?>
                            <div style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; padding: 1rem; border-radius: 0.75rem; border: 1px solid rgba(239, 68, 68, 0.3); margin-bottom: 2rem; font-size: 1rem;"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="register.php" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="full_name" placeholder="John Doe" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" placeholder="john@example.com" class="form-control" required value="<?php echo is_logged_in() ? htmlspecialchars($_SESSION['username'] . '@example.com') : ''; // Optional prefill ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Select Event</label>
                                <div class="form-select-wrap">
                                    <select class="form-control form-select" id="event-select" name="event_id" required>
                                        <option value="">Select an event</option>
                                        <!-- Options populated via script.js -->
                                    </select>
                                    <i data-lucide="chevron-down" class="form-select-icon"
                                        style="width: 1.25rem; height: 1.25rem;"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Additional Message</label>
                                <textarea name="message" rows="5" placeholder="Tell us about any special requirements..."
                                    class="form-control form-textarea"></textarea>
                            </div>

                            <div class="form-info">
                                <i data-lucide="info"
                                    style="color: var(--color-brand-primary); width: 1.5rem; height: 1.5rem;"></i>
                                <div class="form-info-text">
                                    By clicking submit, you agree to our terms of service and privacy policy. A
                                    confirmation email will be sent to your provided address with further instructions.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-glow">
                                Complete Registration
                                <i data-lucide="send"></i>
                            </button>
                        </form>
                    </div>

                    <div class="side-image hidden lg-block">
                        <div class="side-image-inner">
                            <img id="register-event-image"
                                src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=800"
                                alt="Event Registration" class="side-image-img" referrerpolicy="no-referrer"
                                style="transition: opacity 0.3s ease;" />
                            <div class="side-image-overlay"></div>
                            <div class="side-image-content">
                                <div class="glass p-6 rounded-3xl" style="padding: 2rem; border-radius: 1.5rem;">
                                    <div style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem;">Join the
                                        Community</div>
                                    <p style="color: rgba(255,255,255,0.6); font-size: 0.875rem;">Over 10,000+ people
                                        have already registered for upcoming events this year.</p>
                                </div>
                            </div>
                        </div>
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
                            <a href="info.php#support">Contact Support</a>
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
