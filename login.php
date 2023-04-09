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
                    <h1 class="h2 mb-5 fw-normal">Login</h1>

                    <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php include('message.php') ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3 text-start">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button name="login_btn" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>