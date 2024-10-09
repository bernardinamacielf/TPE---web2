<?php 

class productosVista {
    public function listarProductos($productos) {
        require_once 'templates/lista_productos.phtml';
    }

    public function mostrarDetalle($producto) {
        require_once 'templates/producto_detalle.phtml';
    }

    public function alertaError($error) {
        require_once 'templates/error.phtml';
    }
}