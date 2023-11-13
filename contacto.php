<?php // Comienzo códdigo php
define('WP_USE_THEMES', false); // Anulo el Tema elegido por defecto en la web principal 
require('wp-load.php'); // Carga la funcionalidad principal de WordPress en entornos que no son necesariamente el propio núcleo de WordPress.
get_header(); // Agrego la cabecera de página por medio de la función get_header() predefinida en Wordpress 
?> <!-- Cierro bloque de código php --> 

<!DOCTYPE html> <!-- Estándar HTML5 -->
<html lang="es"> <!--  Idioma principal del contenido de la página web. -->
<head> <!-- Apertura de etiqueta de cabecera -->
    <meta charset="UTF-8"> <!-- Conjunto de caracteres utilizado en el documento -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Propiedades de la ventana de visualización (viewport) para adaptar a la pantalla -->
    <link rel="stylesheet" href="<?php echo 'css/contacto.css'; ?>"> <!-- Genero una ruta relativa por medio de php para obtener la página de estilo para la web compilado.php -->
    <title>Vivencius</title> <!-- Título que se visualiza en la barra de título del navegador -->
</head> <!-- Cierre de etiqueta de cabecera -->
<body> <!-- Apertura de etiqueta del cuerpo de la web para despliege de contenido a visualizar -->

    <header>
        <h1>Formulario de Contacto</h1> <!-- Se coloca título principal -->
    </header>

    <main>
        <hr>
        <!-- Se crea el formulario de contacto -->
        <form action="proc_form.php" method="post">
            <label for="nombre">Tu nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Tu correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required>

            <label for="mensaje">Tu mensaje (opcional):</label>
            <textarea id="mensaje" name="mensaje" rows="4"></textarea>

            <input type="submit" value="Enviar">
        </form>

       
    </main>

    <footer>
        <p class="com_fecha">Fecha: <?php echo date("d-m-Y"); ?></p>
    </footer>

</body> <!-- Cierre de etiqueta de body -->
</html> <!-- Fin de documento html -->

<?php // Apertura de bloque php
    get_footer(); // Agrego el pie de página por medio de la función get_footer() predefinido en Wordpress
?> <!-- Cierre de bloque php -->
