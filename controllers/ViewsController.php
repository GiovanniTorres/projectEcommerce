<?php
class ViewsController {
    // Ruta base para las vistas.
    private static $views_path = "./views/";

    // Función que muestra la vista solicitada.
    public function view($route) {
        $view = self::$views_path . $route . ".php";
        
        if (file_exists($view)) { // Verificamos si el archivo de la vista existe.
            require_once(self::$views_path . "header.php");
            require_once($view);
            require_once(self::$views_path . "footer.php");
        } else { // Si no existe, mostramos un mensaje de error 404.
            require_once(self::$views_path . "header.php");
            echo "<h1>404 - Página no encontrada</h1>";
            require_once(self::$views_path . "footer.php");
        }
    }
}