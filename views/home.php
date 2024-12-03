<?php

use Controllers\RepuestoController;

// Incluir el controlador de repuestos
require_once '../controllers/RepuestoController.php';

$repuestoController = new RepuestoController();
$repuestos = $repuestoController->read(); // Obtener todos los repuestos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <!-- Barra de navegación -->
    <nav class="bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 p-6 shadow-xl fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php?action=home" class="text-white font-extrabold text-2xl tracking-wider hover:text-yellow-400 transition duration-300">CYR Motors</a>
            <ul class="flex space-x-8 text-lg">
                <li><a href="index.php?action=home" class="hover:text-yellow-400 transition duration-300">Inicio</a></li>
                <li><a href="index.php?action=contacto" class="hover:text-yellow-400 transition duration-300">Contacto</a></li>
                <li><a href="index.php?action=repuestos" class="hover:text-yellow-400 transition duration-300">Repuestos</a></li>
                <li><a href="index.php?action=nosotros" class="hover:text-yellow-400 transition duration-300">Nosotros</a></li>

                <?php if (!isset($_SESSION['username'])): ?>
                    <li><a href="index.php?action=login" class="hover:text-yellow-400 transition duration-300">Login</a></li>
                <?php else: ?>
                    <li class="flex items-center">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></li>
                    <li><a href="index.php?action=logout" class="hover:text-yellow-400 transition duration-300">Cerrar sesión</a></li>
                    <li><a href="index.php?action=cart" class="hover:text-yellow-400 transition duration-300">Carrito</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto p-6 mt-32">
        <h1 class="text-5xl font-extrabold text-center text-white mb-6">Bienvenido a CYR Motors</h1>
        <p class="text-xl text-center text-gray-400 mb-8">Encuentra los mejores repuestos para tu vehículo y realiza tus compras fácilmente.</p>

        <!-- Sección de repuestos disponibles -->
        <h2 class="text-3xl font-semibold text-blue-500 mb-6 text-center">Repuestos Disponibles</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach ($repuestos as $repuesto): ?>
                <div class="bg-gradient-to-r from-indigo-600 to-blue-700 p-6 rounded-3xl shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                    <img src="<?php echo $repuesto['imagen']; ?>" alt="<?php echo $repuesto['descripcion']; ?>" class="w-full h-48 object-cover mb-4 rounded-md transition-transform duration-300 hover:scale-105">
                    <h3 class="text-2xl font-semibold text-white mb-2"><?php echo htmlspecialchars($repuesto['descripcion']); ?></h3>
                    <p class="text-lg text-gray-300">Precio: S/. <?php echo number_format($repuesto['precio'], 2); ?></p>
                    <p class="text-lg text-gray-300">Stock: <?php echo $repuesto['stock']; ?></p>
                    <a href="index.php?action=repuesto&id=<?php echo $repuesto['id_repuesto']; ?>" class="text-blue-400 hover:text-blue-500 mt-4 block font-semibold transition duration-300">Ver detalles</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-6 mt-12">
        <div class="container mx-auto text-center">
            <p class="text-sm">© 2024 CYR Motors. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
