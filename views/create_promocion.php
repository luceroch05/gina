<?php
// Incluir el archivo del controlador
require_once '../controllers/PromocionController.php';
use Controllers\PromocionController;

$controller = new PromocionController();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'porcentaje_descuento' => $_POST['porcentaje_descuento'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin'],
        'activo' => isset($_POST['activo']) ? 1 : 0
    ];

    // Llamar al método create del controlador para insertar la promoción
    $controller->create($data);
    header("Location: admin_dashboard.php?action=promociones");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Promoción</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-900 mb-6">Agregar Nueva Promoción</h1>
            <form method="POST" action="" class="space-y-6">
                
                <div class="form-group">
                    <label for="nombre" class="block text-lg text-gray-600">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="block text-lg text-gray-600">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all"></textarea>
                </div>

                <div class="form-group">
                    <label for="porcentaje_descuento" class="block text-lg text-gray-600">Descuento (%)</label>
                    <input type="number" name="porcentaje_descuento" id="porcentaje_descuento" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all" min="0" max="100">
                </div>

                <div class="form-group">
                    <label for="fecha_inicio" class="block text-lg text-gray-600">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="fecha_fin" class="block text-lg text-gray-600">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="activo" class="inline-flex items-center">
                        <input type="checkbox" name="activo" id="activo" class="form-checkbox h-5 w-5 text-blue-500">
                        <span class="ml-2 text-gray-700">Promoción Activa</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 bg-blue-500 rounded-lg text-white text-xl font-semibold hover:bg-blue-400 focus:outline-none transition-all">Agregar Promoción</button>
            </form>
        </div>
    </div>

</body>
</html>
