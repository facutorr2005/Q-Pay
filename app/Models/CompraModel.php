<?php
namespace App\Models;

use App\Database\Database;

class CompraModel {
    private const NOMBRE_CLASE = CompraModel::class;
    
    public $Id;
    public $usuarioid;
    public $preciototal;
    public $fechaalta;
    
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function agregar() {
        $stmt = $this->db->prepare("INSERT INTO compras (usuarioid, preciototal, fechaalta) VALUES (:usid, :p, :fa)");
        $stmt->execute([
            'usid' => $this->usuarioid,
            'p' => $this->preciototal,
            'fa' => $this->fechaalta,
        ]);
        $id=$this->db->lastInsertId();
        return $id;
    }
}