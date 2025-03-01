<?php
session_start();
require_once __DIR__ . '/../model/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
            $password = trim($_POST['password']);

            if (empty($username) || empty($password)) {
                $_SESSION['toast_type'] = 'danger';
                $_SESSION['toast_message'] = 'Username and password are required!';
                header("Location: ../view/login/");
                exit();
            }

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);

                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['role'] = $user['role'];

                $_SESSION['toast_type'] = 'success';
                $_SESSION['toast_message'] = 'Login successful!';
                header("Location: ../public/index.php");
                exit();
            } else {
                $_SESSION['toast_type'] = 'danger';
                $_SESSION['toast_message'] = 'Invalid username or password!';
                header("Location: ../view/login/");
                exit();
            }
        }
    }
}

// Initialize and call login function
$loginController = new LoginController();
$loginController->login();
?>
