<?php

class Route
{
   private $routes = [];

   function __construct()
   {
      $RoutesPath = ROOT . ('/config/routes.php');
      $this->routes = include "$RoutesPath";

   }//массив с маршрутами роута

   private function getUri()
   {
      if (!empty($_SERVER['REQUEST_URI'])) {
         return trim($_SERVER['REQUEST_URI']);
      }
   }//получаем URI

   public function run()
   {
      $uri = $this->getUri();

      foreach ($this->routes as $uriPattern => $path) {
         if (preg_match("#^/$uriPattern$#", $uri)) {
            $uriElement = preg_replace("#$uriPattern#", $path, $uri);
            $uriElement = trim($uriElement, '/');
            $elemController = explode('/', $uriElement);
            $nameController = ucfirst(array_shift($elemController)) . 'Controller';
            $nameAction = 'action' . ucfirst(array_shift($elemController));

//--------------------Передаем управление контролеру----------------------//
            $controllerFilePath = ROOT . "/controller/" . $nameController . '.php';
            if (file_exists($controllerFilePath)) {
               include "$controllerFilePath";
//---------------------Вызываем метод контроллера--------------------------//
               $objectController = new $nameController;
               $parametrs = $elemController;
//-----Вызываем метод $nameAction из $objectController, если есть параметры то передаем массивом $parameters---//
               $result = call_user_func_array(array($objectController, $nameAction), $parametrs);
               if ($result != null) {
                  break;
               }
               break;
            }
         }
      }
   }//Подключение нужного контроллера и метода
}