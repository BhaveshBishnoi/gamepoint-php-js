<?php
// Database Configuration
// Database Configuration
define('DB_HOST', 'localhost'); // Hostinger value: localhost
define('DB_NAME', 'u493306999_game'); // Update with your Hostinger Database Name
define('DB_USER', 'u493306999_game'); // Update with your Hostinger Database User
define('DB_PASS', 'Game@1313');       // Update with your Hostinger Database Password

// Site Configuration
define('SITE_URL', 'http://game.bhaveshbishnoi.com');
define('SITE_NAME', 'GamePoint');
define('SITE_DESCRIPTION', 'Browse and download the best mobile games');

// Paths
define('BASE_PATH', __DIR__ . '/..');
define('UPLOAD_PATH', BASE_PATH . '/uploads');

// Error Reporting (set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('UTC');

// Session
session_start();
