<?php 
    include('inc/header.php');
    include('inc/navbar.php'); 
 ?>
        
        <div id="layoutSidenav">
            <?php include('inc/sidenav.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php include('../message.php') ?>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
<?php include('inc/footer.php'); ?>
