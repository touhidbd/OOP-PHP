<?php
    include('config/app.php');
    include_once('controllers/AuthenticationController.php');

    $data = $authenticated->authDetail();

    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php include('message.php') ?>
            </div>
            <?php endif; ?>
            <div class="col-md-6 mx-auto">
                <div class="card p-0">
                    <div class="card-header">
                        <h1 class="card-title">Profile</h1>
                    </div>
                    <div class="card-body">
                        <h4 class="border py-2 px-3">Name: <strong class="float-end"><?= $data['fname']; ?> <?= $data['lname']; ?></strong></h4>
                        <h4 class="border py-2 px-3">Email: <strong class="float-end"><?= $data['email']; ?></strong></h4>
                        <h4 class="border py-2 px-3">Created At: <strong class="float-end"><?= date('d M Y', strtotime($data['created_at'])); ?></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include('includes/footer.php');
?>