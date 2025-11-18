<?php
    if(empty($_FILES) && isset($_FILES['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > 0){
        $TAMAÑO_ENVIADO = $_SERVER['CONTENT_LENGTH'];
        
        $tamaño_enviado = $_SERVER['CONTENT_LENGTH'];
        
        $limite = ini_get('post_max_size');
        die("El archivo es demasiado grande");
    }
    
    $tamMax = 1024 * 1024 * 2;
    $ruta = 'curriculums/';
    $nombreArchivo = '';

    //Crear el directorio
    if(!is_dir($ruta)){
    mkdir($ruta, 0777, true);
    }

    $errores = [];

    if(isset($_FILES['cv']) && $_FILES['cv']['size'] < $tamMax && $_FILES['cv']['type'] === "application/pdf"){

    }

    if($_FILES['cv']['error'] !== UPLOAD_ERR_OK){
        array_push($errores, "Hubo un problema al subir el archivo");
    }

    if(!isset($_FILES['cv'])){
        array_push($errores, "El archivo no se ha subido");
    }

    if($_FILES['cv']['size'] > $tamMax){
        array_push($errores, "El archivo es demasiado grande");

    }

    if($_FILES['cv']['type'] !== "application/pdf"){
         array_push($errores, "El archivo no es un PDF");
    }

    if(count($errores) === 0){
        //Guarda el archivo
        $nombreArchivo = $ruta . $_POST['dni'] . '.pdf';
        move_uploaded_file($_FILES['cv']['tmp_name'], $nombreArchivo);
    }
    //Compruebo el tipo de archivo y tamaño y que se hayan subido correctamente

    //Si todo es correcto guardo el archivo y muestro un mensaje de exito
    //Si no, muestro un mensaje de error y un link a la pagina anterior

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Resultado de la solicitud</h1>
    <?php
        if(count($errores) === 0){
            echo '<h2>Sus datos se han subido correctamete</h2>';
            echo '<a href="'. $nombreArchivo.'">Ver curriculums</a>';
        }else{
            //mostrar los errores que hay en el array errores
            echo '<h2>Se han encontrado los siguientes errores</h2>';
            foreach($errores as $error){
                echo '<p>'. $error .'</p>';
            }
            //poner link a la pagina anterior
            echo '<a href="index6.html">Volver al formulario</a>';
        }
    ?>
</body>
</html>