<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Selecciona tus frutas favoritas</h1>
    <form action="mostrarFrutas.php" method="POST">
        <input type="checkbox" name="manzana" id="manzana" value="Manzana">
        <label for="manzana">Manzana</label>
        <br>
        <input type="checkbox" name="pera" id="pera" value="Pera">
        <label for="pera">pera</label>
        <br>
        <input type="checkbox" name="sandia" id="sandia" value="Sandia">
        <label for="sandia">sandia</label>
        <br>
        <input type="checkbox" name="melocoton" id="melocoton" value="Melocoton">
        <label for="melocoton">melocoton</label>
        <br>
        <input type="checkbox" name="albaricoque" id="albaricoque" value="Albaricoque">
        <label for="albaricoque">albaricoque</label>
        <br>
        <input type="checkbox" name="melon" id="melon" value="Melon">
        <label for="melon">melon</label>
        <br>
        <input type="checkbox" name="fresa" id="fresa" value="Fresa">
        <label for="fresa">fresa</label>
        <br>
        <button type="submit">Enviar</button>

    </form>
    
    
</body>
</html>