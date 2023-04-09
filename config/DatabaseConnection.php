<?php 

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($conn->connect_error)
        {
            die('<h2>Database Connection Failed!</h2>');
        } 
        // echo 'Database connected successfully!';
        return $this->conn = $conn;
    }
}

?>