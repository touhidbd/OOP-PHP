<?php
    include_once('controllers/RegisterController.php');
    include_once('controllers/LoginController.php');


    $auth = new LoginController;

    // Logout
    if(isset($_POST['btn_logout']))
    {
        $checkLoggedOut = $auth->logout();
        if($checkLoggedOut) {
            redirect("Logged out successfully!", "login.php");
        }
    }

    // Login
    if(isset($_POST['login_btn']))
    {
        $email = validateInput($db->conn, $_POST['email']);
        $password = md5(validateInput($db->conn, $_POST['password']));
        $checkLogin = $auth->userLogin($email,$password);
        if($checkLogin)
        {
            if($_SESSION['auth_role'] == '1') {
                redirect("Logged in successfully!", "admin/");
            } else {
                redirect("Logged in successfully!", "index.php");
            }            
        }
        else {
            redirect("Invaild email or password!", "login.php");
        }
    }

    // Registration
    if(isset($_POST['register_btn']))
    {
        $fname = validateInput($db->conn, $_POST['fname']);
        $lname = validateInput($db->conn, $_POST['lname']);
        $email = validateInput($db->conn, $_POST['email']);
        $password = md5(validateInput($db->conn, $_POST['password']));
        $confirm_password = md5(validateInput($db->conn, $_POST['confirm_password']));

        $register = new RegisterController;
        $result_password = $register->confirmPassword($password, $confirm_password);
        
        if($result_password) {
            $result_user = $register->isUserExists($email);

            if($result_user) {
                redirect("Already email exists!", "registration.php");
            } else {
                $register_query = $register->registration($fname,$lname,$email,$password);
                if($register_query) {
                    redirect("Registered Successfully!", "login.php");
                } else {
                    redirect("Something went wrong!", "registration.php");
                }
            }

        } else {
            redirect("Password and Confirm Password does not match!", "registration.php");
        }
    }
?>