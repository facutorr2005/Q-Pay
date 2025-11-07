<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController {
    private $model;
    private $codigoValidacion = '3218';

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
            
            header('Location: ' . BASE_URL . '/Panel');
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

    public function registro() {
        $title = 'Registro';
        require '../app/Views/Auth/registro.php';        
    }

    public function registroPost() {
        
        $password = $_POST['contrasena'] ?? '';
        $password2 = $_POST['contrasena2'] ?? '';

        if($password == $password2){

            $this->model->agregar($_POST);

            header('Location: ' . BASE_URL . '/Panel');
            exit;
        }

        $_SESSION['error'] = 'No coinciden contraseñas';
        header('Location: ' . BASE_URL . '/auth/registro');
        exit;

    }

    public function recuperoClave() {
        $title = 'Recupero de Clave';
        require '../app/Views/Auth/recupero-clave.php';        
    }

    public function recuperoClavePost() {
        $email = $_POST['email'] ?? '';

        $usuario = $this->model->obtenerPorEmail($email);

        if ($usuario) {
            // Aquí iría la lógica para enviar el correo de recuperación con el codigo de verificacion
            $_SESSION['usuarioId'] = $usuario->Id;
        }

        header('Location: ' . BASE_URL . '/auth/cambioClave');
        exit;
    }

    public function cambioClave() {
        $title = 'Recupero de Clave';
        require '../app/Views/Auth/cambio-clave.php';  
    }

    public function cambioClavePost() {
        $codigo = $_POST['codigo'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';
        $contrasena2 = $_POST['contrasena2'] ?? '';

        // Aquí iría la lógica para verificar el código y actualizar la contraseña
        if ($codigo !== $this->codigoValidacion) {
            $_SESSION['error'] = 'Código de verificación incorrecto.';
            header('Location: ' . BASE_URL . '/auth/cambioClave');
            exit;
        }
        if ($contrasena === $contrasena2) {
            // Actualizar la contraseña en la base de datos
            $usuarioId = $_SESSION['usuarioId'] ?? null;
            $this->model->modificarClave($usuarioId, $contrasena);
            unset($_SESSION['usuarioId']); 
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        } else {
            $_SESSION['error'] = 'Las contraseñas no coinciden.';
            header('Location: ' . BASE_URL . '/auth/cambioClave');
            exit;
        }
    }

}