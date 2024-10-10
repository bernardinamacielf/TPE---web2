<?php

require_once 'libs/respuesta.php';
require_once 'app/middlewares/sesion.autentitacion.middleware.php';
require_once 'app/controladores/categorias.controlador.php';
require_once 'app/controladores/productos.controlador.php';
require_once 'app/controladores/autenticacion.controlador.php';
require_once 'app/controladores/admin.categoria.controlador.php';
require_once 'app/controladores/admin.producto.controlador.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new respuesta();

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        require_once 'templates/home.phtml';
        break;
    case 'lista_categorias':
        $controlador = new categoriasControlador();
        $controlador->mostrarCategorias();
        break;
    case 'mostrar_item':
        $controlador = new categoriasControlador();
        $controlador->mostrarItemPorCategoria($params[1]);
        break;
    case 'lista_productos':
        $controlador = new productosControlador();
        $controlador->mostrarProductos();
        break;
    case 'producto':
        $controlador = new productosControlador();
        $controlador->productoDetalle($params[1]);
        break;
    case 'mostrarLogin':
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
        $controlador = new adminProductoControlador();
        $controlador->mostrarProductos();  
    case 'agregar_producto':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminProductoControlador();
        $controlador->agregarProducto();
        break;
    case 'eliminar_producto':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminProductoControlador();
        $controlador->eliminarProducto($params[1]);
        break;
    case 'editar_producto':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminProductoControlador();
        $controlador->editarProducto($params[1]);
        break;
    case 'admin_categoria':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminControlador();
        $controlador->mostrarCategorias();  
    case 'agregar_categoria':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminControlador();
        $controlador->agregarCategoria();
        break;
    case 'eliminar_categoria':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminControlador();
        $controlador->eliminarCategoria($params[1]);
        break;
    case 'editar_categoria':
        sesionAutenticacionMiddleware($res);
        $controlador = new adminControlador();
        $controlador->editarCategoria($params[1]);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
