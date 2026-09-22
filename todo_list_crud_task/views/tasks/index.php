<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <div class="row">

            <div class="col-8 mx-auto">

                <?php if (isset($_SESSION['massage'])): ?>

                    <?php
                    $massage = $_SESSION['massage'];
                    $type = $massage['type'] === 'error' ? 'danger' : $massage['type'];
                    ?>

                    <div class="alert alert-<?= htmlspecialchars($type) ?> alert-dismissible fade show my-4" role="alert">
                        <strong><?= htmlspecialchars($massage['title']) ?></strong>
                        <div><?= htmlspecialchars($massage['massage']) ?></div>
                    </div>

                    <?php unset($_SESSION['massage']); ?>

                <?php endif; ?>

                <form action="index.php?page=task-store" method="POST" class="form border p-2 my-5">
                    <input
                        type="text"
                        name="title"
                        class="form-control my-3 border border-success"
                        placeholder="add new todo"
                    >

                    <input
                        type="submit"
                        value="Add"
                        class="form-control btn btn-primary my-3"
                    >
                </form>

            </div>

            <div class="col-12">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (empty($tasks)): ?>

                            <tr>
                                <td colspan="3" class="text-center">
                                    No data found
                                </td>
                            </tr>

                        <?php else: ?>

                            <?php foreach ($tasks as $task): ?>

                                <tr>
                                    <td><?= htmlspecialchars($task['id']) ?></td>

                                    <td>
                                        <?= htmlspecialchars($task['title']) ?>
                                    </td>

                                    <td>
                                        
                                        <a href="index.php?page=task-destroy&id=<?= $task['id'] ?>" class="btn btn-danger">

                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>

                                        <a href="index.php?page=task-edit&id=<?= $task['id'] ?>" class="btn btn-info">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>                </table>
            </div>

        </div>
    </div>

</body>
</html>
