<?php
require_once '../controllers/PromocionController.php';
use Controllers\PromocionController;

// Inicializar el controlador de promociones
$promocionController = new PromocionController();

// Obtener todas las promociones
$promociones = $promocionController->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <!-- Importar Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">
        
        <!-- Título -->
        <h1 class="text-3xl font-semibold text-center mb-6">Gestión de Promociones</h1>
        
        <!-- Agregar Nueva Promoción -->
        <div class="mb-4 text-right">
            <a href="../views/create_promocion.php" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar Nueva Promoción</a>
        </div>
        
        <!-- Tabla de Promociones -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Descuento (%)</th>
                        <th class="px-4 py-2 text-left">Fecha Inicio</th>
                        <th class="px-4 py-2 text-left">Fecha Fin</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promociones as $promocion): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['id_promocion']); ?></td> <!-- Mostrar el ID -->
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['nombre']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['descripcion']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['porcentaje_descuento']); ?>%</td>
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['fecha_inicio']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($promocion['fecha_fin']); ?></td>
                            <td class="px-4 py-2">
                                <?php echo $promocion['activo'] ? 'Activa' : 'Inactiva'; ?>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <!-- Botón de editar -->
                                <a href="../views/edit_promocion.php?id=<?= $promocion['id_promocion']; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
                                
                                <form action="../controllers/PromocionController.php" method="POST" class="inline-block">
                                    <input type="hidden" name="id_promocion" value="<?= $promocion['id_promocion']; ?>">
                                    <input type="hidden" name="action" value="delete"> <!-- Agregar un campo para identificar la acción -->
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar esta promoción?')">Eliminar</button>
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
