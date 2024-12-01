<?php

namespace Models;
require_once '../config/database.php';
use Config\Database;

class User {
    private $conn;
    private $table = 'usuario';

    public $id_usuario; // ID del usuario
    public $usuario;    // Nombre de usuario
    public $password;   // Contraseña del usuario
    public $id_rol;     // Rol del usuario

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Verificar si el usuario existe y validar contraseña
    public function authenticate($usuario, $password) {
        $query = "SELECT id_usuario, usuario, password, id_rol FROM {$this->table} WHERE usuario = :usuario LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        var_dump($user);
        if ($user) {
            // Comparar la contraseña en texto plano
            if ($user['password'] == $password) {
                return $user;  // Devuelve el usuario si las credenciales son correctas
            }
        }
        return false; }
}
