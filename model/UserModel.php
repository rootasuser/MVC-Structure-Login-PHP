<?php
require_once __DIR__ . '/../config/Database.php';

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUserByUsername($username) {
        $sql = "SELECT id, firstname, lastname, username, role, password FROM users WHERE username = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($user = $result->fetch_assoc()) {
                return $user;
            } else {
                return null; 
            }
        } else {
            error_log("DB ERR: " . $this->conn->error);
            return null;
        }
    }
    
}
?>
