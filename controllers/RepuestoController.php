<?php

namespace Controllers;

use Models\Repuesto;

class RepuestoController {

    public function index() {
        $repuesto = new Repuesto();
        $result = $repuesto->read();
        $repuestos = $result->fetchAll(\PDO::FETCH_ASSOC);
        include 'views/repuestos.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $repuesto = new Repuesto();
            $repuesto->descripcion = $_POST['descripcion'];
            $repuesto->precio = $_POST['precio'];
            $repuesto->stock = $_POST['stock'];
            $repuesto->id_categoria = $_POST['id_categoria'];
            $repuesto->imagen = $_POST['imagen'];

            if ($repuesto->create()) {
                echo "Repuesto creado exitosamente.";
            } else {
                echo "Error al crear el repuesto.";
            }
        }

        include 'views/repuestos.php';
    }
}
