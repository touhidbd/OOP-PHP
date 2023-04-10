<?php

class AuthenticationController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;

        $this->checkedIsLoggedIn();
    }

    public function checkedIsLoggedIn()
    {
        if (!isset($_SESSION['authenticated'])) {
            redirect("Please login to access the profile page!", 'login.php');
            return false;
        } else {
            return true;
        }
    }

    public function authDetail()
    {
        $checkAuth = $this->checkedIsLoggedIn();
        if ($checkAuth) {
            $user_id = $_SESSION['auth_user']['user_id'];
            $userData = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($userData);

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data;
            } else {
                redirect("Somthing went wrong!", "login.php");
                return false;
            }
        } else {
            return false;
        }
    }

    public function admin()
    {
        $user_id = $_SESSION['auth_user']['user_id'];
        $checkAdmin = "SELECT id,role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1";
        $result = $this->conn->query($checkAdmin);
        if ($result->num_rows == 1) {
            return true;
        } else {
            redirect("You are not authorized as admin!", "index.php");
            return false;
        }
    }
}

$authenticated = new AuthenticationController;
?>