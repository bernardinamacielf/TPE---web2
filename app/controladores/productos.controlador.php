<?php 

require_once 'app/modelos/productos.modelo.php';
require_once 'app/vistas/productos.vista.php';

class productosControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new productosModelo();
        $this->vista = new productosVista();
    }

    public function mostrarProductos() {
        $productos = $this->modelo->obtenerProductos();
        return $this->vista->listarProductos($productos); 
    }

    public function productoDetalle($ID_producto) {
        $producto = $this->modelo->obtenerDetallesDelProducto($ID_producto);

        if ($producto) {
            $this->vista->mostrarDetalle($producto);
        } else {
            $this->vista->alertaError('Producto no encontrado');
        }
    }
}