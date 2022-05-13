<?php 
session_start();

include_once("02-CodeSource/Site/src/php/controllers/MainController.php");
$controller = new MainController();
$controller->start();
?>
