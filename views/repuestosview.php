<?php
require_once '../controllers/RepuestoController.php';
use Controllers\RepuestoController;

// Inicializar el controlador de repuestos
$repuestoController = new RepuestoController();

// Obtener todos los repuestos
$repuestos = $repuestoController->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repuestos</title>
    <!-- Importar Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">
        
        <!-- Título -->
        <h1 class="text-3xl font-semibold text-center mb-6">Gestión de Repuestos</h1>
        
        <!-- Agregar Nuevo Repuesto -->
        <div class="mb-4 text-right">
            <a href="../views/create_repuesto.php" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar Nuevo Repuesto</a>
        </div>
        
        <!-- Tabla de Repuestos -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Precio</th>
                        <th class="px-4 py-2 text-left">Stock</th>
                        <th class="px-4 py-2 text-left">Categoría</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($repuestos as $repuesto): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($repuesto['id_repuesto']); ?></td> <!-- Mostrar el ID -->
                            <td class="px-4 py-2"><?= htmlspecialchars($repuesto['descripcion']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($repuesto['precio']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($repuesto['stock']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($repuesto['id_categoria']); ?></td>
                            <td class="px-4 py-2 text-center">
                                <!-- Botón de editar -->
                                <a href="../views/edit_repuesto.php?id=<?= $repuesto['id_repuesto']; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
                                
                                <form action="../controllers/RepuestoController.php" method="POST" class="inline-block">
                                <input type="hidden" name="id" value="<?= $repuesto['id_repuesto']; ?>">
                                <input type="hidden" name="action" value="delete"> <!-- Agregar un campo para identificar la acción -->
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar este repuesto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
