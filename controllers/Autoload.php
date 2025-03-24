<?php
class Autoload {
    public function __construct() {
        // Registramos la función de autoload para cargar clases automáticamente.
        spl_autoload_register(function ($class_name) {
            // Rutas posibles para encontrar las clases.
            $paths = [
                "./controllers/$class_name.php",
                "./models/$class_name.php"
            ];

            // Recorremos las rutas y cargamos la clase si el archivo existe.
            foreach ($paths as $path) {
                if (file_exists($path)) {
                    require_once($path);
                    break; // Salimos del bucle al encontrar la clase.
                }
            }
        });
    }
}