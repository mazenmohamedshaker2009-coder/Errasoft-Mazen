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

                <form action="index.php?page=task-update" method="POST" class="form border p-2 my-5">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($task['id']) ?>"
                    >

                    <input
                        type="text"
                        name="title"
                        value="<?= htmlspecialchars($task['title']) ?>"
                        class="form-control my-3 border border-success"
                        placeholder="edit todo"
                    >

                    <input
                        type="submit"
                        value="Update"
                        class="form-control btn btn-primary my-3"
                    >

                </form>

            </div>

        </div>
    </div>

</body>
</html>
