<?php
namespace App\Controllers;
use App\Models\ProductoModel;
use App\Middleware\AuthMiddleware;

class ComprasController {
    private $productoModel;

    public function __construct() {
        AuthMiddleware::requiereAutenticacion();
        $this->productoModel = new ProductoModel();
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
        $_SESSION['productos'][]= $producto;
        header('Location: ' . BASE_URL . '/Compras');
        exit;
    }
}
