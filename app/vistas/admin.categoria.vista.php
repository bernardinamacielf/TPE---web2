<?php 

class adminVista {
    private $usuario = null;

    public function __construct($usuario) {
        $this->usuario = $usuario;
    }

    public function adminListarCategorias($categorias) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/admin_lista_categorias.phtml';
    }

    public function adminListarItemPorCategoria($productos) {
        $usuario = $this->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/lista_items.phtml';
    }
    
    public function mostrarError($error) {
       $usuario = $this->usuario;
       require_once 'templates/layout/header.phtml';
       require_once 'templates/error.phtml';
    }

}