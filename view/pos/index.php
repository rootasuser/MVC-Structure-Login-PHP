<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit();
}


if ($_SESSION['role'] !== 'cashier') {
    header("Location: ../view/login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['firstname'], ENT_QUOTES, 'UTF-8'); ?>!</h1>
    <p>This is the Cashier dashboard.</p>
    <a href="../../controller/LogoutController.php">Logout</a>


</body>
</html>
