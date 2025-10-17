<?php
namespace App\Middleware;

class AuthMiddleware {
    public static function verificarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function requiereAutenticacion() {
        self::verificarSesion();
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    }

    public static function estaAutenticado() {
        self::verificarSesion();
        return isset($_SESSION['usuario_id']);
    }

    public static function obtenerUsuarioId() {
        return $_SESSION['usuario_id'] ?? null;
    }

    public static function obtenerRol() {
        return $_SESSION['rol'] ?? null;
    }
}