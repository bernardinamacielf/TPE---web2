# Ventas

## Integrantes:
* Dolores Garrido
* Bernardina Maciel Fonte

## Descripción
El objetivo de este proyecto es diseñar una base de datos para el manejo de un catálogo de productos clasificados en distintas categorías para su venta. Esta misma permitirá almacenar información sobre la categoría y sus correspondientes productos, facilitando la gestión y consulta.

En este modelo, implementamos una relación de 1 a N entre categorías y productos. Es decir, una categoría puede contener varios productos, pero cada producto pertenece a una única categoría.

## DER
![Diagrama Entidad Relación](/der.png)

## Despliegue del sitio:
Para desplegar el sitio web en un servidor con Apache y MySQL, lo primero que hay que hacer es clonar el repositorio git. Una vez que tenga el proyecto en el servidor, es necesario configurar la base de datos. Para eso, hay que importar en phpMyAdmin el archivo ventas.sql que se encuentra en la carpeta TPE parte II, que contiene la estructura y los datos iniciales de la base de datos.
Para acceder al sitio se debe utilizar la dirección: localhost/TPE parte II.

Una vez accedido al sitio encontrará la parte pública en la cual puede navegar y visualizar las listas tanto de categorías como de productos, ambas con sus detalles. En la barra de navegación a su vez se encuentra la sección para administrar datos(iniciar sesión), en la cual podrá realizar el ABM de ambas secciones (categorias y productos). Luego de realizar los cambios que desee podrá cerrar sesión y volver al acceso público en el cual se verán esos cambios realizados.

## Acceso administrador de datos:
* Usuario: webadmin    
* Contraseña: admin

