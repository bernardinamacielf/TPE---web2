<?php 

class categoriasModelo {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ventas;charset=utf8', 'root', '');
    }

    public function obtenerCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    public function obtenerItemPorCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);

        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
}