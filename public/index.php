<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit();
}

$role = $_SESSION['role'] ?? '';

switch ($_SESSION['role']) {
    case 'admin':
        header("Location: ../view/dashboard/");
        break;
    case 'cashier':
        header("Location: ../view/pos/");
        break;
    default:
        header("Location: ../view/dashboard/");
}
exit();
?>
