<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST['introducir_nombre'] ?? '';
    $email    = $_POST['introducir_email'] ?? '';
    $telefono = $_POST['introducir_telefono'] ?? '';
    $asunto   = $_POST['introducir_asunto'] ?? '';
    $mensaje  = $_POST['introducir_mensaje'] ?? '';

    // Armamos el texto a guardar
    $texto = "=============================\n";
    $texto .= "Nombre: $nombre\n";
    $texto .= "Email: $email\n";
    $texto .= "Teléfono: $telefono\n";
    $texto .= "Asunto: $asunto\n";
    $texto .= "Mensaje: $mensaje\n";
    $texto .= "Fecha: " . date("Y-m-d H:i:s") . "\n";
    $texto .= "=============================\n\n";

    // Guardamos en contactos.txt (lo crea si no existe)
    file_put_contents("contactos.txt", $texto, FILE_APPEND | LOCK_EX);

    echo "<h2>✅ Gracias, $nombre. Tus datos se han guardado correctamente.</h2>";
    echo "<a href='HOME.html'>Volver al formulario</a>";
} else {
    echo "❌ No se recibieron datos.";
}

