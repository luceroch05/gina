<?php


// Verificar si la acción es cerrar sesión
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión o principal
    header("Location: login.php");  // Cambia 'login.php' a la página de login de tu aplicación
    exit;
}

$action = $_GET['action'] ?? 'admin_dashboard';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Fuente Raleway -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/stylesdash.css">
</head>
<body>

    <div class="wrapper">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>CYR Motors</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="?action=clientes">Clientes</a></li>
                    <li><a href="?action=pedidos">Pedidos</a></li>
                    <li><a href="?action=repuestos">Repuestos</a></li>
                    <li><a href="?action=categorias">Categorías</a></li>
                    <li><a href="?action=promociones">Promociones</a></li>
                    <li><a href="?action=logout">Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="main-content">
            <header class="main-header">
                <h1>Bienvenido al Panel de Administración</h1>
                <p>Aquí podrás gestionar el contenido de tu sitio.</p>
            </header>

            <div class="content">
                <?php
                // Cargar vistas basadas en la acción
                switch ($action) {
                    case 'admin_dashboard':
                        include 'dashboard.php';  // Cargar el Dashboard
                        break;

                    case 'clientes':
                        include 'clientesview.php';  // Vista para gestionar clientes
                        break;

                    case 'pedidos':
                        include 'pedidosview.php';  // Vista para gestionar pedidos
                        break;

                    case 'repuestos':
                        include 'repuestosview.php';  // Vista para gestionar repuestos
                        break;

                    case 'categorias':
                        include 'categoriasview.php';  // Vista para gestionar categorías
                        break;

                    case 'promociones':
                        include 'promocionesview.php';  // Vista para gestionar promociones
                        break;
                    
                    default:
                        echo "<p>Acción no encontrada.</p>";
                        break;
                }
                ?>
            </div>
        </main>
    </div>

</body>
</html>
