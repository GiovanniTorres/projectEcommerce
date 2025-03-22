
require_once("./controllers/Autoload.php");
$autoload = new Autoload();4
$route = isset($_GET['r']) ? $_GET['r'] : 'home';
$router = new Router($route);




<?php

require_once("./controllers/Autoload.php");
$autoload = new Autoload();
$route = isset($_GET['r']) ? $_GET['r'] : 'home';
$router = new Router($route);