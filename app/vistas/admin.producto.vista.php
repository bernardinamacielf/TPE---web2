<?php 

class adminProductoVista {
    public function adminListarProductos($productos, $categorias) {
        require_once 'templates/admin_lista_productos.phtml';
    }

    public function mostrarDetalle($producto) {
        require_once 'templates/producto_detalle.phtml';
    }

    public function alertaError($error) {
        require_once 'templates/error.phtml';
    }
}