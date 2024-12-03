<?php

namespace Controllers;
 require_once '../models/User.php';
use Models\User;

class AuthController {
    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include '../views/login.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        // Crear una instancia del modelo User
        $userModel = new User();
        $user = $userModel->authenticate($username, $password);  // Verificar las credenciales
        
        if ($user) {
            // Autenticación exitosa
            $_SESSION['user_role'] = $user['id_rol'];  // Almacenar el rol del usuario
            $_SESSION['username'] = $user['usuario'];  // Almacenar el nombre de usuario
            
            // Verificar el rol del usuario y redirigir
            if ((int)$user['id_rol'] === 1) {  // Administrador
                header('Location: index.php?action=admin_dashboard');  // Redirigir al dashboard
            } else {  // Usuario normal
                header('Location: index.php?action=home');
            }
            exit();
        } else {
            // Si las credenciales son incorrectas
            echo "Credenciales incorrectas.";
        }
    }
}

    public function logout() {
        session_start();  // Asegúrate de que la sesión se inicie antes de destruirla
        session_unset();  // Elimina todas las variables de sesión
        session_destroy();  // Destruye la sesión
        header('Location: index.php?action=home');  // Redirige a la página de inicio o login
        exit();
    }
}
