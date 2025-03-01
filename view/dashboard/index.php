<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Enable only on HTTPS
ini_set('session.use_only_cookies', 1);

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login/");
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
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['firstname']); ?>!</h1>
    <p>This is the admin dashboard.</p>
    <a href="../logout/">Logout</a>
</body>
</html>
