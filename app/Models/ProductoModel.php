<?php
namespace App\Models;
use App\Database\Database;

class ProductoModel {
    private const NOMBRE_CLASE = ProductoModel::class;
    
    public $Id;
    public $descripcion;
    public $precio;
    
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE Id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(self::NOMBRE_CLASE);
    }
}
