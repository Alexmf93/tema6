<?php

function mostrar_test($preguntas){
    ?>
    <form action="" method="POST">
        <?php foreach($preguntas as $num => $pregunta): ?>
            <div class="pregunta">
                <h3><?php echo $num . ' ' . $pregunta['pregunta'];?></h3>
                <?php foreach($pregunta['opciones'] as$letra => $opcion):?>
                        <div class="opcion">
                            <input 
                            type="radio" 
                            name="pregunta_<?php echo $num; ?>"
                            value="<?php echo $letra; ?>"
                            id="pregunta_<?php echo $num; ?>"
                            required
                        >
                        <label>
                            <?php echo $opcion; ?>
                        </label>
                        </div>
                    <?php endforeach; ?>
            </div>

        <?php endforeach; ?>
        <button type="submit" name="enviar">Enviar Respuestas</button>
    </form>

    <?php
}

function mostrar_resultado($preguntas){

    $nota = 0;  
    $errores = [];


    foreach($preguntas as $num => $pregunta){
        if($_POST['pregunta_' . $num]===$pregunta['correcta']){
        $nota++;
    }else{
        $errores[$num] = [
            'respuesta_usuario' => $_POST['pregunta_' . $num],
            'respuesta_correcta' => $pregunta['correcta'],
            'explicacion' => $pregunta['explicacion']
        ];
    }
}
    ?>
    <h3>Has completado el test</h3>

    <div class="resultados">
        <div class="nota">
            <?php echo $nota >= 5 ? 'Aprobado' : 'Suspenso'; ?>
            <p>Tu nota final ha sido <?php echo $nota?> / 10</p>
        </div>
    </div>
    <?php if(!empty($errores)){ ?>
        <div class="errores">
            <h3>Respuestas incorrectas</h3>
            <?php foreach($errores as $numPregunta => $error){
                $respuesta_correcta = $error['respuesta_correcta'];
                $explicacion = $error['explicacion'];
                echo "<p class='incorrecta'> $numPregunta Respuesta correcta $respuesta_correcta</p>";
                echo "Explicacion: $explicacion";
            }?>
        </div>
      <?php  }
    ?>
    <a href="">Volver a intentarlo</a>
    <?php
}


