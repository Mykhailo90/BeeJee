<?php require('partials/head.php'); ?>
    <section>
        <div class="container col-md-6 offset-3">
            <form method="post" action="/task/update">
                <div class="form-group">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $task->id ?>" style="display: none">
                </div>
                <div class="form-group">
                    <label for="text">Task</label>
                    <textarea class="form-control" id="text" rows="5" name="text"><?= $task->text ?></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="" id="isDone">
                        <label class="form-check-label" for="isDone">
                            Check task as Done...
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Save</button>
            </form>
        </div>
    </section>
<?php require('partials/footer.php'); ?>