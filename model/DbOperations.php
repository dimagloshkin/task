<?php

class DbOperations
{
   static function Pagination($paramSort = null, $page = 1)
   {
      include ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $quanTaskFromPage = 3;
      $nuberPage = $page;
      $paginFormula = ($nuberPage - 1) * $quanTaskFromPage;
      switch ($paramSort) {
         case "name";
            $sql = "SELECT * FROM `tasks` ORDER BY `user_name`  LIMIT " . $paginFormula . ", " . $quanTaskFromPage;
            break;
         case "mail";
            $sql = "SELECT * FROM `tasks` ORDER BY `mail`  LIMIT " . $paginFormula . ", " . $quanTaskFromPage;;
            break;
         case "status";
            $sql = "SELECT * FROM `tasks` ORDER BY `status` DESC LIMIT  " . $paginFormula . ", " . $quanTaskFromPage;;
            break;
         default:
            $sql = "SELECT * FROM `tasks`  LIMIT " . $paginFormula . ", " . $quanTaskFromPage;
      }
      $result = $connect->query($sql);
      $tasks = $result->fetchAll(PDO::FETCH_ASSOC);
      return $tasks;
   }

   static function getAllTasks()
   {
      require_once ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $sql = "SELECT * FROM `tasks`";
      $result = $connect->query($sql);
      $allTasks = $result->fetchAll(PDO::FETCH_ASSOC);
      return $allTasks;
   }

   static function getTaskByID($id_task)
   {
      require_once ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $sql = "SELECT * FROM `tasks` WHERE `id` = $id_task";
      $result = $connect->query($sql);
      $taskById = $result->fetch(PDO::FETCH_ASSOC);
      return $taskById;
   }

   static function ChangeTask($status, $task)
   {
      require_once ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $sql = "UPDATE `tasks` SET 
                `status` = :status,            
                `task` = :task
      ";
      $result = $connect->prepare($sql);
      $result->bindParam(':status', $status, PDO::PARAM_STR);
      $result->bindParam(':task', $task, PDO::PARAM_STR);
      return $result->execute();
   }
}