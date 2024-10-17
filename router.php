<?php

require_once 'libs/respuesta.php';
require_once 'app/middlewares/sesion.autentitacion.middleware.php';
require_once 'app/middlewares/verificacion.autenticacion.middleware.php';
require_once 'app/controladores/categorias.controlador.php';
require_once 'app/controladores/productos.controlador.php';
require_once 'app/controladores/autenticacion.controlador.php';
require_once 'app/controladores/home.controlador.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new respuesta();

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sesionAutenticacionMiddleware($res);
        $controlador = new homeControlador($res);
        $controlador->mostrarHome();
        break;
    case 'lista_categorias':
        sesionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador();
        $controlador->mostrarCategorias();
        break;
    case 'mostrar_item':
        sesionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador();
        $controlador->mostrarItemPorCategoria($params[1]);
        break;
    case 'lista_productos':
        sesionAutenticacionMiddleware($res);
        $controlador = new productosControlador();
        $controlador->mostrarProductos();
        break;
    case 'producto':
        sesionAutenticacionMiddleware($res);
        $controlador = new productosControlador();
        $controlador->productoDetalle($params[1]);
        break;
    case 'mostrarLogin':
        sesionAutenticacionMiddleware($res);
        $controlador = new autenticacionControlador();
        $controlador->mostrarLogin();
        break;
    case 'login':
        $controlador = new autenticacionControlador();
        $controlador->login();
        break; 
    case 'logout':
        $controlador = new autenticacionControlador();
        $controlador->cerrarSesion();
        break;   
    case 'admin_producto':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new productosControlador($res);
        $controlador->mostrarProductos();  
        break;
    case 'agregar_producto':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new productosControlador($res);
        $controlador->agregarProducto();
        break;
    case 'eliminar_producto':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new productosControlador($res);
        $controlador->eliminarProducto($params[1]);
        break;
    case 'editar_producto':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new productosControlador($res);
        $controlador->editarProducto($params[1]);
        break;
    case 'admin_categoria':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador(true, $res->usuario);
        $controlador->mostrarCategorias();  
        break;
    case 'agregar_categoria':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador(true, $res->usuario);
        $controlador->agregarCategoria();
        break;
    case 'eliminar_categoria':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador(true, $res->usuario);
        $controlador->eliminarCategoria($params[1]);
        break;
    case 'editar_categoria':
        sesionAutenticacionMiddleware($res);
        verificacionAutenticacionMiddleware($res);
        $controlador = new categoriasControlador(true, $res->usuario);
        $controlador->editarCategoria($params[1]);
        break;
    default: 
        $controlador = new productosControlador();
        $controlador->default();
        break;
}
