<?php
session_start(); // Start session if not started

// Set HTTP headers to prevent caching (protects against session replay attacks)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Unset all session variables
$_SESSION = [];

// Destroy session
session_destroy();

// Remove session cookie (prevent session hijacking)
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Redirect to login page (force new session on next login)
header("Location: ../view/login.php");
exit;
?>
