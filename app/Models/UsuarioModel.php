<?php
namespace App\Models;

use App\Database\Database;

class UsuarioModel {
    private const NOMBRE_CLASE = UsuarioModel::class;

    public $Id;
    public $Email;
    public $Contrasena;
    public $Nombre;
    public $Apellido;
    public $DNI;

    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function obtenerPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchObject(self::NOMBRE_CLASE);
    }

    public function agregar($data) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (Email, Contrasena, Nombre, Apellido, DNI) VALUES (:email, :contrasena, :nombre, :apellido, :dni)");
        return $stmt->execute([
            
            'email' => $data['email'],
            'contrasena' => $data['contrasena'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni']
        ]);
    }

      public function modificarClave($id, $nuevaContrasena) {
         $stmt = $this->db->prepare("UPDATE usuarios SET Contrasena = :contrasena WHERE Id = :id");
         return $stmt->execute([
             'contrasena' => $nuevaContrasena,
             'id' => $id
         ]);
    }
}