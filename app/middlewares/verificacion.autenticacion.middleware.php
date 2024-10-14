<?php 

function verificacionAutenticacionMiddleware($res) {
    if ($res->usuario) {
        return;
    } else {
        header('Location: ' . BASE_URL . 'mostrarLogin');
        die();
    }
}