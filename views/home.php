<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?action=home">Inicio</a></li>
            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="index.php?action=login">Login</a></li>
            <?php else: ?>
                <li>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></li>
                <li><a href="index.php?action=logout">Cerrar sesión</a></li>
                <li><a href="index.php?action=cart">Carrito</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    
    <h1>Página de inicio</h1>
    <p>Contenido de la página de inicio...</p>
</body>
</html>
