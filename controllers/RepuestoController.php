<?php

namespace Controllers;

require_once '../models/Repuesto.php';
use Models\Repuesto;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id']; // Obtener el ID del repuesto desde el formulario
    $repuestoController = new RepuestoController();
    $repuestoController->delete($id); // Llamar al método de eliminación
}

class RepuestoController {
    private $repuesto;

    
    public function __construct() {
        $this->repuesto = new Repuesto(); // Inicializar el modelo de Repuesto
    }

    // Crear un nuevo repuesto
    public function create($data) {
        $repuesto = new Repuesto();
        $repuesto->descripcion = $data['descripcion'];
        $repuesto->precio = $data['precio'];
        $repuesto->stock = $data['stock'];
        $repuesto->id_categoria = $data['id_categoria'];
        $repuesto->imagen = $data['imagen'];

        return $repuesto->create();
    }

    // Obtener todos los repuestos
    public function read() {
        $repuesto = new Repuesto();
        return $repuesto->read()->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obtener un repuesto por ID
    public function readOne($id) {
        $repuesto = new Repuesto();
        return $repuesto->read_one($id);
    }

    // Actualizar un repuesto
    public function update($id, $data) {
        $repuesto = new Repuesto();
        $repuesto->descripcion = $data['descripcion'];
        $repuesto->precio = $data['precio'];
        $repuesto->stock = $data['stock'];
        $repuesto->id_categoria = $data['id_categoria'];
        $repuesto->imagen = $data['imagen'];

        return $repuesto->update($id);
    }

    // Eliminar un repuesto
    public function delete($id) {
        if ($this->repuesto->delete($id)) {
            // Redirigir después de la eliminación
            header('Location: ../views/admin_dashboard.php?action=repuestos');
            exit;
        } else {
            // Si la eliminación falla, redirigir a la misma página con un mensaje de error
            header('Location: ../views/repuestos.php?error=eliminacion_fallida');
            exit;
        }
    }
    // En el controlador RepuestoController.php
public function getCategories() {
    $repuesto = new Repuesto();
    return $repuesto->getCategories();
}

}
