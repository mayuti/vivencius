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
        <h1>Busqueda de Vivencias</h1> <!-- Se coloca título principal -->
        <hr>
    </header>

    <main>
    <?php
       // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de búsqueda
            $term = sanitize_text_field($_POST['term']); // Asegúrate de sanear la entrada

            // Realizar la consulta con el término de búsqueda en el campo descripcion
            $resultados = $wpdb->get_results("SELECT * FROM wp_vivencias WHERE descripcion LIKE '%" . esc_sql($term) . "%'");

            // Mostrar los resultados
            if ($resultados) {
                echo '<h2>Resultados de la búsqueda</h2>';
                foreach ($resultados as $fila) {
                    echo '<iframe src="' . esc_url($fila->iframe_code) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                    echo '<p>' . esc_html($fila->descripcion) . '</p>';
                    echo('<hr>');
                }
            } else {
                echo '<p>No se encontraron resultados.</p>';
            }
        }
    ?>

        <!-- Se crea el formulario de búsqueda -->
        <br>
    <form method="post">
        <label for="term">Buscar: </label>
        <input type="text" name="term" id="term" required>
        <input type="submit" value="Buscar">
    </form>
    <br>
    <hr>
    <br>
    </main>

</body> <!-- Cierre de etiqueta de body -->
</html> <!-- Fin de documento html -->

<?php // Apertura de bloque php
    get_footer(); // Agrego el pie de página por medio de la función get_footer() predefinido en Wordpress
?> <!-- Cierre de bloque php -->
