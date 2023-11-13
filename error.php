<?php // Comienzo códdigo php
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
    <h1>¡Hubo un error al enviar el formulario!</h1> <!-- Titulo con etiqueta H1 -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7f/Dialog-error.svg" alt="Error!"> <!-- Carga la imagen desde un link -->
    <br> <!-- Salto de línea -->
    <h2>Espere unos minutos y regrese a la página de Contacto.</h2> <!-- Titulo con etiqueta H2 -->
    <h3>Ve a Ayuda -> Contacto desde el Menú Principal</h3> <!-- Titulo con etiqueta H3 -->
    <br> <!-- Salto de línea -->
    <?php 
        if (isset($_GET['mensaje'])){ // Se verifica si existe un parámetro llamado 'mensaje' en la URL 
            echo ("Mensaje:");
            $mensaje = urldecode($_GET['mensaje']); // Se pasan los valores a la variable $mensaje
            echo ("[" . $mensaje . "]"); // Se imprime el $mensaje
            echo ("<br>");
            echo("Posiblemente se encuentre deshabilitado el envío de email por medio de la función <b>mail()</b> de PHP."); // Se imprime una leyenda
        }
    ?>
    <hr> <!-- Línea horizontal -->
    <br> <!-- Salto de línea -->
</body>
</html>

<?php // Apertura de bloque php
    get_footer(); // Agrego el pie de página por medio de la función get_footer() predefinido en Wordpress
    session_destroy(); // Se destruye la sesión por seguridad
?> <!-- Cierre de bloque php -->