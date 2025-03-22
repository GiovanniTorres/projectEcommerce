// Requiere el archivo de Autoload.php para manejar la carga automática de clases
require_once("./controllers/Autoload.php");

// Instancia de la clase Autoload para registrar el autoloading
$autoload = new Autoload();4

// Obtiene la ruta de la solicitud, por defecto es 'home'
$route = isset($_GET['r']) ? $_GET['r'] : 'home';

// Instancia el enrutador con la ruta solicitada
$router = new Router($route);