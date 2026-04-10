<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

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
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="icon" type="image/png" href="../assets/images/Logo.png">
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
                            <a class="nav-link active py-3 px-lg-4" href="contact.php">Contact</a>
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
                                CREATE
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content py-5">
            <div class="container py-lg-5 position-relative">
                <div class="hero-blobs position-absolute inset-0 z-0 opacity-10" style="pointer-events: none;">
                    <div class="blob-1"></div>
                </div>

                <div class="row g-5 align-items-center position-relative z-10">
                    <div class="col-lg-6">
                        <h1 class="display-3 fw-bold mb-4">Let's <span class="text-gradient">Connect</span>.</h1>
                        <p class="lead opacity-75 mb-5">Have questions about an event or want to partner with us? Our team is here to help you create extraordinary experiences.</p>

                        <div class="row g-4 mb-5">
                            <div class="col-sm-6">
                                <div class="glass p-4 rounded-4 shadow-sm h-100 border-white-5">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-inline-block mb-3">
                                        <i data-lucide="mail" style="width: 1.5rem;"></i>
                                    </div>
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Email Us</div>
                                    <div class="fw-medium">hello@eventmate.com</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="glass p-4 rounded-4 shadow-sm h-100 border-white-5">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-inline-block mb-3">
                                        <i data-lucide="phone" style="width: 1.5rem;"></i>
                                    </div>
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Call Us</div>
                                    <div class="fw-medium">+94700000000</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="glass p-4 rounded-4 shadow-sm h-100 border-white-5">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-inline-block mb-3">
                                        <i data-lucide="map-pin" style="width: 1.5rem;"></i>
                                    </div>
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Visit Us</div>
                                    <div class="fw-medium">colombo, sri lanka</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="glass p-4 rounded-4 shadow-sm h-100 border-white-5">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-inline-block mb-3">
                                        <i data-lucide="globe" style="width: 1.5rem;"></i>
                                    </div>
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Support</div>
                                    <div class="fw-medium">help.eventmate.com</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1">
                        <div class="glass p-4 p-md-5 rounded-5 shadow-2xl position-relative border-white-5 overflow-hidden">
                            <div class="position-absolute top-0 end-0 bg-primary opacity-10 blur-3xl rounded-circle" style="width: 200px; height: 200px; transform: translate(30%, -30%);"></div>
                            
                            <div class="position-relative z-10">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                                        <i data-lucide="message-square" style="width: 1.5rem;"></i>
                                    </div>
                                    <h2 class="h4 fw-bold mb-0">Send a Message</h2>
                                </div>

                                <?php if ($success_msg): ?>
                                    <div class="alert alert-success bg-glass border-0 border-start border-4 border-success text-white py-3 px-4 rounded-4 mb-4 shadow" role="alert">
                                        <strong><?php echo $success_msg; ?></strong>
                                    </div>
                                <?php endif; ?>

                                <?php if ($error_msg): ?>
                                    <div class="alert alert-danger bg-glass border-0 border-start border-4 border-danger text-white py-3 px-4 rounded-4 mb-4 shadow" role="alert">
                                        <strong><?php echo $error_msg; ?></strong>
                                    </div>
                                <?php endif; ?>

                                <form action="contact.php" method="POST">
                                    <div class="row g-3 mb-4">
                                        <div class="col-6">
                                            <label class="form-label small fw-bold text-uppercase opacity-50">First Name</label>
                                            <input type="text" name="first_name" class="form-control bg-glass border-white-10 text-white py-3 shadow-none rounded-3" placeholder="Jane" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label small fw-bold text-uppercase opacity-50">Last Name</label>
                                            <input type="text" name="last_name" class="form-control bg-glass border-white-10 text-white py-3 shadow-none rounded-3" placeholder="Doe" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-uppercase opacity-50">Email Address</label>
                                        <input type="email" name="email" class="form-control bg-glass border-white-10 text-white py-3 shadow-none rounded-3" placeholder="jane@example.com" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small fw-bold text-uppercase opacity-50">Your Message</label>
                                        <textarea name="message" rows="5" class="form-control bg-glass border-white-10 text-white py-3 shadow-none rounded-3" placeholder="How can we help you today?" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold h-glow shadow-lg mt-2">
                                        Send Message
                                        <i data-lucide="send" class="ms-2"></i>
                                    </button>
                                </form>
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
                    <div class="col-lg-5 text-center text-lg-start">
                        <a href="../index.php" class="navbar-brand logo d-flex align-items-center justify-content-center justify-content-lg-start gap-2 mb-4">
                            <div class="logo-icon">
                                <img src="../assets/images/Logo.png" alt="Logo" width="32" height="32">
                            </div>
                            <span class="logo-text">EventMate</span>
                        </a>
                        <p class="opacity-50 mb-4 lh-lg">Discover and manage extraordinary events with the most sophisticated platform for event organizers and attendees.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center text-md-start">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Platform</h4>
                        <nav class="nav flex-column gap-2 footer-nav">
                            <a href="info.php#about" class="nav-link p-0 text-white-50">About Us</a>
                            <a href="events.php" class="nav-link p-0 text-white-50">Discover Events</a>
                            <a href="register.php" class="nav-link p-0 text-white-50">Register Now</a>
                            <a href="contact.php" class="nav-link p-0 text-white-50">Contact Support</a>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center text-md-start">
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
