<?php

namespace Models;
require_once '../config/database.php';
use Config\Database;
use PDO;

class Cliente {
    private $conn;
    private $table = 'cliente'; // Nombre de la tabla en la base de datos

    // Atributos del cliente
    public $id_cliente;
    public $nombre;
    public $correo;
    public $direccion;
    public $telefono;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear un nuevo cliente
    public function create() {
        $query = "INSERT INTO {$this->table} (nombre, correo, direccion, telefono) 
                  VALUES (:nombre, :correo, :direccion, :telefono)";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':telefono', $this->telefono);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todos los clientes
    public function read() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener un cliente específico por su id
    public function read_one($id_cliente) {
        $query = "SELECT * FROM {$this->table} WHERE id_cliente = :id_cliente";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Actualizar la información de un cliente
    public function update($id_cliente) {
        $query = "UPDATE {$this->table} 
                  SET nombre = :nombre, correo = :correo, direccion = :direccion, telefono = :telefono 
                  WHERE id_cliente = :id_cliente";

        $stmt = $this->conn->prepare($query);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':id_cliente', $id_cliente);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un cliente
    public function delete($id_cliente) {
        $query = "DELETE FROM {$this->table} WHERE id_cliente = :id_cliente";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    
        return $stmt->execute(); // Ejecutar la eliminación y devolver el resultado
    }
}

?>
