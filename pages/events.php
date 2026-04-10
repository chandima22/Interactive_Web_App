<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

init_session();
$all_events = get_all_events($pdo);

// Prepare data for JS
$events_json = json_encode($all_events);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events - EventMate</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <script>
        // Inject database events into JS global scope
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
                            <a class="nav-link active py-3 px-lg-4" href="events.php">Events</a>
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
        <main class="main-content pt-5">
            <div class="container position-relative">
                <div class="hero-blobs position-absolute top-0 start-50 translate-middle-x z-0 w-100 h-100" style="pointer-events: none;">
                    <div class="blob-1 opacity-10"></div>
                </div>

                <div class="text-center py-5 position-relative z-10">
                    <h1 class="display-3 fw-bold mb-3 mt-4">
                        Discover <span class="text-gradient">Events</span>
                    </h1>
                    <p class="lead opacity-50 mb-5 max-w-2xl mx-auto">
                        Explore a world of possibilities. From intimate workshops to massive festivals, find the
                        experiences that move you.
                    </p>
                    
                    <div class="search-box-wrap glass rounded-pill p-1 mx-auto max-w-xl d-flex align-items-center shadow-lg">
                        <i data-lucide="search" class="ms-3 opacity-50"></i>
                        <input type="text" placeholder="Search for events..." class="form-control border-0 bg-transparent text-white shadow-none ps-3 search-input" />
                    </div>
                </div>
            </div>

            <div class="container py-5">
                <!-- Filters Bar -->
                <div class="filter-bar glass rounded-4 p-2 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-5">
                    <div class="filter-tags d-flex flex-wrap gap-2 p-1">
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag active" data-category="All">All</button>
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag" data-category="Academic">Academic</button>
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag" data-category="Cultural">Cultural</button>
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag" data-category="Sports">Sports</button>
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag" data-category="Social">Social</button>
                        <button class="btn btn-sm rounded-pill px-4 py-2 filter-tag" data-category="Business">Business</button>
                    </div>
                    <div class="d-flex align-items-center gap-3 pe-md-3">
                        <div style="width: 1px; height: 1.5rem; background: rgba(255,255,255,0.1);" class="d-none d-md-block"></div>
                        <button class="btn btn-link text-white text-decoration-none d-flex align-items-center gap-2 small fw-bold opacity-75 h-opacity-100">
                            <i data-lucide="sliders-horizontal" style="width: 1rem;"></i>
                            Sort By
                            <i data-lucide="chevron-down" style="width: 1rem;"></i>
                        </button>
                    </div>
                </div>

                <!-- Events Grid -->
                <div class="row g-4 events-grid-compact" id="events-container">
                    <!-- Events dynamically rendered by script.js -->
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
                    <div class="col-lg-3 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Connect</h4>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-light sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;"><i data-lucide="twitter" style="width: 1.25rem;"></i></a>
                            <a href="#" class="btn btn-outline-light sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;"><i data-lucide="instagram" style="width: 1.25rem;"></i></a>
                        </div>
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
