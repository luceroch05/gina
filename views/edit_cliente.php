<?php
require_once '../controllers/ClienteController.php';
use Controllers\ClienteController;

// Inicializar el controlador de clientes
$clienteController = new ClienteController();

// Obtener el cliente por ID
$id = $_GET['id'] ?? null;
$cliente = $id ? $clienteController->readOne($id) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar el cliente
    $data = [
        'nombre' => $_POST['nombre'],
        'correo' => $_POST['correo'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono']
    ];
    $clienteController->update($id, $data);
    header("Location: admin_dashboard.php?action=clientes"); // Redirigir a la lista después de la actualización
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Cliente</h1>

        <!-- Formulario de Edición -->
        <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($cliente['nombre']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="correo" class="block text-gray-700">Correo</label>
                <input type="email" name="correo" id="correo" value="<?= htmlspecialchars($cliente['correo']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="direccion" class="block text-gray-700">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($cliente['direccion']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="telefono" class="block text-gray-700">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" value="<?= htmlspecialchars($cliente['telefono']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Actualizar Cliente</button>
            </div>
        </form>
    </div>

</body>
</html>
