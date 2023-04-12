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

    public function edit($id)
    {
        $student_id =  validateInput($this->conn, $_GET['id']);
        $studentQuery = "SELECT * FROM students WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);

        if($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $student_id =  validateInput($this->conn, $id);

        $name = $inputData['name'];
        $email = $inputData['email'];
        $phone = $inputData['phone'];
        $course = $inputData['course'];
        
        $studentQuery = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' LIMIT 1";

        $result = $this->conn->query($studentQuery);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $student_id =  validateInput($this->conn, $id);        
        
        $studentQuery = "DELETE FROM students WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
}