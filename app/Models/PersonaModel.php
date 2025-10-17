<?php
namespace App\Models;

use App\Database\Database;

class PersonaModel {
    private const NOMBRE_CLASE = PersonaModel::class;
    
    public $Id;
    public $Nombre;
    public $Email;
    
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function obtenerTodos() {
        $stmt = $this->db->prepare("SELECT * FROM personas");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::NOMBRE_CLASE);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM personas WHERE Id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(self::NOMBRE_CLASE);
    }

    public function agregar($data) {
        $stmt = $this->db->prepare("INSERT INTO personas (Nombre, Email) VALUES (:nombre, :email)");
        return $stmt->execute([
            'nombre' => $data['nombre'],
            'email' => $data['email']
        ]);
    }

    public function actualizar($id, $data) {
        $stmt = $this->db->prepare("UPDATE personas SET Nombre = :nombre, Email = :email WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'nombre' => $data['nombre'],
            'email' => $data['email']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM personas WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
