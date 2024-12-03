<?php
// Incluir el archivo del controlador
require_once '../controllers/ClienteController.php';
use Controllers\ClienteController;

$controller = new ClienteController();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $data = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'direccion' => $_POST['direccion']
    ];

    // Llamar al método create del controlador para insertar el cliente
    $controller->create($data);
    header("Location: admin_dashboard.php?action=clientes");
    echo "<p class='text-green-500'>¡Cliente agregado con éxito!</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-900 mb-6">Agregar Nuevo Cliente</h1>
            <form method="POST" action="" class="space-y-6">
                
                <div class="form-group">
                    <label for="nombre" class="block text-lg text-gray-600">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="apellido" class="block text-lg text-gray-600">Apellido</label>
                    <input type="text" name="apellido" id="apellido" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="email" class="block text-lg text-gray-600">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="telefono" class="block text-lg text-gray-600">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <div class="form-group">
                    <label for="direccion" class="block text-lg text-gray-600">Dirección</label>
                    <input type="text" name="direccion" id="direccion" required class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                </div>

                <button type="submit" class="w-full py-3 bg-blue-500 rounded-lg text-white text-xl font-semibold hover:bg-blue-400 focus:outline-none transition-all">Agregar Cliente</button>
            </form>
        </div>
    </div>

</body>
</html>
