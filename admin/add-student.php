<?php 
    include('inc/header.php');
    include('inc/navbar.php'); 
 ?>
        
        <div id="layoutSidenav">
            <?php include('inc/sidenav.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Students</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Student</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="codes/student-code.php" method="POST">
                                    <?php if(isset($_SESSION['message'])): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php include('../message.php') ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                                        <label for="name">Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                        <label for="floatingInput">Email Address</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="course" class="form-control" placeholder="Course" id="course">
                                        <label for="course">Course</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" id="name">
                                        <label for="phone">Phone</label>
                                    </div>

                                    <button class="w-100 btn btn-lg btn-primary" name="add_student" type="submit">Add Student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
<?php include('inc/footer.php'); ?>
