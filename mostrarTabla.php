<?php
    echo 'Mostrar tabla';
    echo '</br>';
    $numero = $_GET['numero'];
    for($i = 0; $i<=$numero; $i++){
        echo "$numero x $i = " . $numero*$i . '</br>' ;
    }
    
    
?>