<?php
require_once '../controllers/CategoriaController.php';
use Controllers\CategoriaController;

// Inicializar el controlador de categorías
$categoriaController = new CategoriaController();

// Obtener todas las categorías
$categorias = $categoriaController->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <!-- Importar Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">
        
        <!-- Título -->
        <h1 class="text-3xl font-semibold text-center mb-6">Gestión de Categorías</h1>
        
        <!-- Agregar Nueva Categoría -->
        <div class="mb-4 text-right">
            <a href="../views/create_categoria.php" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar Nueva Categoría</a>
        </div>
        
        <!-- Tabla de Categorías -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($categoria['id_categoria']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($categoria['nombre']); ?></td>
                            <td class="px-4 py-2 text-center">
                                <!-- Botón de editar -->
                                <a href="../views/edit_categoria.php?id=<?= $categoria['id_categoria']; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
                                
                                <!-- Formulario para eliminar -->
                                <form action="../controllers/CategoriaController.php" method="POST" class="inline-block">
                                    <input type="hidden" name="id_categoria" value="<?= $categoria['id_categoria']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
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
