<?php 

class autenticacionVista {
    public function mostrarLogin($error = '') {
        require_once 'templates/formulario_login.phtml';
    }
}