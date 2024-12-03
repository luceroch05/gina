<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 flex justify-center items-center h-screen">

    <!-- Contenedor principal -->
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full sm:w-96">
        <h1 class="text-4xl font-bold text-center text-blue-500 mb-6">Iniciar sesión</h1>
        
        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="index.php?action=login">
            <div class="mb-6">
                <label for="username" class="block text-gray-700 font-semibold mb-2">Usuario</label>
                <input type="text" id="username" name="usuario" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="flex justify-between items-center mb-6">
                <button type="submit" 
                        class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Iniciar sesión
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">¿No tienes una cuenta? <a href="index.php?action=register" class="text-blue-500 hover:underline">Regístrate</a></p>
        </div>
    </div>

</body>
</html>
