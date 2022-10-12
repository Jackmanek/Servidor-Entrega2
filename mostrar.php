<?php
$peliculas = array($_POST['nombreP'] , $_POST['isan'], $_POST['anio'], $_POST['puntos']);
//$pelicula = $_POST['pelicula'];

if(!empty($_POST['peliculas'])){

    $peliculas= explode(", ", $_POST['peliculas']);
print_r($_POST);
}else{
    $peliculas = array();
    echo "nada";
}
//   array_push($peliculas, $pelicula);  
//     $_POST[]=$peliculas;





?>