<?php

// 1. Aseguramos que el archivo llega desde un formulario con método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

// 2. Guardamos el nombre del usuario que vino del formulario
$usuario = $_POST['nombre'];

// 3. Guardamos la información del archivo subido
$archivo = $_FILES['archivo'];

// 4. Ruta base donde se almacenarán todos los usuarios
$rutaBase = 'usuarios/';

// 5. Ruta específica para la carpeta del usuario
//    Ejemplo: usuarios/Alejandro/
$rutaUsuario = $rutaBase . $usuario . '/';

// 6. Si la carpeta del usuario NO existe, la creamos
if (!is_dir($rutaUsuario)) {
    mkdir($rutaUsuario, 0777, true);
}

// 7. Preparamos un array para guardar posibles errores
$errores = [];

// 8. Validación mínima obligatoria: ¿hubo un error al subir el archivo?
if ($archivo['error'] !== UPLOAD_ERR_OK) {
    $errores[] = "Hubo un error al subir el archivo.";
}

// 9. Construimos la ruta final donde guardaremos el archivo
//    Ejemplo: usuarios/Alejandro/foto.png
$rutaFinal = $rutaUsuario . $archivo['name'];

// 10. Si NO hay errores, movemos el archivo desde la carpeta temporal
if (count($errores) === 0) {

    // move_uploaded_file toma el archivo temporal y lo mueve a la ruta final
    move_uploaded_file($archivo['tmp_name'], $rutaFinal);

    // Preparamos el mensaje de éxito
    $mensaje = "El archivo " . $archivo['name'] . " del usuario " . $usuario . " ha sido subido correctamente";

    // Redireccionamos otra vez al formulario, enviando el mensaje por GET
    header("Location: index.html?mensaje=" . urlencode($mensaje));
    exit;

} else {

    // Si hubo errores, los unimos en un solo texto
    $mensajeError = implode(", ", $errores);

    // Redireccionamos enviando los errores al formulario
    header("Location: index7.html?error=" . urlencode($mensajeError));
    exit;
}

?>
