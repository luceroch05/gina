<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repuestos</title>
</head>
<body>
    <h1>Repuestos Disponibles</h1>
    <table>
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuestos as $repuesto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($repuesto['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($repuesto['precio']); ?></td>
                    <td><?php echo htmlspecialchars($repuesto['stock']); ?></td>
                    <td><?php echo htmlspecialchars($repuesto['id_categoria']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($repuesto['imagen']); ?>" alt="Imagen del repuesto"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($_SESSION['role'] === 'admin'): ?>
        <h2>Agregar Repuesto</h2>
        <form method="POST" action="/repuestos/create">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>
            <br>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required>
            <br>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required>
            <br>
            <label for="id_categoria">Categoría:</label>
            <input type="text" id="id_categoria" name="id_categoria" required>
            <br>
            <label for="imagen">Imagen:</label>
            <input type="text" id="imagen" name="imagen" required>
            <br>
            <button type="submit">Agregar</button>
        </form>
    <?php endif; ?>
</body>
</html>
