<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function login() {
        $title = 'Iniciar Sesión';
        require '../app/Views/Auth/login.php';        
    }

    public function loginPost() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = $this->model->obtenerPorEmail($email);

        if ($usuario && $usuario->Contrasena == $password) {
            $_SESSION['usuario_id'] = $usuario->Id;
            $_SESSION['email'] = $usuario->Email;
            
            header('Location: ' . BASE_URL . '/personas');
            exit;
        }

        $_SESSION['error'] = 'Credenciales inválidas';
        header('Location: ' . BASE_URL . '/auth/login');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit;
    }
}