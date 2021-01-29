<?php
if (isset($_POST['array'])){
    $array = $_POST['array'];
    $numeros = unserialize($array);
}else{
    $numeros = [];
}

if (isset($_POST['añadir'])){

    if (is_numeric($_POST['num'])){
        $numero = $_POST['num'];
        $numeros[] = $numero;
        $mensaje = "";
    }
    
    if (empty($_POST['num'])){
        $mensaje = "Introduce un número valido";
    }
} 

if (isset($_POST['media'])){
    $suma = array_sum($numeros);
    $contador = count($numeros);
    $media = $suma/$contador;
    $mensaje =  "La media de todos los números introducidos es $media";
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio Extra1 Tema 6 GIT</title>
        <style>
            div{
                height: auto;
                width: 750px;
                background-color: #54aafe;
                text-align: center;
                font-family: arial;
                font-size: 30px;
                display: inline-block;
                text-align: center;
                margin-left:30%;
                border: 2px solid black;
            }
            
        </style>
    </head>
    <body>
        <div>
            <form method="POST">
                <input type="hidden" name="array" value="<?php echo htmlspecialchars(serialize($numeros)); ?>" />
                <input type="text" name="num"><br>
                <input type="submit" name="añadir" value="AÑADIR">
                <input type="submit" name="media" value="MEDIA" <?=empty($numeros) ? "disabled" : '';?>><br>
            </form>
            
            <?php
            foreach ($numeros as $contar){
                echo "Has introducido el número $contar<br>";
            }
            ?>
            <p><b><?= $mensaje ?? null; ?></b></p>
        </div>
        
    </body>
</html>
