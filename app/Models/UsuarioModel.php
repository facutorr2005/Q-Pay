<?php
namespace App\Models;

use App\Database\Database;

class UsuarioModel {
    private const NOMBRE_CLASE = UsuarioModel::class;

    public $Id;
    public $Email;
    public $Contrasena;

    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function obtenerPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchObject(self::NOMBRE_CLASE);
    }

    public function registrar($data) {
        // Simula registro exitoso
        return true;
    }
}