<?php // Comienzo códdigo php
//session_start();
if (!isset($_SESSION['formulario_enviado']) || $_SESSION['formulario_enviado'] !== true) {
    // La variable de sesión no está establecida o no tiene el valor esperado
    header('Location: error.php'); // Se redirige a una página de error
    exit();
}

define('WP_USE_THEMES', false); // Anulo el Tema elegido por defecto en la web principal 
require('wp-load.php'); // Carga la funcionalidad principal de WordPress en entornos que no son necesariamente el propio núcleo de WordPress.
get_header(); // Agrego la cabecera de página por medio de la función get_header() predefinida en Wordpress 
?> <!-- Cierro bloque de código php --> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivencius - Saludos</title> <!-- Título para la barra del navegador -->
</head>
<body>
    <h1>Su mensaje se envió correctamente.</h1> <!-- Titulo con etiqueta H1 -->
    <h2>Muchas gracias por sus comentarios.</h2> <!-- Titulo con etiqueta H2 -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Android_Email_4.0_Icon.png" alt="Correo Enviado..."> <!-- Carga la imagen desde un link -->
    <br> <!-- Salto de línea -->
    <hr> <!-- Línea horizontal -->
    <br> <!-- Salto de línea -->
</body>
</html>

<?php // Apertura de bloque php
    get_footer(); // Agrego el pie de página por medio de la función get_footer() predefinido en Wordpress
    session_destroy(); // Se destruye la sesión para que no se pueda acceder directamente a la url saludo.php y redirigirá a error.php 
?> <!-- Cierre de bloque php -->