<?php
if (isset($_POST['submit'])) {
   $status = $_POST['status'];
   $task = $_POST['task'];
   $idTask = $taskes['id'];
   DbOperations::ChangeTask($status, $task,$idTask);
   header("Location: /");
}
?>
<div id="wrapper">
    <div class="auth">
        <div id="form">
            <form action="" method="POST">
                <h2 class="text-center">Редактировать задачу</h2>
                <p><input class="form-control" value="<?= $taskes['status'] ?>" type="text" name="status"></p>
                <p><textarea class="form-control" name="task"><?= $taskes['task'] ?></textarea></p>
                <p><input type="submit" class="btn btn-info btn-block" value="Изменить" name="submit"></p>
            </form>
        </div>
    </div>

</div>








