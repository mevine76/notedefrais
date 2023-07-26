<?php
// nous ouvrons une session
session_start();

// nous vérifions si l'utilisateur est connecté à l'aide de la variable de session user
// si l'utilisateur n'est pas connecté, nous le redirigeons vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../controllers/login-controller.php');
    exit();
}

require_once '../config.php';
require_once '../helpers/Database.php';

require_once '../models/Employees.php';

?>


<!-- nous incluons la vue login-view.php -->
<?php include_once '../views/employees-dashboard-view.php' ?>