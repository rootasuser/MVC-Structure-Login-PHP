<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS SYSTEM | PORTAL</title>

    <link rel="stylesheet" href="../public/assets/css/portal.css" />
    
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- jQuery & Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function () {
            <?php if (isset($_SESSION['toast_message'])): ?>
                M.toast({
                    html: "<?= $_SESSION['toast_message']; ?>",
                    classes: "<?= $_SESSION['toast_type']; ?> rounded",
                    displayLength: 5000
                });
                <?php unset($_SESSION['toast_message'], $_SESSION['toast_type']); ?>
            <?php endif; ?>
        });
    </script>
</head>
<body>

    <div class="login-container">
        <h2>POS SYSTEM PORTAL</h2>
        <form action="../controller/LoginController.php" method="POST">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn waves-effect waves-light">Login</button>
        </form>
    </div>

</body>
</html>
