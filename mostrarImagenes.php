<?php

$arrayImagenes = [];
$hayErrores = false;

if(count($_FILES) > 0){
    foreach($_FILES as $key => $value){
        if($value['error'] === UPLOAD_ERR_OK &&  strpos($value['type'], 'image/') === 0){
            $arrayImagenes[$key] = $value;
        }else{
            $hayErrores = true;
        }
    }

    uasort($arrayImagenes, function ($a, $b) {
        return $a['size'] - $b['size'];
    });
}
//Esto de abajo comnetado es como lo tenia antes pero no estaba optimizado el codigo
//comprobar que la imagen se ha subido y que no ha habido errores
// if(isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] === UPLOAD_ERR_OK){
//     //extraigo el tipo de archivo
//     $tipoImagen1 = $_FILES['imagen1']['type'];
//     //Extraigoel tamaño
//     $sizeImagen1 = $_FILES['imagen1']['size'];
//     //compruebo si es una imagen
//     $esImagen1 = strpos($tipoImagen1, 'image/') === 0;
//     //nombre temporal de la imagen
//     $nombreImagen1 = $_FILES['imagen1']['tmp_name'];
// }
// if(isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] === UPLOAD_ERR_OK){
//     //extraigo el tipo de archivo
//     $tipoImagen2 = $_FILES['imagen2']['type'];
//     //Extraigoel tamaño
//     $sizeImagen2 = $_FILES['imagen2']['size'];
//     //compruebo si es una imagen
//     $esImagen2 = strpos($tipoImagen2, 'image/') ===0;
//     $nombreImagen2 = $_FILES['imagen2']['tmp_name'];
// }
    function mostrarImagenes($nombreImagen1, $tipoImagen1){
        $data1 = base64_encode(file_get_contents($nombreImagen1));
        echo "<img src='data:$tipoImagen1;base64,$data1' alt='Image subida' style'max-width:300px;'>";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Mostrar imágenes</h1>
    <?php

        if(!$hayErrores){
            echo '<p>Las imagenes se han subido bien</p>';
            foreach($arrayImagenes as $key => $value){
                mostrarImagenes($value['tmp_name'], $value['type']);
            }
        }else{
            echo '<p>Ha habido un error</p>';
            echo '<a href=)"index5.html">Volver al formulario</a>';
        }
        // if($esImagen1 && $esImagen2){
        //     echo '<p>Las imagenes se han subido correctamente</p>';
        //     if($sizeImagen1 < $sizeImagen2){
        //     //mostrar lsa imagenes
        //     $data1 = base64_encode(file_get_contents($nombreImagen1));
        //     echo "<img src='data:$tipoImagen1;base64,$data1' alt='Imagen subida' style='max-width:300px;'>";
        //     $data2 = base64_encode(file_get_contents($nombreImagen2));
        //     echo "<img src='data:$tipoImagen2;base64,$data2' alt='Imagen subida' style='max-width:300px;'>";
        // }else{
        //     $data2 = base64_encode(file_get_contents($nombreImagen2));
        //     echo "<img src='data:$tipoImagen2;base64,$data2' alt='Imagen subida' style='max-width:300px;'>";
        //     $data1 = base64_encode(file_get_contents($nombreImagen1));
        //     echo "<img src='data:$tipoImagen1;base64,$data1' alt='Imagen subida' style='max-width:300px;'>";
        //     }
        // }else{
        //     echo '<p>Ha habido un error, comprueba el tipo de archivo y tu conexion</p>';
        //     echo '<a href="index5.html">Volver al formulario</a>';
        // }

    ?>
</body>
</html>