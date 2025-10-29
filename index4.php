<?php
include_once('datos.php');
include_once('funciones.php');

var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <div class="container">
    <h1>Cuestionario</h1>
    <p class="subtitulo">Responde a las 10 preguntas y descubre tu nivel</p>
    <?php 
    //comprobar si ya se ha contestado al formulario
    if(count($_POST) > 1){
        mostrar_resultado($preguntas);
    }else{
        mostrar_test($preguntas);
    }
    ?>
    </div>
</body>
</html>