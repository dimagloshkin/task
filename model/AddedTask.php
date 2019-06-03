<?php

class AddedTask
{
   static function AddTask($userName,$mail, $task)
   {
      require_once ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $sql = "INSERT INTO `tasks` SET 
                `user_name` = :userName, 
                `mail` = :mail, 
                `task` = :task
      ";
      $result = $connect->prepare($sql);
      $result->bindParam(':userName',$userName,PDO::PARAM_STR);
      $result->bindParam(':mail',$mail,PDO::PARAM_STR);
      $result->bindParam(':task',$task,PDO::PARAM_STR);
      return $result->execute();

   }
}