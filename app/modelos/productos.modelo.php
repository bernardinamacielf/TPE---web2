<?php 

class productosModelo {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ventas;charset=utf8', 'root', '');
    }

    public function obtenerProductos() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    public function obtenerDetallesDelProducto($ID_producto) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE ID_producto = ?');
        $query->execute([$ID_producto]);

        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

}