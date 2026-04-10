# EventMate - Premium Event Discovery Platform 🚀

EventMate is a sophisticated, full-stack web application designed for discovering and managing extraordinary events. Built with a modern glassmorphism aesthetic, it offers a seamless experience for both event organizers and attendees.

## ✨ Features

- **Modern Glassmorphism UI**: High-end, premium design with vibrant gradients and smooth micro-animations.
- **User Authentication**: Secure signup and login system with session management.
- **Dynamic Event Discovery**: 
  - Real-time searching and category filtering.
  - Interactive event cards with detailed information (Date, Time, Location).
  - Responsive 4-column grid layout for optimized browsing.
- **Event Registration**: Simplified registration process for users to join upcoming events.
- **Fully Responsive**: Optimized for Desktop, Tablet, and Mobile devices.
- **PHP Backend**: Robust server-side logic and MySQL database integration.

## 🛠️ Technology Stack

- **Frontend**: HTML5, Vanilla CSS3 (Custom Design System), JavaScript (ES6+), Bootstrap 5.3.3.
- **Backend**: PHP 8.x.
- **Database**: MySQL (PDO for secure data handling).
- **Icons**: Lucide Icons.
- **Fonts**: Inter, Outfit, Space Grotesk.

## 🚀 Setup Instructions (Local Development)

### 1. Database Configuration
1. Start your local server (XAMPP/WAMP/MAMP).
2. Open **phpMyAdmin** and create a new database named `eventmate_db`.
3. Import the `database.sql` file located in the root directory.

### 2. Project Installation
1. Move the `Interactive_Web_App` folder into your server's web root (e.g., `htdocs` for XAMPP).
2. Ensure the database connection details in `includes/db.php` match your local environment:
   ```php
   $host = 'localhost';
   $db   = 'eventmate_db';
   $user = 'root';
   $pass = ''; // Default for XAMPP
   ```

### 3. Accessing the App
Open your browser and navigate to:
`http://localhost/Interactive_Web_App/index.php`

## 📁 Project Structure

```text
├── assets/             # CSS, JS, and Images
├── auth/               # User authentication logic (Login/Signup/Logout)
├── includes/           # Database connection and utility functions
├── pages/              # Main application pages (Events, Contact, etc.)
├── index.php           # Landing page
└── database.sql        # Database schema and sample data
```

---
Built with Passion by EventMate Team.
