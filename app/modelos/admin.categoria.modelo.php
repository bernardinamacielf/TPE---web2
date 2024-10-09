<?php 

class adminModelo {
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

    public function insertarCategoria($nombre_categoria, $suspendida = false) {
        $query = $this->db->prepare('INSERT INTO categorias(nombre_categoria, suspendida) VALUES (?, ?)');
        $query->execute([$nombre_categoria, $suspendida]);

        $ID_categoria = $this->db->lastInsertId();
        return $ID_categoria;
    }

    public function borrarCategoria($ID_categoria) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);
    }

    public function actualizarEstadoCategoria($ID_categoria) {
        $query = $this->db->prepare('UPDATE categorias SET suspendida = 1 WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);
    }
}