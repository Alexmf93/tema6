<?php
    echo 'Mostrar tabla del ejercicio 2';
    echo '<br>';
    $numero = $_GET['tabla'];
    $color = $_GET['color'];
    for($i = 0; $i<=10; $i++){
        echo "<font color='$color'>$numero x $i = " . $numero*$i . '</font></br>' ;
    }
    
    
?>