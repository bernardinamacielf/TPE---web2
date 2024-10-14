<?php 

class autenticacionVista {
    
    public function mostrarLogin($error = '') {
        $usuario = null;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/formulario_login.phtml';
    }
}