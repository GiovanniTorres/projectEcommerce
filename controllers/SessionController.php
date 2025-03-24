<?php
class SessionController {
    private $session;

    public function __construct() {
        // Creamos una instancia de UserModel que se encargará de validar el usuario.
        $this->session = new UserModel();
    }

    // Función para iniciar sesión validando usuario y contraseña.
    public function login($usuario, $contrasena) {
        return $this->session->validate_user($usuario, $contrasena);
    }

    // Función para cerrar sesión.
    public function logout() {
        // Iniciamos la sesión si no ha sido iniciada.
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        // Destruimos la sesión actual.
        session_destroy();

        // Redirigimos al usuario a la página principal.
        header('Location: ./');
        exit();
    }
}