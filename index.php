<?php 
session_start();
// header("location: /02-CodeSource/site/src/php/views/home.php");
include_once("02-CodeSource/Site/src/php/controllers/MainController.php");
$controller = new MainController();
$controller->start();
?>
