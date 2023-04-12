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
                            <li class="breadcrumb-item active">View Student</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    if(isset($_GET['id'])) {
                                        $student_id = validateInput($db->conn, $_GET['id']);
                                        $student = new StudentController;
                                        $result = $student->view($student_id);
                                        if($result) {
                                            ?>
                                                <div class="card">
                                                    <div class="border p-4">
                                                        <h3>Name: <span class="float-end"><?= $result['name']; ?></span></h3>
                                                    </div>
                                                    <div class="border p-4">
                                                        <h3>Email: <span class="float-end"><?= $result['email']; ?></span></h3>
                                                    </div>
                                                    <div class="border p-4">
                                                        <h3>Phone: <span class="float-end"><?= $result['phone']; ?></span></h3>
                                                    </div>
                                                    <div class="border p-4">
                                                        <h3>Pourse: <span class="float-end"><?= $result['course']; ?></span></h3>
                                                    </div>
                                                </div>                                          
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
