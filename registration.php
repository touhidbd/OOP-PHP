<?php
    include('includes/header.php');
    include('includes/navbar.php');
    $auth->isLoggedIn();
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">

                <form action="" method="POST">
                    <h1 class="h2 mb-5 fw-normal">Registration</h1>

                    <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php include('message.php') ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-floating mb-3">
                        <input type="text" name="fname" class="form-control" id="fast-name" placeholder="First Name">
                        <label for="floatingInput">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="lname" class="form-control" id="last-name" placeholder="Last Name">
                        <label for="floatingInput">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                        <label for="floatingPassword">Confirm Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" name="register_btn" type="submit">Register</button>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>