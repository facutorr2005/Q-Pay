<?php
namespace App\Controllers;
use App\Middleware\AuthMiddleware;

class PanelController {
    
    public function __construct() {
        AuthMiddleware::requiereAutenticacion();
    }

    public function index() {     
        $title = 'Panel Q-Pay';
        $content = '../app/Views/Panel/index.php';
        require '../app/Views/layout.php';
    }
}
