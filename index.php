<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

init_session();
$featured_events = get_featured_events($pdo, 4);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EventMate - Discover Your Next Adventure</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="icon" type="image/png" href="assets/images/Logo.png">
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="noise-overlay"></div>
        <!-- Header -->
        <nav class="navbar navbar-expand-lg sticky-top nav-glass">
            <div class="container">
                <a class="navbar-brand logo d-flex align-items-center gap-2" href="index.php">
                    <div class="logo-icon">
                        <img src="assets/images/Logo.png" alt="Logo" width="32" height="32">
                    </div>
                    <span class="logo-text">EventMate</span>
                </a>
                
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i data-lucide="menu" class="text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active py-3 px-lg-4" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="pages/events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="pages/register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-lg-4" href="pages/contact.php">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="icon-btn">
                            <i data-lucide="bell"></i>
                        </button>
                        <?php if (is_logged_in()): ?>
                            <a href="pages/dashboard.php" class="icon-btn" title="Dashboard">
                                <i data-lucide="layout-dashboard"></i>
                            </a>
                            <a href="auth/logout.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta">
                                Logout
                            </a>
                        <?php else: ?>
                            <a href="pages/login.php" class="icon-btn" title="Login">
                                <i data-lucide="user"></i>
                            </a>
                            <a href="pages/signup.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta">
                                Get Started
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">

            <!-- Hero Section -->
            <section class="hero-section position-relative overflow-hidden d-flex align-items-center">
                <div class="container py-5 mt-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-8 mx-auto text-center z-10">
                            <h1 class="hero-title fw-bolder mb-4">
                                Create <span class="text-gradient">Memories</span> <br />
                                That Last Forever.
                            </h1>
                            <p class="hero-desc opacity-75 mb-5 mx-auto">
                                Discover and join amazing events near you. EVENT MATE brings Academic, Cultural, Sports,
                                Business events and social programs together in one place.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="pages/events.php" class="btn btn-primary btn-lg px-5 py-3 rounded-4 fw-bold shadow-lg h-glow">
                                    Explore Events
                                    <i data-lucide="arrow-right" class="ms-2"></i>
                                </a>
                                <a href="pages/signup.php" class="btn btn-outline-light btn-lg px-5 py-3 rounded-4 fw-bold bg-glass">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Floating Right Content (Desktop Only) -->
                <div class="hero-floating-right d-none d-lg-block z-10">
                    <div class="hero-img-container">
                        <img src="https://images.unsplash.com/photo-1540575861501-7ad05823c93b?auto=format&fit=crop&q=80&w=1200" 
                            alt="Live Event" class="img-fluid rounded-5 shadow-2xl animate-float">
                        <div class="hero-card-floating glass p-3 rounded-4 d-flex align-items-center gap-3">
                            <div class="icon-box bg-primary-subtle text-primary p-2 rounded-3">
                                <i data-lucide="ticket" style="width: 1.5rem; height: 1.5rem;"></i>
                            </div>
                            <div>
                                <div class="fw-bold fs-5">1.2k+</div>
                                <div class="small opacity-50">Tickets Sold Today</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Background Elements -->
                <div class="hero-blobs position-absolute inset-0 z-0">
                    <div class="blob-1"></div>
                    <div class="blob-2"></div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats-section py-5 position-relative z-10 stats-responsive-margin">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4 col-sm-6">
                            <div class="stat-card glass p-4 rounded-4 d-flex align-items-center gap-4 transition-transform text-white">
                                <div class="stat-icon bg-primary-subtle p-3 rounded-4">
                                    <i data-lucide="calendar" class="text-primary" style="width: 2rem; height: 2rem;"></i>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">50+</div>
                                    <div class="small text-uppercase opacity-50 fw-semibold">Active Events</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="stat-card glass p-4 rounded-4 d-flex align-items-center gap-4 transition-transform text-white">
                                <div class="stat-icon bg-success-subtle p-3 rounded-4">
                                    <i data-lucide="users" class="text-success" style="width: 2rem; height: 2rem;"></i>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">10k+</div>
                                    <div class="small text-uppercase opacity-50 fw-semibold">Happy Attendees</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 d-none d-md-flex">
                            <div class="stat-card glass p-4 rounded-4 d-flex align-items-center gap-4 transition-transform text-white">
                                <div class="stat-icon bg-warning-subtle p-3 rounded-4">
                                    <i data-lucide="trophy" class="text-warning" style="width: 2rem; height: 2rem;"></i>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">25</div>
                                    <div class="small text-uppercase opacity-50 fw-semibold">Award Wins</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Events Section -->
            <section class="py-5 my-5 container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-4">
                    <div class="max-w-xl">
                        <h2 class="display-5 fw-bold mb-3">Featured <span class="text-gradient">Events</span></h2>
                        <p class="lead opacity-50 mb-0">
                            Handpicked experiences curated just for you. Don't miss out on the most anticipated
                            gatherings of the season.
                        </p>
                    </div>
                    <a href="pages/events.php" class="btn btn-link text-decoration-none p-0 fw-bold d-flex align-items-center gap-2 primary-link">
                        View All Events
                        <i data-lucide="arrow-right" style="width: 1.25rem;"></i>
                    </a>
                </div>

                <div class="row g-4">
                    <?php foreach ($featured_events as $event): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card event-card h-100 border-0 bg-transparent overflow-hidden">
                            <div class="position-relative overflow-hidden rounded-4 shadow-sm" style="aspect-ratio: 4/5;">
                                <img src="<?php echo $event['image']; ?>" class="card-img-top h-100 object-fit-cover transition-scale" alt="<?php echo $event['title']; ?>" referrerpolicy="no-referrer">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-to-t pointer-events-none opacity-25"></div>
                                <span class="badge position-absolute bg-glass rounded-pill px-3 py-2 text-uppercase fw-bold" style="font-size: 0.65rem; top: 1.5rem; left: 1.5rem;">
                                    <?php echo $event['category']; ?>
                                </span>
                            </div>
                            <div class="card-body px-1 py-4">
                                <h3 class="h5 fw-bold mb-3 text-white"><?php echo $event['title']; ?></h3>
                                
                                <div class="d-flex flex-column gap-2 mb-4">
                                    <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                                        <i data-lucide="calendar" style="width: 1rem;"></i>
                                        <?php echo date('M d, Y', strtotime($event['event_date'])); ?>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                                        <i data-lucide="clock" style="width: 1rem;"></i>
                                        09:00 AM - 05:00 PM
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                                        <i data-lucide="map-pin" style="width: 1rem;"></i>
                                        <?php echo $event['location']; ?>
                                    </div>
                                </div>

                                <a href="pages/register.php?event=<?php echo $event['id']; ?>" class="btn btn-primary w-100 rounded-3 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                                    Register Now
                                    <i data-lucide="arrow-right" style="width: 1.25rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-5 my-5 container">
                <div class="cta-box glass position-relative overflow-hidden rounded-5 p-5 p-lg-5 text-center shadow-xl">
                    <div class="position-absolute top-0 start-0 w-100 h-100 mesh-bg opacity-50 z-0"></div>
                    <div class="cta-content position-relative z-10 max-w-3xl mx-auto py-5">
                        <h2 class="display-4 fw-bold mb-4">Ready to start your <br /> next <span class="text-gradient">adventure?</span></h2>
                        <p class="lead opacity-75 mb-5">
                            Join thousands of event enthusiasts and organizers. Sign up today and get exclusive access
                            to early-bird tickets and VIP experiences.
                        </p>
                        <a href="pages/signup.php" class="btn btn-primary btn-lg px-5 py-3 rounded-4 fw-bold shadow-lg h-glow">
                            Join the Community
                            <i data-lucide="arrow-right" class="ms-2"></i>
                        </a>
                    </div>
                </div>
            </section>

        </main>

        <!-- Footer -->
        <footer class="py-5 mt-5 border-top border-white-5 opacity-75">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-5">
                        <a href="index.php" class="navbar-brand logo d-flex align-items-center gap-2 mb-4">
                            <div class="logo-icon">
                                <img src="assets/images/Logo.png" alt="Logo" width="32" height="32">
                            </div>
                            <span class="logo-text">EventMate</span>
                        </a>
                        <p class="max-w-xs opacity-50 mb-4 lh-lg">
                            Discover and manage extraordinary events with the most sophisticated platform for event
                            organizers and attendees.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#" class="icon-btn sm text-white-50"><i data-lucide="twitter" style="width: 1.25rem;"></i></a>
                            <a href="#" class="icon-btn sm text-white-50"><i data-lucide="instagram" style="width: 1.25rem;"></i></a>
                            <a href="#" class="icon-btn sm text-white-50"><i data-lucide="facebook" style="width: 1.25rem;"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Platform</h4>
                        <nav class="nav flex-column gap-2 footer-nav">
                            <a href="pages/info.php#about" class="nav-link p-0 text-white-50">About Us</a>
                            <a href="pages/events.php" class="nav-link p-0 text-white-50">Discover Events</a>
                            <a href="pages/register.php" class="nav-link p-0 text-white-50">Register Now</a>
                            <a href="pages/contact.php" class="nav-link p-0 text-white-50">Contact Support</a>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Legal</h4>
                        <nav class="nav flex-column gap-2 footer-nav">
                            <a href="pages/info.php#privacy" class="nav-link p-0 text-white-50">Privacy Policy</a>
                            <a href="pages/info.php#terms" class="nav-link p-0 text-white-50">Terms of Service</a>
                            <a href="pages/info.php#help" class="nav-link p-0 text-white-50">Help Center</a>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h4 class="h6 fw-bold text-uppercase ls-wide mb-4 text-white">Newsletter</h4>
                        <p class="small text-white-50 mb-4">Stay updated with the latest events and news.</p>
                        <div class="input-group mb-3 bg-glass rounded-3 overflow-hidden p-1">
                            <input type="text" class="form-control border-0 bg-transparent text-white shadow-none ps-3" placeholder="email@ext.com">
                            <button class="btn btn-primary rounded-2 px-3 fw-bold shadow-none" type="button">Join</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-5 mt-5 border-top border-white-5 small text-white-50">
                    <p class="mb-0">© 2026 EventMate. All rights reserved.</p>
                    <div class="d-flex align-items-center gap-3 mt-3 mt-md-0">
                        <span>Built with Passion</span>
                        <div style="width: 4px; height: 4px; border-radius: 50%; background: var(--color-brand-primary);"></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        // Initialize Lucide Icons again for dynamic content
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>
