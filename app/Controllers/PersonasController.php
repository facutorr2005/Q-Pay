<?php
namespace App\Controllers;
use App\Models\PersonaModel;
use App\Middleware\AuthMiddleware;

class PersonasController {
    private $model;

    public function __construct() {
        AuthMiddleware::requiereAutenticacion();
        $this->model = new PersonaModel();
    }

    public function index() {
         
        $personas = $this->model->obtenerTodos();
        $title = 'Lista de Personas';
        $css_specific = 'persona';
        $content = '../app/Views/Personas/index.php';
        require '../app/Views/layout.php';
    }

    public function crear() {
        $title = 'Crear Persona';
        $css_specific = 'persona';
        $content = '../app/Views/Personas/crear.php';
        require '../app/Views/layout.php';
    }

    public function guardar() {
        $this->model->agregar($_POST);
        header('Location: ' . BASE_URL . '/personas');
    }

    public function editar($id) {
        $persona = $this->model->obtenerPorId($id);
        $css_specific = 'persona';
        $content = '../app/Views/Personas/editar.php';
        require  '../app/Views/layout.php';
    }

    public function actualizar($id) {
        $this->model->actualizar($id, $_POST);
        header('Location: ' . BASE_URL . '/personas');
    }

    public function eliminar($id) {
        $this->model->eliminar($id);
        header('Location: ' . BASE_URL . '/personas');
    }
}
