<?php 

class productosVista {
    private $usuario;

    public function __construct($usuario = null) {
        $this->usuario = $usuario;
    }

    public function listarProductos($productos, $categorias = null) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/lista_productos.phtml';
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