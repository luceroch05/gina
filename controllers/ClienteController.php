<?php

namespace Controllers;

require_once '../models/Cliente.php';
use Models\Cliente;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    // Obtener el ID del cliente
    $id_cliente = $_POST['id_cliente'];
    $clienteController = new ClienteController();
    // Llamar al modelo para eliminar el cliente
    $clienteController->delete($id_cliente);

    // Redirigir a la lista de clientes o a una página confirmación
    header("Location: admin_dashboard.php?action=clientes");
    exit;
}

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente(); // Inicializar el modelo de Cliente
    }

    // Crear un nuevo cliente
    public function create($data) {
        $this->cliente->nombre = $data['nombre'];
        $this->cliente->correo = $data['email'];
        
        $this->cliente->direccion = $data['direccion'];
        $this->cliente->telefono = $data['telefono'];

        return $this->cliente->create();
    }

    // Obtener todos los clientes
    public function read() {
        return $this->cliente->read()->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obtener un cliente por ID
    public function readOne($id_cliente) {
        return $this->cliente->read_one($id_cliente);
    }

    // Actualizar un cliente
    public function update($id_cliente, $data) {
        $this->cliente->nombre = $data['nombre'];
        $this->cliente->correo = $data['correo'];
        $this->cliente->direccion = $data['direccion'];
        $this->cliente->telefono = $data['telefono'];

        return $this->cliente->update($id_cliente);
    }

    // Eliminar un cliente
    public function delete($id_cliente) {
        if ($this->cliente->delete($id_cliente)) {
            // Redirigir después de la eliminación
            header('Location: ../views/admin_dashboard.php?action=clientes');
            exit;
        } else {
            // Si la eliminación falla, redirigir a la misma página con un mensaje de error
            header('Location: ../views/clientes.php?error=eliminacion_fallida');
            exit;
        }
    }
}

?>
