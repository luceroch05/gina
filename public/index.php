<?php
session_start();
require_once '../Controllers/PageController.php';
require_once '../Controllers/AuthController.php';
require_once '../Controllers/AdminController.php';

// Importar controladores
use Controllers\PageController;
use Controllers\AuthController;
use Controllers\AdminController;

// Capturar la acción
$action = $_GET['action'] ?? 'home';

// Enrutamiento básico
switch ($action) {
    case 'home':
        $pageController = new PageController();
        $pageController->home();
        break;

    case 'login':
        $authController = new AuthController();
        $authController->login();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    case 'admin_dashboard':
        // Ya no necesitas verificar el rol aquí, se hace en el controlador AuthController
        $adminController = new AdminController();
        $adminController->dashboard();
        break;

    default:
        echo "Página no encontrada.";
        break;
}
