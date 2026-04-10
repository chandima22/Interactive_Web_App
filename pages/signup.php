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
if ($error === 'email_exists') {
    $error_msg = "This email is already registered.";
} elseif ($error === 'empty_fields') {
    $error_msg = "Please fill in all fields.";
} elseif ($error === 'execution_failed') {
    $error_msg = "Something went wrong. Please try again.";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - EventMate</title>
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
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link py-3 px-lg-4" href="contact.php">Contact</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a href="login.php" class="icon-btn" title="Login"><i data-lucide="user"></i></a>
                        <a href="signup.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta text-dark">Get Started</a>
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
                        <h1 class="display-3 fw-bold mb-4">Join the <span class="text-gradient">Elite</span> Event Community.</h1>
                        <p class="lead opacity-75 mb-5 mb-lg-0">Create an account to unlock exclusive access to VIP tickets, early-bird notifications, and personalized event recommendations.</p>
                        
                        <div class="d-none d-lg-block mt-5">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <i data-lucide="zap" class="text-primary mt-1" style="width: 1.5rem;"></i>
                                <div>
                                    <h3 class="h6 fw-bold mb-1">Exclusive Access</h3>
                                    <p class="small opacity-50 mb-0">Get tickets before they go public.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <i data-lucide="target" class="text-primary mt-1" style="width: 1.5rem;"></i>
                                <div>
                                    <h3 class="h6 fw-bold mb-1">Personalized Feed</h3>
                                    <p class="small opacity-50 mb-0">Events tailored to your interests.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i data-lucide="layout" class="text-primary mt-1" style="width: 1.5rem;"></i>
                                <div>
                                    <h3 class="h6 fw-bold mb-1">Easy Management</h3>
                                    <p class="small opacity-50 mb-0">Keep track of all your bookings in one place.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1">
                        <div class="glass p-4 p-md-5 rounded-5 shadow-2xl position-relative border-white-5 overflow-hidden">
                            <div class="position-absolute top-0 end-0 bg-primary opacity-10 blur-3xl rounded-circle" style="width: 200px; height: 200px; transform: translate(30%, -30%);"></div>
                            
                            <div class="position-relative z-10">
                                <h2 class="h3 fw-bold mb-4">Create Account</h2>

                                <?php if ($error_msg): ?>
                                    <div class="alert alert-danger bg-glass border-0 border-start border-4 border-danger py-2 px-3 text-white small rounded-3 mb-4">
                                        <?php echo $error_msg; ?>
                                    </div>
                                <?php endif; ?>

                                <form action="../auth/register_handler.php" method="POST">
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
                                        Create Account
                                        <i data-lucide="user-plus" class="ms-2"></i>
                                    </button>
                                </form>

                                <div class="text-center mt-5 small opacity-75">
                                    Already have an account? <a href="login.php" class="text-white fw-bold text-decoration-none border-bottom border-primary">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
