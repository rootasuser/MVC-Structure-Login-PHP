<?php
session_start(); // Start session if not started

// Unset all session variables
$_SESSION = [];

// Destroy session
session_destroy();

// Remove session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Redirect to login page
header("Location: /RootDir/view/login.php"); // Absolute path ensures correct redirection
exit;
?>
