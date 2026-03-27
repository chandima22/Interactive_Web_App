# EventMate - Phase 3 (PHP + MySQL)

This version upgrades the original frontend into a PHP + MySQL web application for the Phase 3 submission.

## Features
- User registration with `password_hash()`
- User login with `password_verify()`
- Logout functionality
- Contact form connected to MySQL
- Event registration form connected to MySQL
- Dashboard page for logged-in users
- MySQL export file included as `database.sql`

## Folder Structure
- `css/` - styles
- `js/` - client-side validation and event filtering
- `images/` - place logo or project images here
- `includes/` - database connection, helpers, shared layout files
- `auth/` - register, login, logout
- `contact.php`
- `events.php`
- `register_event.php`
- `dashboard.php`
- `index.php`
- `database.sql`

## How to Run with XAMPP / WAMP
1. Copy the project folder into `htdocs` (XAMPP) or `www` (WAMP).
2. Start **Apache** and **MySQL**.
3. Open **phpMyAdmin**.
4. Create a database named `eventmate_db` or simply import `database.sql` which will create it for you.
5. Import the `database.sql` file.
6. Open the project in the browser:
   - `http://localhost/eventmate_phase3/`
7. Default DB settings in `includes/db.php` are:
   - host: `localhost`
   - username: `root`
   - password: empty string
   - database: `eventmate_db`

## Submission Notes
- Push all files to GitHub
- Include `database.sql`
- Add your public GitHub repository link to LMS
