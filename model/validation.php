<?php

class Validation
{
   static function CheckMail($mail)
   {
      if (preg_match("~^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$~", $mail)) {
         return true;
      } else {
         return false;
      }
   }

   static function CheckAdmin($login, $pass)
   {
      $errors = [];
      require_once ROOT . "/components/connect_db.php";
      $connect = ConnectionDB::getConnection();
      $sql = "SELECT * FROM `admin`";
      $result = $connect->query($sql);
      $admin = $result->fetch(PDO::FETCH_ASSOC);
      if ($admin['login'] !== $login) {
         $errors[] = "Неправильный логин <br>";
      }
      if ($admin['pass'] !== $pass) {
         $errors[] = "НЕправильный пароль <br>";
      }
      return $errors;
   }
}