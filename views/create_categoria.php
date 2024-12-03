<?php
// Incluir el archivo del controlador
require_once '../controllers/CategoriaController.php';
use Controllers\CategoriaController;

$controller = new CategoriaController();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion']
    ];

    // Llamar al método create del controlador para insertar la categoría
    $controller->create($data);
    header("Location: admin_dashboard.php?action=categorias");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Categoría</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-900 mb-6">Agregar Nueva Categoría</h1>
            <form method="POST" action="" class="space-y-6">
                
                <div class="form-group">
                    <label for="nombre" class="block text-lg text-gray-600">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

              
              
                <button type="submit" class="w-full py-3 bg-blue-500 rounded-lg text-white text-xl font-semibold hover:bg-blue-400 focus:outline-none transition-all">Agregar Categoría</button>
            </form>
        </div>
    </div>

</body>
</html>
