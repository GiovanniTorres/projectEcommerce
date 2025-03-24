<?php
class Router {
    private $routes;

    public function __construct($route) {
        // Iniciamos la sesión si no ha sido iniciada.
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        // Si la sesión no tiene un índice 'i', lo inicializamos como falso.
        if (!isset($_SESSION['i'])) $_SESSION['i'] = false;

        // Definimos las rutas permitidas y su correspondiente vista o acción.
        $this->routes = [
            "home"          => "home",
            "tienda"        => "tienda",
            "cliente"       => "cliente",
            "detalle"       => "detalle",
            "iniciar_sesion"=> "iniciar_sesion",
            "exit"          => "logout"
        ];

        // Procesamos la ruta proporcionada.
        $this->handleRoute($route);
    }

    private function handleRoute($route) {
        $viewscontroller = new ViewsController();
        $divide = explode("/", $route);

        // Si se solicita un detalle específico.
        if (isset($divide[4]) && $divide[4] === "detalles") {
            $viewscontroller->view("/detalles");
        } 
        // Si la ruta existe en el arreglo de rutas permitidas.
        elseif (array_key_exists($divide[0], $this->routes)) {
            if ($divide[0] === "exit") { // Si la ruta es 'exit', se destruye la sesión.
                $user_session = new SessionController();
                $user_session->logout();
            } else {
                $viewscontroller->view($this->routes[$divide[0]]);
            }
        } 
        // Si la ruta no se encuentra, se muestra un error 404.
        else {
            $viewscontroller->view("404");
        }
    }
}