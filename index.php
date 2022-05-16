<?php 

session_start();

require ("./Modules/db_module.php");
require ("./Models/BaseModel.php");
require ("./Controllers/BaseController.php");

$controllerName = isset($_REQUEST['controller'])?ucfirst((strtolower($_REQUEST['controller'])??'WelcomeController').'Controller'):"HomeController";

$actionName =strtolower($_REQUEST['action']??'index');

require ("./Controllers/".$controllerName.".php");

$controllerObject =new $controllerName();

$controllerObject->$actionName();

?>