<?php
// include "../conf/database.php";
// $db = new Database;
// echo "Done With DB :)";



require_once 'app/config.php';
require_once 'app/controllers/OffreController.php';
require_once 'app/controllers/CategorieController.php';
require_once 'app/models/Offre.php';
require_once 'app/models/Categorie.php';
require_once 'app/routes.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'offre';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (isset($routes[$controller][$action])) {
    $route = $routes[$controller][$action];
    $exploded = explode('@', $route);
    $controllerName = $exploded[0];
    $actionName = $exploded[1];
    $controllerInstance = new $controllerName($db);
    $controllerInstance->$actionName();
} else {
    echo "Route non trouvée.";
}