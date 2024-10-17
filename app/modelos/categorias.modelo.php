<?php 

require_once 'app/modelos/config.php';

class categoriasModelo {
    private $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END

		END;
        $this->db->query($sql);
        }
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

    //para que siempre se vea el nombre de la categoría a la que pertenecen los productos
    public function obtenerIdCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE ID_categoria = ?');
        $query->execute([$ID_categoria]);

        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    //funcionalidad para el administrador
    
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