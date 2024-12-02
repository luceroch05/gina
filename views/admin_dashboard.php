<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="container">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <h2>Panel de Administración</h2>
            <nav>
                <ul>
                    <li><a href="index.php?action=clientes">Clientes</a></li>
                    <li><a href="index.php?action=pedidos">Pedidos</a></li>
                    <li><a href="index.php?action=repuestos">Repuestos</a></li>
                    <li><a href="index.php?action=categorias">Categorías</a></li>
                    <li><a href="index.php?action=promociones">Promociones</a></li>
                    <li><a href="index.php?action=logout">Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal que cambia -->
        <main class="main-content">
            <h1>Bienvenido al Panel de Administración</h1>
            <p>Aquí podrás gestionar el contenido de tu sitio.</p>

            <!-- Dependiendo de la acción, se mostrará contenido diferente -->
            <?php
            // Capturar acción para cargar la vista correspondiente
            $action = $_GET['action'] ?? 'admin_dashboard';

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
        </main>
    </div>
</body>
</html>
