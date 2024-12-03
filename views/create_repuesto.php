<?php
// Incluir el archivo del controlador
require_once '../controllers/RepuestoController.php';
use Controllers\RepuestoController;

$controller = new RepuestoController();

// Obtener las categorías desde el controlador
$categories = $controller->getCategories();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $data = [
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'stock' => $_POST['stock'],
        'id_categoria' => $_POST['id_categoria'],
        'imagen' => $_POST['imagen']
    ];

    // Llamar al método create del controlador para insertar el repuesto
    $controller->create($data);
    header("Location: admin_dashboard.php?action=repuestos");
    echo "<p class='text-green-500'>¡Repuesto agregado con éxito!</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Repuesto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">

    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-900 mb-6">Agregar Nuevo Repuesto</h1>
            <form method="POST" action="" class="space-y-6">
                
                <div class="form-group">
                    <label for="descripcion" class="block text-lg text-gray-600">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="precio" class="block text-lg text-gray-600">Precio</label>
                    <input type="number" name="precio" id="precio" step="0.01" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="stock" class="block text-lg text-gray-600">Stock</label>
                    <input type="number" name="stock" id="stock" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="id_categoria" class="block text-lg text-gray-600">Categoría</label>
                    <select name="id_categoria" id="id_categoria" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                        <option value="">Selecciona una categoría</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id_categoria'] ?>"><?= $category['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagen" class="block text-lg text-gray-600">Imagen (URL)</label>
                    <input type="file" name="imagen" id="imagen" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <button type="submit" class="w-full py-3 bg-blue-500 rounded-lg text-white text-xl font-semibold hover:bg-blue-400 focus:outline-none transition-all">Agregar Repuesto</button>
            </form>
        </div>
    </div>

</body>
</html>
