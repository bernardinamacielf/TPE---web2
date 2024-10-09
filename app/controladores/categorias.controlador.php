<?php

require_once 'app/modelos/categorias.modelo.php';
require_once 'app/vistas/categorias.vista.php';

class categoriasControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new categoriasModelo();
        $this->vista = new categoriasVista();
    }

    public function mostrarCategorias() {
        $categorias = $this->modelo->obtenerCategorias();
        return $this->vista->listarCategorias($categorias);
    }

    public function mostrarItemPorCategoria($ID_categoria) {
        $productos = $this->modelo->obtenerItemPorCategoria($ID_categoria); 
        $this->vista->listarItemPorCategoria($productos); 
    }
}