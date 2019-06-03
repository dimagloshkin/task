<?php

class MainController
{
   function actionIndex($sort = "status", $page = 1)
   {
      require_once ROOT . "/model/DbOperations.php";
      $tasks = DbOperations::Pagination($sort, $page);
      $allTasks = DbOperations::getAllTasks();
      require_once ROOT . "/view/components/header.php";
      require_once ROOT . "/view/main.php";
      require_once ROOT . "/view/components/footer.php";

   }

   function actionAuthorization()
   {
      require_once ROOT . "/view/components/header.php";
      require_once ROOT . "/model/validation.php";
      require_once ROOT . "/view/adminAuthorization.php";
      require_once ROOT . "/view/components/footer.php";
   }
}