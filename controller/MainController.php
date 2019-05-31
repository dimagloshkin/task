<?php

class MainController
{
   function actionIndex()
   {
      require_once ROOT . "/view/components/header.php";
      require_once ROOT . "/view/main.php";
      require_once ROOT . "/view/components/footer.php";
   }

   function actionAuthorization()
   {
      require_once ROOT . "/view/components/header.php";
      require_once ROOT . "/view/adminAuthorization.php";
      require_once ROOT . "/view/components/footer.php";
   }
}