<?php 

require_once 'app/modelos/productos.modelo.php';
require_once 'app/vistas/productos.vista.php';

class productosControlador {
    private $modelo;
    private $vista;
    //private $categoriasModelo;

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

    public function agregarProducto() {
        if(!isset($_POST['nombre_producto']) || empty($_POST['nombre_producto'])) {
            return $this->vista->alertaError('Completa con el nombre del producto');
        }

        if(!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->vista->alertaError('Completa el precio del producto');
        }

        if(!isset($_POST['stock']) || empty($_POST['stock'])) {
            return $this->vista->alertaError('Completa el stock del producto');
        }
    
        if (!isset($_POST['categoria']) || empty($_POST['categoria'])) {
            return $this->vista->alertaError('Falta completar la categoría');
        }

        if (!isset($_POST['foto_url']) || empty($_POST['foto_url'])) {
            return $this->vista->alertaError('Agregue una foto del producto para mayor interés');
        }
    
        $nombre_producto = $_POST['nombre_producto'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock']; 
        $categoria = $_POST['categoria'];
        $foto_url = $_POST['foto_url'] ?? null;
        
        $ID_producto = $this->modelo->insertarProducto($nombre_producto, $precio, $stock, $categoria, $foto_url);
        header('Location: ' . BASE_URL . 'lista_productos');
    }    

    public function eliminarProducto($ID_producto) {
        $producto = $this->modelo->obtenerDetallesDelProducto($ID_producto);
        
        if (!$producto) {
            return $this->vista->alertaError('No existe el producto');
        }

        $this->modelo->borrarProducto($ID_producto);
        header('Location: ' . BASE_URL . 'lista_productos'); 
    }

    public function editarProducto($ID_producto) {
        $producto = $this->modelo->obtenerDetallesDelProducto($ID_producto);

        if (!$producto) {
            return $this->vista->alertaError("No existe el producto");
        }

        $this->modelo->actualizarProducto($ID_producto);
        header('Location: ' . BASE_URL . 'lista_productos');
    }
}