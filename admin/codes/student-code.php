<?php
    include('../../config/app.php');
    include_once('../controllers/StudentController.php');

    if(isset($_POST['update_student']))
    {
        $id = validateInput($db->conn,$_POST['student_id']);
        $inputData = [
            'name'  => validateInput($db->conn,$_POST['name']),
            'email'  => validateInput($db->conn,$_POST['email']),
            'phone'  => validateInput($db->conn,$_POST['phone']),
            'course'  => validateInput($db->conn,$_POST['course']),
        ];

        $student = new StudentController;
        $result = $student->update($inputData, $id);
        if($result) {
            redirect("Student update successfully!", "admin/student-edit.php?id=".$id);
        } else {
            redirect("Something went wrong!", "admin/student-edit.php?id=".$id);
        }
    }

    if(isset($_POST['add_student']))
    {
        $inputData = [
            'name'  => validateInput($db->conn,$_POST['name']),
            'email'  => validateInput($db->conn,$_POST['email']),
            'phone'  => validateInput($db->conn,$_POST['phone']),
            'course'  => validateInput($db->conn,$_POST['course']),
        ];

        $student = new StudentController;
        $result = $student->create($inputData);
        if($result) {
            redirect("Student added successfully!", "admin/students.php");
        } else {
            redirect("Something went wrong!", "admin/add-student.php");
        }
    }


    if(isset($_POST['delete_student']))
    {
        $id = validateInput($db->conn,$_POST['delete_student']);

        $student = new StudentController;
        $result = $student->delete($id);
        if($result) {
            redirect("Student deleted successfully!", "admin/students.php");
        } else {
            redirect("Something went wrong!", "admin/student-edit.php?id=".$id);
        }
    }

?>