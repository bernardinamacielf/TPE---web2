<?php 

require_once 'app/modelos/usuario.modelo.php';
require_once 'app/vistas/autenticacion.vista.php';

class autenticacionControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new usuarioModelo();
        $this->vista = new autenticacionVista();
    }

    public function mostrarLogin() {
        return $this->vista->mostrarLogin();
    }

    public function login() {
        if(!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->vista->mostrarLogin('Falta completar el nombre de usuario');
        }

        if(!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            return $this->vista->mostrarLogin('Falta completar la contraseña');
        }

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        //verificar que el usuario esta en la DB
        $usuarioDB = $this->modelo->obtenerUsuario($nombre);

        if(!$usuarioDB) {
            return $this->vista->mostrarLogin('Usuario no encontrado');
        }

        if(password_verify($contraseña, $usuarioDB->contraseña)) {
            session_start();
            $_SESSION['ID_usuario'] = $usuarioDB->ID_usuario;
            $_SESSION['nombre'] = $usuarioDB->nombre;

            header('Location: ' . BASE_URL . 'admin_producto'); 
        } else {
            return $this->vista->mostrarLogin('Credenciales incorrectas');
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'mostrarLogin');
    }
}