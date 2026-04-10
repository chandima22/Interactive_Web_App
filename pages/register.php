<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

init_session();

$success_msg = "";
$error_msg = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = sanitize($_POST['full_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $event_id = $_POST['event_id'] ?? '';
    $message = sanitize($_POST['message'] ?? '');
    $user_id = is_logged_in() ? $_SESSION['user_id'] : null;

    if (empty($full_name) || empty($email) || empty($event_id)) {
        $error_msg = "Please fill in all required fields.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO event_registrations (user_id, full_name, email, event_id, message) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$user_id, $full_name, $email, $event_id, $message])) {
            $success_msg = "Registration successful! We have sent a confirmation email.";
        } else {
            $error_msg = "Something went wrong. Please try again.";
        }
    }
}

// Fetch events for dropdown
$stmt = $pdo->query("SELECT id, title, image FROM events ORDER BY title ASC");
$events = $stmt->fetchAll();

// Pre-selected event from URL
$url_event_id = $_GET['event'] ?? '';

// Pass data to JS for image logic
$events_json = json_encode($events);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - EventMate</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="icon" type="image/png" href="../assets/images/Logo.png">
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <script>
        // Inject database events for image preview logic
        window.eventsData = <?php echo $events_json; ?>;
    </script>
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
                            <a class="nav-link active py-3 px-lg-4" href="register.php">Register</a>
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
                                CREATE
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content py-4">
            <section class="container py-lg-4">
                <div class="row g-5 align-items-center position-relative">
                    <div class="hero-blobs position-absolute inset-0 z-0 opacity-10" style="pointer-events: none;">
                        <div class="blob-1"></div>
                    </div>

                    <div class="col-lg-6 position-relative z-10">
                        <h1 class="display-4 fw-bold mb-3 mt-4">Register For An <span class="text-gradient">Event</span></h1>
                        <p class="lead opacity-75 mb-5">Secure your spot at the most anticipated events. Fill out the form below to register and receive your digital ticket instantly.</p>
                        
                        <?php if ($success_msg): ?>
                            <div class="alert alert-success bg-glass border-0 border-start border-4 border-success text-white py-3 px-4 rounded-4 mb-4 shadow" role="alert">
                                <div class="d-flex align-items-center gap-3">
                                    <i data-lucide="check-circle" class="text-success"></i>
                                    <strong><?php echo $success_msg; ?></strong>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($error_msg): ?>
                            <div class="alert alert-danger bg-glass border-0 border-start border-4 border-danger text-white py-3 px-4 rounded-4 mb-4 shadow" role="alert">
                                <div class="d-flex align-items-center gap-3">
                                    <i data-lucide="alert-circle" class="text-danger"></i>
                                    <strong><?php echo $error_msg; ?></strong>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form action="register.php" method="POST" class="glass p-4 p-md-5 rounded-5 border-white-5 shadow-2xl">
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase ls-wide opacity-50 mb-2">Full Name</label>
                                    <input type="text" name="full_name" placeholder="John Doe" class="form-control form-control-lg bg-glass border-white-10 text-white placeholder-white-20 rounded-3 shadow-none" required 
                                        value="<?php echo is_logged_in() ? $_SESSION['username'] : ''; ?>" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase ls-wide opacity-50 mb-2">Email Address</label>
                                    <input type="email" name="email" placeholder="john@example.com" class="form-control form-control-lg bg-glass border-white-10 text-white placeholder-white-20 rounded-3 shadow-none" required />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase ls-wide opacity-50 mb-2">Select Event</label>
                                <select class="form-select form-select-lg bg-glass border-white-10 text-white rounded-3 shadow-none" id="event-select" name="event_id" required>
                                    <option value="" class="bg-dark">Select an event</option>
                                    <?php foreach ($events as $event): ?>
                                        <option value="<?php echo $event['id']; ?>" <?php echo ($url_event_id == $event['id']) ? 'selected' : ''; ?> class="bg-dark">
                                            <?php echo $event['title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase ls-wide opacity-50 mb-2">Additional Message</label>
                                <textarea name="message" rows="4" placeholder="Tell us about any special requirements..."
                                    class="form-control form-control-lg bg-glass border-white-10 text-white placeholder-white-20 rounded-3 shadow-none"></textarea>
                            </div>

                            <div class="alert alert-info bg-glass border-0 text-white-50 small mb-4 rounded-3 d-flex gap-3 align-items-center">
                                <i data-lucide="info" class="text-primary" style="flex-shrink: 0;"></i>
                                <span>By clicking submit, you agree to our terms of service and privacy policy. A confirmation email will be sent.</span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold h-glow shadow-lg mt-2">
                                Complete Registration
                                <i data-lucide="send" class="ms-2"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="position-relative ms-lg-5">
                            <div class="rounded-5 overflow-hidden shadow-2xl position-relative" style="aspect-ratio: 1/1;">
                                <img id="register-event-image"
                                    src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=800"
                                    alt="Event Registration" class="w-100 h-100 object-fit-cover transition-opacity" style="transition: opacity 0.4s ease;" referrerpolicy="no-referrer" />
                                <div class="position-absolute bottom-0 start-0 w-100 p-5 bg-gradient-to-t text-white">
                                    <div class="glass p-4 rounded-4 shadow-xl">
                                        <h3 class="h4 fw-bold mb-2">Join the Community</h3>
                                        <p class="small opacity-75 mb-0">Over 10,000+ people have already registered for upcoming events this year.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
