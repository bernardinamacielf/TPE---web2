<?php

class categoriasVista {
  public function listarCategorias($categorias) {
    require_once 'templates/lista_categorias.phtml';
  }

  public function listarItemPorCategoria($productos) {
    require_once 'templates/lista_items.phtml';
  }

  public function mostrarError($error) {
    require_once 'templates/error.phtml';
  }
}



