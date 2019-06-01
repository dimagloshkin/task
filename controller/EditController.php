<?php

class EditController
{
   function actionEdit($id_task)
   {
      require_once ROOT . "/view/components/header.php";
      require_once ROOT . "/model/DbOperations.php";
      $task = DbOperations::getTaskByID($id_task);
      require_once ROOT . "/view/editTask.php";
      require_once ROOT . "/view/components/footer.php";
   }
}