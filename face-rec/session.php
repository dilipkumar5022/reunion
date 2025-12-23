<?php
// Start session securely
session_name("PICKLESESS"); // Optional custom session name
$secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
$httponly = true;
$samesite = 'Strict'; // Or 'Lax' if needed for some cross-site usage

session_set_cookie_params([
    'lifetime' => 0, // Until browser closes
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => $secure,
    'httponly' => $httponly,
    'samesite' => $samesite
]);

session_start();

// Optional: Set session timeout
$timeout = 1800; // 30 mins
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>