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
                            <li class="breadcrumb-item active">Student List</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php include('../message.php') ?>
                                </div>
                                <?php endif; ?>
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Students List
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Course</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $students = new StudentController;
                                                    $result = $students->index();
                                                    if($result) {
                                                        foreach($result as $row) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $row['id']; ?></td>
                                                                    <td><?= $row['name']; ?></td>
                                                                    <td><?= $row['email']; ?></td>
                                                                    <td><?= $row['phone']; ?></td>
                                                                    <td><?= $row['course']; ?></td>
                                                                    <td>
                                                                        <a href="<?= base_url('admin/student-edit.php'); ?>?id=<?= $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                        <a href="<?= base_url('admin/student-view.php'); ?>?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="fa-regular fa-eye"></i></a>
                                                                        <a href="<?= base_url('admin/student-delete.php'); ?>?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo 'No students added!';
                                                    }
                                                ?>

                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
<?php include('inc/footer.php'); ?>
