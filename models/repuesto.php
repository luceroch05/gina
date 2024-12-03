<?php

namespace Models;
require_once '../config/database.php';
use Config\Database;
use PDO;
class Repuesto {
    private $conn;
    private $table = 'repuesto';

    public $id;
    public $descripcion;
    public $precio;
    public $stock;
    public $id_categoria;
    public $imagen;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear un nuevo repuesto
    public function create() {
        $query = "INSERT INTO {$this->table} (descripcion, precio, stock, id_categoria, imagen) 
                  VALUES (:descripcion, :precio, :stock, :id_categoria, :imagen)";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':id_categoria', $this->id_categoria);
        $stmt->bindParam(':imagen', $this->imagen);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todos los repuestos
    public function read() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener un repuesto específico
    public function read_one($id) {
        $query = "SELECT * FROM {$this->table} WHERE id_repuesto = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Actualizar un repuesto
    public function update($id) {
        $query = "UPDATE {$this->table} 
                  SET descripcion = :descripcion, precio = :precio, stock = :stock, 
                      id_categoria = :id_categoria, imagen = :imagen 
                  WHERE id_repuesto = :id";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':id_categoria', $this->id_categoria);
        $stmt->bindParam(':imagen', $this->imagen);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un repuesto
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id_repuesto = :id_repuesto";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_repuesto', $id, PDO::PARAM_INT);
    
        return $stmt->execute(); // Ejecutar la eliminación y devolver el resultado
    }
    // En el archivo Repuesto.php
public function getCategories() {
    $stmt = $this->conn->prepare("SELECT * FROM categoria");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

}
