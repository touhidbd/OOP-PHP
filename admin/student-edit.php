<?php 
    include('inc/header.php');
    include('inc/navbar.php'); 
    include_once('controllers/StudentController.php');
 ?>
        
        <div id="layoutSidenav">
            <?php include('inc/sidenav.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Students</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Student</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    if(isset($_GET['id'])) {
                                        $student_id = validateInput($db->conn, $_GET['id']);
                                        $student = new StudentController;
                                        $result = $student->edit($student_id);
                                        if($result) {
                                            ?>
                                                <form action="codes/student-code.php" method="POST">
                                                    <?php if(isset($_SESSION['message'])): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php include('../message.php') ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <input type="hidden" name="student_id" value="<?= $result['id']; ?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="<?= $result['name']; ?>">
                                                        <label for="name">Name</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="email" name="email" class="form-control" placeholder="name@example.com" value="<?= $result['email']; ?>">
                                                        <label for="floatingInput">Email Address</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="course" class="form-control" placeholder="Course" id="course" value="<?= $result['course']; ?>">
                                                        <label for="course">Course</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone" id="name" value="<?= $result['phone']; ?>">
                                                        <label for="phone">Phone</label>
                                                    </div>

                                                    <button class="w-100 btn btn-lg btn-primary" name="update_student" type="submit">Update</button>
                                                </form>                                            
                                            <?php
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">No record found!</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Something went wrong!</div>';
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
<?php include('inc/footer.php'); ?>
