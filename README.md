# 🚀 Modern Professional Portfolio

A high-performance, aesthetically pleasing, and fully responsive portfolio website designed for web developers. This project features a clean UI, interactive elements, and a robust PHP backend for managing content and user authentication.

## ✨ Features

- **🎯 Personal Branding**: Dedicated sections for Bio, Skills, and Featured Projects.
- **📱 Responsive Design**: Fully optimized for mobile and desktop viewports.
- **🔐 User Authentication**: Secure Sign-Up and Login systems for personal/admin use.
- **🛠️ Admin Dashboard**: Integrated interface to manage portfolio content and user roles.
- **✉️ Contact Integration**: Functional contact form with validation and feedback.
- **⚡ Performance First**: Optimized for fast loading using modern web standards.

## 🛠️ Technology Stack

- **Frontend**: 
  - HTML5 & CSS3 (Vanilla)
  - JavaScript (ES6+)
  - Google Fonts (Inter)
  - Font Awesome 6.5.0
- **Backend**: 
  - PHP (Server-side logic)
  - MySQL/MariaDB (Database)
- **Deployment**: 
  - Configured for XAMPP (Local) and InfinityFree (Remote)

## 📂 Project Structure

```bash
portfolio/
├── api/                # Backend API endpoints (PHP)
│   ├── admin/          # Admin-specific operations
│   ├── config/         # Database connection & settings
│   ├── editor/         # Content management (CRUD)
│   ├── middleware/     # Security and access control
│   ├── users/          # User management and authentication
│   └── viewer/         # Public data retrieval
├── css/                # Stylesheets (Modular CSS)
├── js/                 # Client-side scripts & interactivity
├── images/             # Visual assets and project screenshots
├── index.php           # Main application entry point
└── README.md           # Project documentation
```

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) or any PHP/MySQL local server environment.

### Local Installation
1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   ```
2. **Move to htdocs**:
   Place the project folder in your `C:\xampp\htdocs\` directory.
3. **Database Setup**:
   - Open `phpMyAdmin`.
   - Create a new database named `portfolio`.
   - Import the provided SQL schema (if available) or create tables for `users` and `content`.
4. **Configure Database Connection**:
   Update `api/config/db.php` with your local credentials:
   ```php
   $host = "localhost";
   $db_name = "portfolio";
   $username = "root";
   $password = "";
   ```
5. **Launch**:
   Open your browser and navigate to `http://localhost/portfolio`.

## 🎨 Design Philosophy
The portfolio follows a **Premium Dark/Light Hybrid Aesthetic** with:
- **Glassmorphism** inspired modal overlays.
- **Vibrant Gradients** for highlights.
- **Sleek Micro-animations** for improved user engagement.
- **Inter** typography for maximum readability.

## 🤝 Contributing
Feel free to fork this project and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License
© 2026 Aqsa. All rights reserved.