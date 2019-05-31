<?php
session_start();
//--------------------Front Controller------------------------//
ini_set('display_errors', 'on');
error_reporting(E_ALL);
//-------------путь к папке с проектом------------------------//
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
//-------------------подключение роутера----------------------//
require_once(ROOT . '/components/router.php');

$callRoute = new Route();
$callRoute->run();


