<?php
/**
 * Site configuration
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'Harsha Vardhan');
define('SITE_TAGLINE', 'Web Developer & Programmer');
define('SITE_EMAIL', 'umapathi2harsha@gmail.com');
define('SITE_PHONE', '+91 8885254742');
define('SITE_LOCATION', 'Tirupati, Andhra Pradesh');
define('SITE_GITHUB', 'https://github.com/HarshaVardhan108?tab=repositories');
define('SITE_LINKEDIN', 'https://www.linkedin.com/in/daruri-harsha-vardhan-naidu-4602b2206');

/**
 * URL prefix to the project root (where /assets lives).
 * Pages in subfolders can override: $basePath = '../'; before including header.
 */
if (!defined('BASE_PATH')) {
    define('BASE_PATH', isset($basePath) ? $basePath : './');
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
