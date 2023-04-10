<?php 
session_start();

// DB Connections
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'adminpanel');
define('SITE_URL', 'http://localhost/php-oop/');

include_once('DatabaseConnection.php');
$db = new DatabaseConnection;

// Basic Functions
function base_url($slug)
{
    echo SITE_URL.$slug;
}

function validateInput($dbcon,$input){
    return mysqli_real_escape_string($dbcon,$input);
}

function redirect($message,$page)
{
    $reedirect_to = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $reedirect_to");
    $exit(0);
}
?>