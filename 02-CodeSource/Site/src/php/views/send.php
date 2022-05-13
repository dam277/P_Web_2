<?php
require_once(__DIR__."/../controllers/MainController.php");
var_dump($_GET);
$mainController = new MainController();
$mainController->start();
?>