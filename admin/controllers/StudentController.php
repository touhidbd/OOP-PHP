<?php

class StudentController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function index()
    {
        $studentQuery = "SELECT * FROM students";
        $result = $this->conn->query($studentQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function create($inputData)
    {
        $data = "'" . implode("','", $inputData) . "'";
        $studentQuery = "INSERT INTO students (name,email,phone,course) VALUES ($data)";
        $result = $this->conn->query($studentQuery);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
}