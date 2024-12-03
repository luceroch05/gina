<?php

namespace Models;
require_once '../config/database.php';
use Config\Database;
use PDO;

class Promocion {
    private $conn;
    private $table = 'promocion'; // Nombre de la tabla en la base de datos

    // Atributos de la promoción
    public $id_promocion;
    public $nombre;
    public $descripcion;
    public $porcentaje_descuento;
    public $fecha_inicio;
    public $fecha_fin;
    public $activo;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear una nueva promoción
    public function create() {
        $query = "INSERT INTO {$this->table} (nombre, descripcion, porcentaje_descuento, fecha_inicio, fecha_fin, activo) 
                  VALUES (:nombre, :descripcion, :porcentaje_descuento, :fecha_inicio, :fecha_fin, :activo)";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':porcentaje_descuento', $this->porcentaje_descuento);
        $stmt->bindParam(':fecha_inicio', $this->fecha_inicio);
        $stmt->bindParam(':fecha_fin', $this->fecha_fin);
        $stmt->bindParam(':activo', $this->activo, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todas las promociones
    public function read() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una promoción específica por su id
    public function read_one($id_promocion) {
        $query = "SELECT * FROM {$this->table} WHERE id_promocion = :id_promocion";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_promocion', $id_promocion);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Actualizar la información de una promoción
    public function update($id_promocion) {
        $query = "UPDATE {$this->table} 
                  SET nombre = :nombre, descripcion = :descripcion, porcentaje_descuento = :porcentaje_descuento, 
                      fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, activo = :activo 
                  WHERE id_promocion = :id_promocion";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':porcentaje_descuento', $this->porcentaje_descuento);
        $stmt->bindParam(':fecha_inicio', $this->fecha_inicio);
        $stmt->bindParam(':fecha_fin', $this->fecha_fin);
        $stmt->bindParam(':activo', $this->activo, PDO::PARAM_BOOL);
        $stmt->bindParam(':id_promocion', $id_promocion);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una promoción
    public function delete($id_promocion) {
        $query = "DELETE FROM {$this->table} WHERE id_promocion = :id_promocion";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_promocion', $id_promocion, PDO::PARAM_INT);

        return $stmt->execute(); // Ejecutar la eliminación y devolver el resultado
    }
}

?>
