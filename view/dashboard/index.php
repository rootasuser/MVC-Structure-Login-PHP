<?php
// Secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Enable only on HTTPS
ini_set('session.use_only_cookies', 1);

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit();
}

// Optional: Redirect users based on roles (Example: Only admin can access this page)
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../view/forbidden.php"); // Redirect unauthorized users
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['firstname'], ENT_QUOTES, 'UTF-8'); ?>!</h1>
    <p>This is the admin dashboard.</p>
    <a href="../../controller/LogoutController.php">Logout</a>


</body>
</html>
