<?php

namespace Controllers;

require_once '../models/Repuesto.php';
use Models\Repuesto;

class RepuestoController {

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
        $repuesto = new Repuesto();
        return $repuesto->delete($id);
    }
}
