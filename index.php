<?php
define("_LOGPATH_", "logs/");

session_start();

require_once("class.debug.php");
include("class.page_controller.php");
require_once("class.database.php");
require_once("database.webshop_items.php");

$database = new FonDatabase();
$itemDb = new FonWebshopDatabase();
$user = new FonUsers($database);




$myController = new FonController($database, $itemDb, $user);

$myController->fonRequestCheck();
