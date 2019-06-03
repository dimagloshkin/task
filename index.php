<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once(ROOT . '/components/router.php');

$callRoute = new Route();
$callRoute->run();


