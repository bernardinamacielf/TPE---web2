<?php 

class usuarioModelo {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ventas;charset=utf8', 'root', '');
    }

    public function obtenerUsuario($nombre) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
        $query->execute([$nombre]);

        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}