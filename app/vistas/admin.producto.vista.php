<?php 

class adminProductoVista {
    private $usuario = null;

    public function __construct($usuario) {
        $this->usuario = $usuario;
    }

    public function adminListarProductos($productos, $categorias) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/admin_lista_productos.phtml';
    }

    public function mostrarDetalle($producto) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/producto_detalle.phtml';
    }

    public function alertaError($error) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/error.phtml';
    }
}