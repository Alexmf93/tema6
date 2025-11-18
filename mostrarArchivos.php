<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die("Acceso no permitido");
    }

    $usuario = $_POST['nombre'];

    $archivo = $_FILES['archivo'];
    $rutaBase = 'usuarios/';
    $rutaUsuario = $rutaBase . $usuario . '/';

    if (!is_dir($rutaUsuario)) {
    mkdir($rutaUsuario, 0777, true);
    }

    $errores = [];

    move_uploaded_file($archivo['tmp_name'], $rutaFinal);



?>