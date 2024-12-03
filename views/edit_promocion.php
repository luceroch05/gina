<?php
require_once '../controllers/PromocionController.php';
use Controllers\PromocionController;

// Inicializar el controlador de promociones
$promocionController = new PromocionController();

// Obtener el ID de la promoción desde la URL
$id = $_GET['id'] ?? null;
$promocion = $id ? $promocionController->readOne($id) : null;

// Si no se encuentra la promoción, redirigir a la lista de promociones
if (!$promocion) {
    header("Location: admin_dashboard.php?action=promociones&error=promocion_no_encontrada");
    exit;
}

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar los datos de la promoción
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'porcentaje_descuento' => $_POST['porcentaje_descuento'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin'],
        'activo' => isset($_POST['activo']) ? 1 : 0
    ];
    $promocionController->update($id, $data);
    header("Location: admin_dashboard.php?action=promociones"); // Redirigir a la lista después de la actualización
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Promoción</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Promoción</h1>

        <!-- Formulario de Edición -->
        <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($promocion['nombre']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-md"><?= htmlspecialchars($promocion['descripcion']); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="porcentaje_descuento" class="block text-gray-700">Descuento (%)</label>
                <input type="number" name="porcentaje_descuento" id="porcentaje_descuento" value="<?= htmlspecialchars($promocion['porcentaje_descuento']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md" min="0" max="100">
            </div>

            <div class="mb-4">
                <label for="fecha_inicio" class="block text-gray-700">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?= htmlspecialchars($promocion['fecha_inicio']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="fecha_fin" class="block text-gray-700">Fecha de Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" value="<?= htmlspecialchars($promocion['fecha_fin']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="activo" class="inline-flex items-center">
                    <input type="checkbox" name="activo" id="activo" <?= $promocion['activo'] ? 'checked' : ''; ?> class="form-checkbox h-5 w-5 text-blue-500">
                    <span class="ml-2 text-gray-700">Promoción Activa</span>
                </label>
            </div>

            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Actualizar Promoción</button>
            </div>
        </form>
    </div>

</body>
</html>
