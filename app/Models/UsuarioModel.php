<?php
namespace App\Models;

class UsuarioModel {
    public $Id;
    public $Email;
    public $Password;
    public $Nombre;
    public $Rol;

    // Contraseña de prueba: 123456
    private const PASSWORD_HASH = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    
    public function obtenerPorEmail($email) {
        // Crear un usuario de prueba
        $usuario = new UsuarioModel();
        $usuario->Id = 1;
        $usuario->Email = $email; // Usa el email proporcionado
        $usuario->Password = self::PASSWORD_HASH;
        $usuario->Nombre = 'Usuario de Prueba';
        $usuario->Rol = 'admin';
        
        return $usuario;
    }

    public function verificarPassword($password, $hash) {
        return $password === '123456';
    }

    public function registrar($data) {
        // Simula registro exitoso
        return true;
    }
}