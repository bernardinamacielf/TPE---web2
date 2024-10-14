<?php 

function sesionAutenticacionMiddleware($res) {
    session_start();
    if(isset($_SESSION['ID_usuario'])){
        $res->usuario = new stdClass();
        $res->usuario->ID_usuario = $_SESSION['ID_usuario'];
        $res->usuario->nombre =  $_SESSION['nombre'];
        return;
    } else {
        $res->usuario = null;
    }
}