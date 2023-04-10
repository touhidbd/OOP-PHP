<?php
include('config/app.php');

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
            }
        } else {
            return false;
        }
    }
}

$authenticated = new AuthenticationController;
?>