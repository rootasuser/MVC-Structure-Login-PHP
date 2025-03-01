<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../controller/LoginController.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        // Display toast notifications
        <?php
        if (isset($_SESSION['toast_message'])) {
            echo "toastr." . $_SESSION['toast_type'] . "('" . $_SESSION['toast_message'] . "');";
            unset($_SESSION['toast_message']);
            unset($_SESSION['toast_type']);
        }
        ?>
    </script>
</body>
</html>
