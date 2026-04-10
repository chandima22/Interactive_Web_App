<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

require_login(); // Ensure user is logged in
$user_id = $_SESSION['user_id'];
$user = get_user_by_id($pdo, $user_id);

// Fetch user's event registrations
$stmt = $pdo->prepare("
    SELECT r.*, e.title, e.event_date, e.location, e.image 
    FROM event_registrations r
    JOIN events e ON r.event_id = e.id
    WHERE r.user_id = ?
    ORDER BY r.created_at DESC
");
$stmt->execute([$user_id]);
$registrations = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - EventMate</title>
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
                            <a class="nav-link py-3 px-lg-4" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="icon-btn">
                            <i data-lucide="bell"></i>
                        </button>
                        <a href="dashboard.php" class="icon-btn active" title="Dashboard">
                            <i data-lucide="layout-dashboard"></i>
                        </a>
                        <a href="../auth/logout.php" class="btn btn-primary px-4 fw-bold rounded-pill h-cta">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content py-5">
            <div class="container position-relative">
                <div class="hero-blobs position-absolute top-0 start-50 translate-middle-x z-0 w-100 h-100" style="pointer-events: none;">
                    <div class="blob-1 opacity-10"></div>
                </div>

                <div class="py-5 position-relative z-10">
                    <h1 class="display-3 fw-bold mb-3 mt-4">
                        Welcome, <span class="text-gradient"><?php echo htmlspecialchars($user['username']); ?></span>
                    </h1>
                    <p class="lead opacity-50 mb-5">
                        Your personalized event dashboard. Manage your registrations and discover more experiences.
                    </p>
                </div>

                <div class="row g-4 mb-5 position-relative z-10">
                    <!-- User Info Card -->
                    <div class="col-lg-8">
                        <div class="glass p-4 p-md-5 rounded-5 h-100 border-white-5 shadow-lg">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                                    <i data-lucide="user" style="width: 1.5rem;"></i>
                                </div>
                                <h2 class="h4 fw-bold mb-0">Account Overview</h2>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-sm-4">
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Username</div>
                                    <div class="h5 fw-bold text-white"><?php echo htmlspecialchars($user['username']); ?></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Email Address</div>
                                    <div class="h5 fw-bold text-white"><?php echo htmlspecialchars($user['email']); ?></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-1">Member Since</div>
                                    <div class="h5 fw-bold text-white"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Card -->
                    <div class="col-lg-4">
                        <div class="glass p-4 p-md-5 rounded-5 h-100 border-white-5 shadow-lg d-flex flex-column justify-content-between">
                            <div>
                                <div class="small fw-bold text-uppercase ls-wide opacity-50 mb-2">Total Registrations</div>
                                <div class="display-3 fw-bold text-primary mb-3"><?php echo count($registrations); ?></div>
                            </div>
                            <a href="events.php" class="btn btn-primary rounded-pill py-3 fw-bold h-glow d-flex align-items-center justify-content-center gap-2">
                                Explore More Events
                                <i data-lucide="arrow-right" style="width: 1.25rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-5 mt-5 position-relative z-10">
                    <h2 class="h3 fw-bold mb-0">Your <span class="text-gradient">Registrations</span></h2>
                </div>

                <div class="row g-4 position-relative z-10">
                    <?php if (empty($registrations)): ?>
                        <div class="col-12 text-center py-5 my-5 opacity-50">
                            <i data-lucide="calendar-x" style="width: 4rem; height: 4rem;" class="mb-3"></i>
                            <h3 class="h4">No registrations yet</h3>
                            <p>You haven't registered for any events. Start exploring!</p>
                            <a href="events.php" class="btn btn-outline-light rounded-pill px-4 mt-3">Browse Events</a>
                        </div>
                    <?php else: ?>
                        <?php foreach ($registrations as $reg): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 border-0 bg-transparent overflow-hidden h-card shadow-lg rounded-4">
                                    <div class="position-relative overflow-hidden" style="aspect-ratio: 4/5;">
                                        <img src="<?php echo $reg['image']; ?>" class="card-img-top h-100 object-fit-cover transition-scale" alt="<?php echo $reg['title']; ?>" referrerpolicy="no-referrer">
                                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-to-t opacity-75"></div>
                                        <span class="badge position-absolute top-3 start-3 bg-glass rounded-pill px-3 py-2 text-uppercase fw-bold" style="font-size: 0.65rem; top: 1.5rem; left: 1.5rem;">
                                            Registered
                                        </span>
                                        <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white">
                                            <div class="d-flex align-items-center gap-2 small opacity-75 mb-2 fw-bold text-uppercase">
                                                <i data-lucide="calendar" style="width: 1rem;"></i>
                                                <?php echo date('M j, Y', strtotime($reg['event_date'])); ?>
                                            </div>
                                            <h3 class="h5 fw-bold mb-0"><?php echo htmlspecialchars($reg['title']); ?></h3>
                                        </div>
                                    </div>
                                    <div class="card-body px-1 py-4 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                                            <i data-lucide="map-pin" style="width: 1rem;"></i>
                                            <span class="text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($reg['location']); ?></span>
                                        </div>
                                        <div class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-3 py-2">
                                            Confirmed
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
