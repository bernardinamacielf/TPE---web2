<?php 

require_once 'config/config.php';

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
}