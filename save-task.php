<?php

include('db.php');

if (isset($_POST['save_pregunta'])){
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $hobby = $_POST['hobby'];
    $tiempo = !is_null($_POST['tiempo']) ? $_POST['tiempo'] : 'null';
    
    $query = "INSERT INTO preguntas(nombre,genero,hobby,tiempo)values('$nombre','$genero','$hobby',$tiempo)";
    echo $query;

    $resultado = mysqli_query($conn,$query);

    if(!$resultado){
        die("query failed");
    }else{
        echo "Guardado";
        $newURL = 'reporte.php';
        header('Location: '.$newURL);
    }

}


?>