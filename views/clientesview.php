<?php
require_once '../controllers/ClienteController.php';
use Controllers\ClienteController;

// Inicializar el controlador de clientes
$clienteController = new ClienteController();

// Obtener todos los clientes
$clientes = $clienteController->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <!-- Importar Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">
        
        <!-- Título -->
        <h1 class="text-3xl font-semibold text-center mb-6">Gestión de Clientes</h1>
        
        <!-- Agregar Nuevo Cliente -->
        <div class="mb-4 text-right">
            <a href="../views/create_cliente.php" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar Nuevo Cliente</a>
        </div>
        
        <!-- Tabla de Clientes -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Correo</th>
                        <th class="px-4 py-2 text-left">Dirección</th>
                        <th class="px-4 py-2 text-left">Teléfono</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= htmlspecialchars($cliente['id_cliente']); ?></td> <!-- Mostrar el ID -->
                            <td class="px-4 py-2"><?= htmlspecialchars($cliente['nombre']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($cliente['correo']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($cliente['direccion']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($cliente['telefono']); ?></td>
                            <td class="px-4 py-2 text-center">
                                <!-- Botón de editar -->
                                <a href="../views/edit_cliente.php?id=<?= $cliente['id_cliente']; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
                                
                                <form action="../controllers/ClienteController.php " method="POST" class="inline-block">
                                    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
                                    <input type="hidden" name="action" value="delete"> <!-- Agregar un campo para identificar la acción -->
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
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
