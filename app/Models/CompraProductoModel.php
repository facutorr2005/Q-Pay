<?php
namespace App\Models;

use App\Database\Database;

class CompraProductoModel {
    private const NOMBRE_CLASE = CompraProductoModel::class;
    
    public $Id;
    public $compraid;
    public $productoid;
    public $cantidad;
    public $preciounitario;
    
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function agregar() {
        $stmt = $this->db->prepare("INSERT INTO compraproducto (compraid, productoid, cantidad, preciounitario) VALUES (:c, :p, :ca, :pu)");
        return $stmt->execute([
            'c' => $this->compraid,
            'p' => $this->productoid,
            'ca' => $this->cantidad,
            'pu' => $this->preciounitario
        ]);
    }
}