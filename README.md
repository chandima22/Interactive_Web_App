# EventMate - Local Event Guide (Phase 03 PHP)

EventMate is a sophisticated platform for discovering and managing extraordinary events. This version (Phase 03) features a complete PHP backend with MySQL database integration for user accounts, event management, registrations, and contact form submissions.

## Features
- **User Authentication**: Secure signup, login, and logout with password hashing.
- **Dynamic Events**: Events are fetched and rendered from a MySQL database.
- **Event Registration**: Users can register for events, with data saved to the database.
- **Contact Form**: Message submissions are stored for administrator review.
- **User Dashboard**: Logged-in users can view their profile and registered events.
- **Glassmorphism UI**: High-end, modern design preserved from the original frontend.

## Setup Instructions (XAMPP/WAMP)

### 1. Database Setup
1. Open **phpMyAdmin** (usually `http://localhost/phpmyadmin`).
2. Create a new database named `eventmate_db`.
3. Click on the `Import` tab.
4. Choose the `database.sql` file from the project root.
5. Click `Go` to execute the SQL and create tables with sample data.

### 2. Project Placement
1. Copy the entire `Interactive_Web_App` folder into your local server's root directory:
   - For XAMPP: `C:\xampp\htdocs\EventMate`
   - For WAMP: `C:\wamp64\www\EventMate`

### 3. Database Configuration
The project uses the following default configuration in `includes/db.php`:
- **Host**: `localhost`
- **Database**: `eventmate_db`
- **Username**: `root`
- **Password**: `""` (empty)

If your setup differs, please update `includes/db.php` accordingly.

### 4. Running the Project
1. Start Apache and MySQL in your XAMPP/WAMP Control Panel.
2. Open your browser and navigate to `http://localhost/EventMate/index.php`.

## Project Structure
- `includes/db.php`: Database connection using PDO.
- `includes/functions.php`: Common PHP utility functions.
- `auth/`: Backend handlers for registration, login, and logout.
- `index.php`, `events.php`, etc.: Main application pages.
- `assets/`: Frontend styling, scripts, and images.
- `database.sql`: MySQL database schema and seed data.
