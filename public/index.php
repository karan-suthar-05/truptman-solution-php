<?php
use Core\Database;
use Core\Router;
use Core\Session;
session_start();
// require_once "router.php";
const BASE_PATH = __DIR__ . "/../";
require_once BASE_PATH . "/Core/functions.php";

spl_autoload_register(function($class){

    $result = str_replace("\\","/",$class);
    require base_path($result).".php";

});

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$router = new Router();
$routes = require base_path("routes.php");
$method = $_POST["_method"] ?? $_SERVER['REQUEST_METHOD'];

$config = require base_path("config.php");

$router->route($uri,$method);

Session::unflash();