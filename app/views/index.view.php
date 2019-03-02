<?php require('partials/head.php'); ?>

<div class="container">
    <h1>Tasks</h1>
    <a href="/task/create" type="button" class="btn btn-secondary btn-lg btn-block" id="addTask">Add new task</a>
</div>
<div class="container">
    <section>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>

                <?php
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin123') {
                        echo '<th scope="col">Change</th>';
                        echo '<th scope="col">Delete</th>';
                    }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vars['task'] as $task => $value): ?>
                <tr>
                    <td scope="row"><?php echo $value['login']; ?></td>
                    <td scope="row"><?php echo $value['email']; ?></td>
                    <td scope="row"><?php echo $value['text']; ?></td>
                    <?php if($value['stat']): ?>
                        <td scope="row">Done!</td>
                    <?php else: ?>
                        <td scope="row">In progress</td>
                    <?php endif; ?>
                    <td scope="row"><?php echo $value['created_at']; ?></td>
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin123') {
                        echo '<th scope="col"><td scope="row"><a href="/update/<?php echo $value[\'id\'];?>" title="Change">Change</a></td></th>';
                        echo '<td scope="row"><a href="/delete/<?php echo $value[\'id\']; ?>" title="Delete">Delete</a></td>';
                    }
                    ?>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section>
        <div class="clearfix">
            <?php echo $vars['pagination']; ?>
        </div>
    </section>

</div>

<?php require('partials/footer.php'); ?>
