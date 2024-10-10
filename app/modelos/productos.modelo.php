<?php 

class productosModelo {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ventas;charset=utf8', 'root', '');
    }

    public function obtenerProductos() {
        $query = $this->db->prepare(
           'SELECT productos.*, categorias.nombre_categoria 
            FROM productos
            JOIN categorias ON productos.ID_categoria = categorias.ID_categoria' 
        );
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    public function obtenerDetallesDelProducto($ID_producto) {
        $query = $this->db->prepare(
           'SELECT productos.*, categorias.nombre_categoria
            FROM productos 
            JOIN categorias ON productos.ID_categoria = categorias.ID_categoria
            WHERE productos.ID_producto = ?'
        );
        $query->execute([$ID_producto]);

        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }
}