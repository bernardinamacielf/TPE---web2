<?php

require_once 'app/modelos/admin.categoria.modelo.php';
require_once 'app/vistas/admin.categoria.vista.php';

class adminControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new adminModelo();
        $this->vista = new adminVista();
    }

    public function mostrarCategorias() {
        $categorias = $this->modelo->obtenerCategorias();
        return $this->vista->adminListarCategorias($categorias);
    }

    public function mostrarItemPorCategoria($ID_categoria) {
        $productos = $this->modelo->obtenerItemPorCategoria($ID_categoria); 
        $this->vista->adminListarItemPorCategoria($productos); 
    }

    public function agregarCategoria() {
        if(!isset($_POST['nombre_categoria']) || empty($_POST['nombre_categoria'])) {
            return $this->vista->mostrarError('Es necesario ingresar una categoria');
        }

        $nombre_categoria = $_POST['nombre_categoria'];

        $ID_categoria = $this->modelo->insertarCategoria($nombre_categoria);
        header('Location: ' . BASE_URL . 'admin_lista_categorias');
    }

    public function eliminarCategoria($ID_categoria) {
        $categoria = $this->modelo->obtenerCategorias($ID_categoria);

        if(!$categoria) {
            return $this->vista->mostrarError('No existe la categoria');
        }

        $this->modelo->borrarCategoria($ID_categoria);
        header('Location: ' . BASE_URL . 'admin_categoria');
    }

    public function editarCategoria($ID_categoria) {
        $categoria = $this->modelo->obtenerCategorias($ID_categoria);

        if(!$categoria) {
            return $this->vista->mostrarError('No existe la categoria');
        }

        $this->modelo->actualizarEstadoCategoria($ID_categoria);
        header('Location: ' . BASE_URL . 'admin_categoria');
    }
    
}