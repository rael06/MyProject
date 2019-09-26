<?php

use App\Autoloader;
use App\Core\Router;

define('URL', str_replace('index.php', '',
	(isset($_SERVER['HTTPS']) ? 'https' : 'http') .
	'://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
require "Core/Autoloader.php";
Autoloader::register();

$router = new Router();
$router->routerRequest();


