<?php
// Cargamos el archivo Autoload que se encarga de cargar automáticamente las clases necesarias.
require_once ("./controllers/Autoload.php");

// Iniciamos la clase Autoload para registrar las clases.
$autoload = new Autoload();

// Obtenemos la ruta desde la URL (parámetro 'r'). Si no se proporciona, se asume que es 'home'.
$route = isset($_GET["r"]) ? $_GET["r"] : "home";

// Creamos una instancia del Router que se encargará de manejar la ruta solicitada.
$router = new Router($route);