<?php

namespace Controllers;

require_once '../models/Categoria.php';
use Models\Categoria;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $categoriaController = new CategoriaController();

    if ($_POST['action'] === 'delete') {
        // Obtener el ID de la categoría
        $id_categoria = $_POST['id_categoria'];
        // Llamar al modelo para eliminar la categoría
        $categoriaController->delete($id_categoria);

        // Redirigir a la lista de categorías o a una página de confirmación
        header("Location: admin_dashboard.php?action=categorias");
        exit;
    }

    
}

class CategoriaController {
    private $categoria;

    public function __construct() {
        $this->categoria = new Categoria(); // Inicializar el modelo de Categoría
    }

    // Crear una nueva categoría
    public function create($data) {
        $this->categoria->nombre = $data['nombre'];
        return $this->categoria->create();
    }

    // Obtener todas las categorías
    public function read() {
        return $this->categoria->read()->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obtener una categoría por ID
    public function readOne($id_categoria) {
        return $this->categoria->read_one($id_categoria);
    }

    // Actualizar una categoría
    public function update($id_categoria, $data) {
        $this->categoria->nombre = $data['nombre'];
        return $this->categoria->update($id_categoria);
    }

    // Eliminar una categoría
    public function delete($id_categoria) {
        if ($this->categoria->delete($id_categoria)) {
            // Redirigir después de la eliminación
            header('Location: ../views/admin_dashboard.php?action=categorias');
            exit;
        } else {
            // Si la eliminación falla, redirigir a la misma página con un mensaje de error
            header('Location: ../views/categorias.php?error=eliminacion_fallida');
            exit;
        }
    }
}

?>
