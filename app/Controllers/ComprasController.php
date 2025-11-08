<?php
namespace App\Controllers;
use App\Models\ProductoModel;
use App\Middleware\AuthMiddleware;
use App\Models\CompraModel;
use App\Models\CompraProductoModel;

class ComprasController {
    private $productoModel;
    private $compraModel;
    private $compraProductoModel;

    public function __construct() {
        AuthMiddleware::requiereAutenticacion();
        $this->productoModel = new ProductoModel();
        $this->compraModel = new CompraModel ();
        $this->compraProductoModel = new CompraProductoModel ();
    }

    public function index() {
        $title = 'Nueva Compra';
        $content = '../app/Views/Compras/index.php';
        require '../app/Views/layout.php';
    }

    public function BuscarProducto() {
        $producto = $this->productoModel->obtenerPorId($_POST['id']);        
        if($producto == NULL){
            header('Location: ' . BASE_URL . '/Compras');
            exit;
        }
        if(!isset($_SESSION['productos'])){
            $_SESSION['productos'] = [];
        }
        
        $_SESSION['productos'][]= json_encode($producto);
        
        header('Location: ' . BASE_URL . '/Compras');
        exit;
    }

    public function EliminarProducto() {
        unset($_SESSION['productos'][$_POST['posicion']]);
        header('Location: ' . BASE_URL . '/Compras');
        exit;
    }

    public function Finalizar() {
        $this->compraModel-> usuarioid = 2;
        $this->compraModel-> preciototal = 0;
        $this->compraModel-> fechaalta = '2025-11-07';
        $idcompra = $this->compraModel-> agregar();
        foreach ($_SESSION['productos'] as $p){
            $prod = json_decode ($p);
            $this->compraProductoModel-> compraid = $idcompra;
            $this->compraProductoModel-> productoid = $prod ->Id;
            $this->compraProductoModel-> cantidad = 1;
            $this->compraProductoModel-> preciounitario = $prod->precio;
            $this->compraProductoModel-> agregar();
        }
        unset($_SESSION['productos']);
        header('Location: ' . BASE_URL . '/Panel');
        exit;
    }
}
