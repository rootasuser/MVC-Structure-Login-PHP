<?php
session_start();
require_once __DIR__ . '/../model/UserModel.php';

session_regenerate_id(true); // Prevent session fixation attacks

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
            $password = trim($_POST['password']);

            // Validate empty fields
            if (empty($username) || empty($password)) {
                $this->setToast('danger', 'Username and password are required!');
                header("Location: ../view/login.php");
                exit();
            }

            // Securely fetch user data
            $user = $this->userModel->getUserByUsername($username);

            // Verify user exists & password is correct
            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true); // prevent session fixation

                // Set secure session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['role'] = $user['role'];

                $this->setToast('success', 'Login successful!');
                header("Location: ../public/index.php"); // Redirect to dashboard
                exit();
            } else {
                $this->setToast('danger', 'Invalid username or password!');
                header("Location: ../view/login.php");
                exit();
            }
        }
    }

    // Helper function to store toast notifications
    private function setToast($type, $message) {
        $_SESSION['toast_type'] = $type;
        $_SESSION['toast_message'] = $message;
    }
}

// Initialize & call login function
$loginController = new LoginController();
$loginController->login();
?>
