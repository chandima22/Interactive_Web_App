# EventMate - PHP & MySQL Migration (Phase 3)

This project has been successfully migrated from a static HTML/JS frontend into a fully functional dynamic PHP web application with a robust MySQL backend architecture!

## Features Added
- **Authentication**: Secure User Registration and Login using `password_hash()` and `password_verify()`.
- **Database Driven Events**: All events are loaded dynamically from MySQL while preserving the beautiful Javascript search/filter UI perfectly.
- **Event Registration**: Users can register for events which records seamlessly to the database, auto-filling credentials if logged in.
- **User Dashboard**: A dedicated dashboard for logged-in users to manage and view their registered tickets.
- **Support Forms**: Working Contact Us form capturing submissions into a secure database table.
- **Dynamic Headers**: Login/Signup buttons transform to Dashboard/Logout conditionally automatically across all standard pages.

## File Organization
- `assets/`
  - `css/` - Centralized CSS system (styles.css)
  - `js/` - Vanilla Javascript frontend UI logic
  - `images/` - Dynamic event and branding images
- `includes/`
  - `db.php` - PDO Database connectivity module
  - `functions.php` - Abstracted sanitization & Session helpers
- `auth/`
  - `register_handler.php` - Captures `signup.php` form
  - `login_handler.php` - Captures `login.php` form
  - `logout.php` - Wipes active PHP session data
- Root Files:
  - `index.php`, `events.php`, `register.php`, `contact.php`, `info.php`, `dashboard.php`, `login.php`, `signup.php`, `database.sql`

## How to Run Locally with XAMPP/WAMP
1. Ensure your local server environment (XAMPP/WAMP/MAMP) is active. Place this entire folder directly inside your `htdocs` or `www` directory.
2. Start the **Apache** and **MySQL** services from the control panel.
3. Open your browser and navigate to `http://localhost/phpmyadmin/`.
4. Navigate to **Import** and upload the provided `database.sql` file. This automatically creates the `eventmate_db` database, its 4 essential tables, and seeds it with all 25 sample events.
5. Visit the project in your browser! Example: `http://localhost/Event_Mate/Interactive_Web_App/` (Adjust path to your folder name).

Default connection assumed in `includes/db.php`:
- host: `localhost`
- user: `root`
- password: `""` (Empty string default for XAMPP)

## Built By
Antigravity Agent
