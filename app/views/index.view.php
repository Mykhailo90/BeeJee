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
            <?php foreach ($allTasks as $task): ?>
                <tr>
                    <td scope="row"><?php echo $task->user_name; ?></td>
                    <td scope="row"><?php echo $task->email; ?></td>
                    <td scope="row"><?php echo $task->text; ?></td>
                    <?php if($task->status): ?>
                        <td scope="row">Done!</td>
                    <?php else: ?>
                        <td scope="row">In progress</td>
                    <?php endif; ?>
                    <td scope="row"><?php echo $task->created_at; ?></td>
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin123') {
                        echo '<td scope="row"><a href="/task/update?id='.$task->id.'">Change</a></td>';
                        echo '<td scope="row"><a href="/task/delete?id='.$task->id.'">Delete</a></td>';
                    }
                    ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
<?php require('partials/footer.php'); ?>
