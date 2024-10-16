<?php

class categoriasVista {
  private $usuario;

  public function __construct($usuario = null) {
    $this->usuario = $usuario;
  }

  public function listarCategorias($categorias) {
    $usuario = $this->usuario;
    require_once 'templates/layout/header.phtml';
    require_once 'templates/lista_categorias.phtml';
  }

  public function listarItemPorCategoria($productos, $nombre_categoria) {
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



