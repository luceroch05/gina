<?php

namespace Controllers;

require_once '../models/Promocion.php';
use Models\Promocion;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    // Obtener el ID de la promoción
    $id_promocion = $_POST['id_promocion'];
    $promocionController = new PromocionController();
    // Llamar al modelo para eliminar la promoción
    $promocionController->delete($id_promocion);

    // Redirigir a la lista de promociones o a una página de confirmación
    header("Location: admin_dashboard.php?action=promociones");
    exit;
}

class PromocionController {
    private $promocion;

    public function __construct() {
        $this->promocion = new Promocion(); // Inicializar el modelo de Promocion
    }

    // Crear una nueva promoción
    public function create($data) {
        $this->promocion->nombre = $data['nombre'];
        $this->promocion->descripcion = $data['descripcion'];
        $this->promocion->porcentaje_descuento = $data['porcentaje_descuento'];
        $this->promocion->fecha_inicio = $data['fecha_inicio'];
        $this->promocion->fecha_fin = $data['fecha_fin'];
        $this->promocion->activo = isset($data['activo']) ? $data['activo'] : 0;

        return $this->promocion->create();
    }

    // Obtener todas las promociones
    public function read() {
        return $this->promocion->read()->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obtener una promoción por ID
    public function readOne($id_promocion) {
        return $this->promocion->read_one($id_promocion);
    }

    // Actualizar una promoción
    public function update($id_promocion, $data) {
        $this->promocion->nombre = $data['nombre'];
        $this->promocion->descripcion = $data['descripcion'];
        $this->promocion->porcentaje_descuento = $data['porcentaje_descuento'];
        $this->promocion->fecha_inicio = $data['fecha_inicio'];
        $this->promocion->fecha_fin = $data['fecha_fin'];
        $this->promocion->activo = isset($data['activo']) ? $data['activo'] : 0;

        return $this->promocion->update($id_promocion);
    }

    // Eliminar una promoción
    public function delete($id_promocion) {
        if ($this->promocion->delete($id_promocion)) {
            // Redirigir después de la eliminación
            header('Location: ../views/admin_dashboard.php?action=promociones');
            exit;
        } else {
            // Si la eliminación falla, redirigir a la misma página con un mensaje de error
            header('Location: ../views/promociones.php?error=eliminacion_fallida');
            exit;
        }
    }
}

?>
