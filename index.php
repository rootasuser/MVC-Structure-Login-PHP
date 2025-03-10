<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: view/login.php");
    exit();
}

switch ($_SESSION['role']) {
    case 'admin':
        header("Location: view/dashboard/admin.php");
        exit();
    case 'manager':
        header("Location: view/dashboard/manager.php");
        exit();
    case 'cashier':
        header("Location: view/dashboard/cashier.php");
        exit();
    case 'stock_clerk':
        header("Location: view/dashboard/stock_clerk.php");
        exit();
    default:
        header("Location: view/login.php");
        exit();
}
?>
