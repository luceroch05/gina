<?php

namespace Models;
require_once '../config/database.php';
use Config\Database;
use PDO;

class Categoria {
    private $conn;
    private $table = 'categoria'; // Nombre de la tabla en la base de datos

    // Atributos de la categoría
    public $id_categoria;
    public $nombre;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear una nueva categoría
    public function create() {
        $query = "INSERT INTO {$this->table} (nombre) VALUES (:nombre)";

        $stmt = $this->conn->prepare($query);

        // Bind del parámetro
        $stmt->bindParam(':nombre', $this->nombre);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todas las categorías
    public function read() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una categoría específica por su id
    public function read_one($id_categoria) {
        $query = "SELECT * FROM {$this->table} WHERE id_categoria = :id_categoria";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar la información de una categoría
    public function update($id_categoria) {
        $query = "UPDATE {$this->table} 
                  SET nombre = :nombre 
                  WHERE id_categoria = :id_categoria";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':id_categoria', $id_categoria);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una categoría
    public function delete($id_categoria) {
        $query = "DELETE FROM {$this->table} WHERE id_categoria = :id_categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    
        return $stmt->execute(); // Ejecutar la eliminación y devolver el resultado
    }
}

?>
