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
    <link rel="stylesheet" href="<?php echo 'css/compilado.css'; ?>"> <!-- Genero una ruta relativa por medio de php para obtener la página de estilo para la web compilado.php -->
    <title>Vivencius</title> <!-- Título que se visualiza en la barra de título del navegador -->
</head> <!-- Cierre de etiqueta de cabecera -->
<body> <!-- Apertura de etiqueta del cuerpo de la web para despliege de contenido a visualizar -->

    <header>
        <h1>VIVENCIAS</h1> <!-- Se coloca título principal -->
    </header>

    <main>
    <?php
        function consulta($id_tema) {
            global $wpdb; // Se define variable
            $resultado = $wpdb->get_results("SELECT * FROM wp_vivencias WHERE tema LIKE '" . $id_tema . "'"); // Se realiza consulta a la base de datos, se obtiene los resultados filtrados por el campo tema con contenido empresa
            if ($resultado) { // Si la variable $resultado tiene contenido da resultado verdadero y entra en el if
                echo '<table>'; // Se comienza a construir una tabla
                $contador = 0; // Se inicializa la variable $count en 0 para controlar elementos por fila de la tabla
                foreach ($resultado as $fila) { // Se comienzan a iterar los elementos almacenados en la variable $resultado y almacenándolo uno a uno en la variable $fila
                    if ($contador % 3 === 0) { // Se controla por medio del módulo que cada 3 iteraciones concluidas ->
                        echo '<tr>';            // se crea una fila nueva en la tabla
                    }
                    echo '<td>'; // Se crea la celda
                    echo '<iframe src="' . esc_url($fila->iframe_code) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'; // Se incrusta el código obtenido de la base de datos en modo iframe que muestra el video a exponer
                    echo '<p>' . esc_html($fila->descripcion) . '</p>'; // Se pone una descripción bajo el video también extarído de la base de datos
                    echo '</td>'; // Se cierra la celda
                    if ($contador % 3 === 2 || $contador === count($resultado) - 1) { // Control para cerrar la fila después de cada 3 elementos
                        echo '</tr>'; // Se cierra la fila
                    }
                    $contador++; // Contador de control
                    }
                echo '</table>'; // Cierro la tabla
            } else { // Si la variable $contenido no tiene nada almacenado -->
                echo '<p>No hay vivencias disponibles en esta sección.</p>'; // se envía del servidor al navegador el mensaje "No hay vivencias ..."
            }
            echo '<br><hr>'; // Se envía al navegador un salto de línea y se imprime una línea horizontal.
        }?>
        
        
        
        <hr>
        <!-- Se crea la sección de VIVENCIAS EMPRESARIALES -->
        <section id="empresa"> 
            <?php
                echo '<h2>EMPRESARIAL</h2>'; // Se envía título H2 EMPRESARIAL
                consulta('empresa');
            ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->

        <!-- Se crea la sección de VIVENCIAS MUJERES: LIBERTAD Y SOFTWARE -->
        <section id="mujer"> 
            <?php
                echo '<h2>MUJERES: LIBERTAD Y SOFTWARE</h2>'; // Se envía título H2 MUJERES: LIBERTAD Y SOFTWARE
                consulta('mujer');
            ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->

        <!-- Se crea la sección de COMUNIDADES -->
        <section id="comunidad"> 
            <?php
                echo '<h2>COMUNIDADES</h2>'; // Se envía título H2 COMUNIDADES
                consulta('comunidad');
            ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->

        <!-- Se crea la sección de EDUCACION -->
        <section id="educacion"> 
            <?php
                echo '<h2>EDUCACIÓN</h2>'; // Se envía título H2 EDUCACIÓN
                consulta('educacion');
                ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->

        <!-- Se crea la sección de ENTRETENIMIENTO -->
        <section id="ocio"> 
            <?php
                echo '<h2>ENTRETENIMIENTO</h2>'; // Se envía título H2 ENTRETENIMIENTO
                consulta('ocio');
            ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->

        <!-- Se crea la sección de COOPERATIVISMO -->
        <section id="coop"> 
            <?php
                echo '<h2>COOPERATIVISMO</h2>'; // Se envía título H2 COOPERATIVISMO
                consulta('coop');
            ?>
        </section> <!-- Finaliza la sección -->
        <!-- FIN DE SECCION -->        
        
        <!-- SE PUEDEN AGREGAR MAS SECCIONES ACÁ -->
       
    </main>

    <footer>
        <p class="com_per">Esperamos nos cuentes tu vivencia...</p> <!-- Texto previo al footer de Wordpress -->
    </footer>

</body> <!-- Cierre de etiqueta de body -->
</html> <!-- Fin de documento html -->

<?php // Apertura de bloque php
    get_footer(); // Agrego el pie de página por medio de la función get_footer() predefinido en Wordpress
?> <!-- Cierre de bloque php -->
