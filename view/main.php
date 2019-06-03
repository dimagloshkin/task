<?php
if (!empty($_POST['userName']) and
    !empty($_POST['task']) and
    !empty($_POST['mail'])) {
   require_once ROOT . "/model/AddedTask.php";
   require_once ROOT . "/model/validation.php";
   $userName = $_POST['userName'];
   $task = $_POST['task'];
   $mail = $_POST['mail'];
   if (Validation::CheckMail($mail)) {
      AddedTask::AddTask($userName, $mail, $task);
      $_SESSION['addTask'] = 1;
      header("location: /");
   } else {
      $_SESSION['addTask'] = 0;
      header("location: /");
   }
}
preg_match("~[a-z]+\/[a-z]+\/~", $_SERVER['REQUEST_URI'], $uri);
$name = "sort/name/";
$mail = "sort/mail/";
$status = "sort/status/";
$offButton = "btn btn-info";
$onButton = "btn btn-primary";
?>
<div id="wrapper">
    <header>
        <h1 class="text-center">
            Задачник<br>
        </h1>
        <a class="btn btn-info btn-block" href="/admin" role="button">Админпанель</a><br>
        <span class="text-uppercase ">Сортировать по: </span>
        <a class="<?php if ($uri[0] == $name) {
           echo $onButton;
        } else {
           echo $offButton;
        } ?>" href="/sort/name/1" role="button"> имени </a>
        <a class="<?php if ($uri[0] == $mail) {
           echo $onButton;
        } else {
           echo $offButton;
        } ?>" href="/sort/mail/1" role="button"> почте </a>
        <a class="<?php if ($uri[0] == $status) {
           echo $onButton;
        } else {
           echo $offButton;
        } ?>" href="/sort/status/1" role="button"> статусу </a>
    </header>
   <?php
   foreach ($tasks as $task):
      ?>
       <div class="note">
           <p>
               <a class="<?php if (isset($_SESSION['admin'])) {
                  echo "glyphicon glyphicon-pencil";
               } ?>" href="/edit/<?= $task['id']; ?>"></a>
               <span class="date"><?= $task['mail']; ?></span>
               <span class="name"><?= $task['user_name']; ?></span>
              <?php
              if ($task['status'] == 1) {
                 ?>
                  <span class="glyphicon glyphicon-ok text-success">Решена</span>
                 <?php
              };
              ?>
           </p>
           <p>
              <?= $task['task']; ?>
           </p>

       </div>
   <?php
   endforeach;
   ?>
   <?php
   if (isset($_SESSION['addTask']) and $_SESSION['addTask'] == 1) {
      ?>
       <div class="info alert alert-info text-center ">
           Задача добавлена
       </div>
      <?php
   }
   if (isset($_SESSION['addTask']) and $_SESSION['addTask'] == 0) {
      ?>
       <div class="alert alert-danger  text-center ">
           Задача не добавлена, вы ввели неправильный mail
       </div>
      <?php
   }
   ?>
    <div id="form">
        <form action="" method="POST">

            <p><input class="form-control" placeholder="Введите ваше имя" name="userName"></p>
            <p><input class="form-control" placeholder="Введите ваш mail" name="mail"></p>
            <p><textarea class="form-control" placeholder="Введите задачу" name="task"></textarea></p>
            <p><input type="submit" class="btn btn-info btn-block" value="Добавить задачу"></p>
        </form>
    </div>


    <div class="text-center">
        <nav>
            <ul class="pagination">
               <?php
               $uri = ["sort/name/"];
               preg_match("~[a-z]+\/[a-z]+\/~", $_SERVER['REQUEST_URI'], $arrayWithUri);
               preg_match("~[0-9]+$~", $_SERVER['REQUEST_URI'], $page);
               if (!empty($arrayWithUri)) {
                  $uri = $arrayWithUri;
               }
               for ($i = 1; $i <= (count($allTasks) / 3) + 1; $i++):
                  ?>
                   <li class="<?php if ($page[0] == $i) {
                      echo "active";
                   } ?>"><a href="/<?= $uri[0] . $i; ?>" class="active"><?= $i; ?></a></li>
               <?php
               endfor;
               ?>

            </ul>
        </nav>
    </div>
</div>
