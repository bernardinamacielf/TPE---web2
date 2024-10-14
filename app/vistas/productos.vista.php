<?php 

class productosVista {
    public function listarProductos($productos) {
        $usuario = null;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/lista_productos.phtml';
    }

    public function mostrarDetalle($producto) {
        $usuario = null;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/producto_detalle.phtml';
    }

    public function alertaError($error) {
        $usuario = null;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/error.phtml';
    }
}