<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="POST" action="index.php?action=login">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" >Iniciar sesión</button>
    </form>
</body>
</html>
