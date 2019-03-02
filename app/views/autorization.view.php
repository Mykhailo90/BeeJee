<?php require('partials/head.php'); ?>
<div class="container registr-form">
    <form method="post" action="/login">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <button type="submit" class="btn btn-success col-md-4 offset-4">Sign in</button>
    </form>
    <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert" id="error">Error login or password!</div>';
        }
    ?>
</div>
<?php require('partials/footer.php'); ?>