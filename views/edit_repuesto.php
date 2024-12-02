<?php
require_once '../controllers/RepuestoController.php';
use Controllers\RepuestoController;

// Inicializar el controlador de repuestos
$repuestoController = new RepuestoController();

// Obtener el repuesto por ID
$id = $_GET['id'] ?? null;
$repuesto = $id ? $repuestoController->readOne($id) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar el repuesto
    $data = [
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'stock' => $_POST['stock'],
        'id_categoria' => $_POST['id_categoria'],
        'imagen' => $_POST['imagen']
    ];
    $repuestoController->update($id, $data);
    header("Location: index.php"); // Redirigir a la lista después de la actualización
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Repuesto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Repuesto</h1>

        <!-- Formulario de Edición -->
        <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" value="<?= htmlspecialchars($repuesto['descripcion']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-gray-700">Precio</label>
                <input type="number" name="precio" id="precio" value="<?= htmlspecialchars($repuesto['precio']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($repuesto['stock']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="id_categoria" class="block text-gray-700">Categoría</label>
                <input type="text" name="id_categoria" id="id_categoria" value="<?= htmlspecialchars($repuesto['id_categoria']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700">Imagen</label>
                <input type="text" name="imagen" id="imagen" value="<?= htmlspecialchars($repuesto['imagen']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Actualizar Repuesto</button>
            </div>
        </form>
    </div>

</body>
</html>
