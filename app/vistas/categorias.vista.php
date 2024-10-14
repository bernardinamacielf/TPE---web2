<?php

class categoriasVista {

  public function listarCategorias($categorias) {
    $usuario = null;
    require_once 'templates/layout/header.phtml';
    require_once 'templates/lista_categorias.phtml';
  }

  public function listarItemPorCategoria($productos) {
    $usuario = null;
    require_once 'templates/layout/header.phtml';
    require_once 'templates/lista_items.phtml';
  }

  public function mostrarError($error) {
    $usuario = null;
    require_once 'templates/layout/header.phtml';
    require_once 'templates/error.phtml';
  }
}



