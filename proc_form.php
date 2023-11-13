<?php // Se procesan los datos obtenidos del formulario de contacto de la web contacto.php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Dirección de correo del destinatario
    $destinatario = "contacto@vivencius.ar";

    // Crear el cuerpo del correo
    $cuerpoCorreo = "Nombre: $nombre\n";
    $cuerpoCorreo .= "Correo Electrónico: $email\n";
    $cuerpoCorreo .= "Asunto: $asunto\n";
    $cuerpoCorreo .= "Mensaje: $mensaje\n";

    if (mail($destinatario, $asunto, $cuerpoCorreo, "Remitente: $email")) {
        $_SESSION['formulario_enviado'] = true;
        // Redirecciona a una web "saludos.php" donde muestra mensaje de éxito
        header("Location: saludo.php");
        exit();
    } else {
        header("Location: error.php?mensaje=". urlencode($cuerpoCorreo)); //Se pasa el valor de la variable $cuerpoCorreo por medio de la url 
    }
}
 
?>