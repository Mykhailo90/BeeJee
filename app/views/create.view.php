<?php require('partials/head.php'); ?>
<section>
    <div class="container col-md-6 offset-3">
        <form method="post" action="/task/store">
            <div class="form-group">
                <label for="login">Name</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="text">Task</label>
                <textarea class="form-control" id="text" rows="5" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Save</button>
        </form>
    </div>
</section>
<?php require('partials/footer.php'); ?>