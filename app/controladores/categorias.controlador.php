<?php

require_once 'app/modelos/categorias.modelo.php';
require_once 'app/vistas/categorias.vista.php';

class categoriasControlador {
    private $modelo;
    private $vista;

    public function __construct($esAdmin = false, $usuario = null) {
        $this->modelo = new categoriasModelo();
        $this->vista = new categoriasVista($esAdmin, $usuario);
    }

    public function mostrarCategorias() {
        $categorias = $this->modelo->obtenerCategorias();
        return $this->vista->listarCategorias($categorias);
    }

    public function mostrarItemPorCategoria($ID_categoria) {
        $productos = $this->modelo->obtenerItemPorCategoria($ID_categoria); 
        $categoria = $this->modelo->obtenerIdCategoria($ID_categoria); 

        $this->vista->listarItemPorCategoria($productos, $categoria->nombre_categoria); 
    }

    //funcionalidad para el administrador

    public function agregarCategoria() {
        if(!isset($_POST['nombre_categoria']) || empty($_POST['nombre_categoria'])) {
            return $this->vista->mostrarError('Es necesario ingresar una categoria');
        }

        $nombre_categoria = $_POST['nombre_categoria'];

        $ID_categoria = $this->modelo->insertarCategoria($nombre_categoria);
        header('Location: ' . BASE_URL . 'admin_categoria');
    }

    public function eliminarCategoria($ID_categoria) {
        $categoria = $this->modelo->obtenerCategorias($ID_categoria);
        if(!$categoria) {
            return $this->vista->mostrarError('No existe la categoria');
        }

        //verificar si la categoria tiene productos antes de eliminarla
        $productos = $this->modelo->obtenerItemPorCategoria($ID_categoria);
        if(!empty($productos)) {
            $this->vista->mostrarError( "Es necesario que la categoría esté vacía para eliminarla");
        } else {
            //si no hay productos la elimina
            $this->modelo->borrarCategoria($ID_categoria);
            header('Location: ' . BASE_URL . 'admin_categoria');
        }
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