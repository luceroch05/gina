<?php
require_once '../controllers/CategoriaController.php';
use Controllers\CategoriaController;

// Inicializar el controlador de categorías
$categoriaController = new CategoriaController();

// Obtener el ID de la categoría desde la URL
$id = $_GET['id'] ?? null;
$categoria = $id ? $categoriaController->readOne($id) : null;

// Si no se encuentra la categoría, redirigir a la lista de categorías
if (!$categoria) {
    header("Location: admin_dashboard.php?action=categorias&error=categoria_no_encontrada");
    exit;
}

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar los datos de la categoría
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion']
    ];
    $categoriaController->update($id, $data);
    header("Location: admin_dashboard.php?action=categorias"); // Redirigir a la lista después de la actualización
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Categoría</h1>

        <!-- Formulario de Edición -->
        <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($categoria['nombre']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            
            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Actualizar Categoría</button>
            </div>
        </form>
    </div>

</body>
</html>
