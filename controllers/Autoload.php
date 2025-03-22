<?php
class Autoload {
    public function __construct() {
        // Registra la función de autoload que cargará las clases automáticamente
        spl_autoload_register(function ($class_name) {
            // Definimos las rutas donde buscaremos las clases
            $paths = [
                './controllers/',
                './models/',
                // Agregar más rutas si es necesario
            ];

            $class_loaded = false;

            // Recorremos las rutas para intentar encontrar el archivo de la clase
            foreach ($paths as $path) {
                $file_path = $path . $class_name . '.php';

                if (file_exists($file_path)) {
                    require_once($file_path); // Incluye el archivo si existe
                    $class_loaded = true;
                    break; // Si ya encontramos la clase, salimos del loop
                }
            }

            // Si no se encuentra la clase, mostramos un mensaje de error
            if (!$class_loaded) {
                echo "Error: La clase '$class_name' no fue encontrada en los directorios especificados.";
            }
        });
    }

    // Destructor para liberar recursos si es necesario
    public function __destruct() {
        unset($this->class_name);
    }
}