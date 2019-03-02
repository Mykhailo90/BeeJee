<nav class="navbar navbar-dark bg-dark">
    <a href='/' class="navbar-brand"><span id="brand">BeeJee</span></a>
    <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] != ''){
            echo '<a href="/logout" class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</a>';
        }
        else {
            echo '<a href="/autorization" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>';
        }
    ?>
</nav>