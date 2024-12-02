<?php
session_start();
require_once '../Controllers/PageController.php';
require_once '../Controllers/AuthController.php';
require_once '../Controllers/AdminController.php';

// Importar controladores
use Controllers\PageController;
use Controllers\AuthController;
use Controllers\AdminController;

// Capturar la acción desde la URL (por defecto es 'home')
$action = $_GET['action'] ?? 'home';

// Si el usuario tiene rol de administrador y no hay una acción específica en la URL
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1 && $action === 'home') {
    $action = 'admin_dashboard'; // Redirigir al panel admin si no se ha especificado otra acción
}

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
    case 'clientes':
    case 'pedidos':
    case 'repuestos':
    case 'categorias':
    case 'promociones':
        // Todas las acciones relacionadas con el admin dashboard son gestionadas aquí
        $adminController = new AdminController();
        $adminController->dashboard();
        break;

    default:
        echo "Página no encontrada.";
        break;
}
