<?php 

class adminVista {
    public function adminListarCategorias($categorias) {
        require_once 'templates/admin_lista_categorias.phtml';
    }

    public function adminListarItemPorCategoria($productos) {
        require_once 'templates/lista_items.phtml';
    }
    
    public function mostrarError($error) {
       require_once 'templates/error.phtml';
      }

}