<?php
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
            <h1>Home Page</h1>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>