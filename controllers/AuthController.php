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
            
                var_dump($user['id_rol']);  // Verifica el valor del rol
            
                // Redirigir según el rol
                if ((int)$user['id_rol'] === 1) {
                    echo "holaaaaaaa";  // 1 es el ID del rol de administrador
                    header('Location: index.php?action=admin_dashboard');
                } else {
                    echo "entre";
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
        session_destroy();
        header('Location: index.php?action=home');
    }
}
