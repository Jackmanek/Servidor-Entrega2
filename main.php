<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<style>
     body{
        display: flex;
        justify-content: center;
    }
    .contenedor{
        border:2px solid red;
        width:300px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .verde{
        border: 1px solid green;
        color:white;
        background-color: green;
        text-align:center;
        text-transform: uppercase;
    }
    .rojo{
        border: 1px solid red;
        color:white;
        background-color: red;
        text-align:center;
        text-transform: uppercase;
    }
</style>
</head>
<body>
    <pre>
        <?php
       
        if(isset($_POST['guardar'])){
            //Recogemos los datos de formulario en un array para convertirlo en string
            $titulo_0 = $_POST['titulo'];
            $isan_0 = $_POST['isan'];
            $anio_0 = $_POST['anio'];
            $puntos_0 = $_POST['puntos'];

            concatenaDatos($titulo_0, $isan_0, $anio_0, $puntos_0);

        }
        //Creamos una funcion en la que pasamos los parametros pasados por POST
        function concatenaDatos($titulo_0, $isan_0, $anio_0, $puntos_0) {
            //nuevo array
            $peliculas = Array();

            //si esta definida la variable listaAgenda (si existe el textArea con la lista)
            if (isset($_POST['listaPeliculas'])) {
                //separamos y almacenamos dentro de un array los items de la lista textArea
                $peliculas = explode("\n", trim($_POST['listaPeliculas']));
            }
            //valido que no esten vacios los campos
            if (!empty($titulo_0) && !empty($isan_0)) {
                //valido que el nombre no exista y que el ISAN tiene 8 digitos
                if (!existeNombre($titulo_0, $peliculas) && ((strlen($isan_0)>=8) && (strlen($isan_0)<=8))) {
                    //agrego al array los nuevos datos
                    $peliculas[] = trim($titulo_0) . '-' . trim($isan_0). '-' . trim($anio_0). '-' . trim($puntos_0);
                    echo "<p class='verde'>registro hecho</p>";
                } else {
                    echo "<p class='rojo'>El titulo ya esta registrado ó El ISAN no tiene 8 digitos</p>";
                    
                }
            } else {
                echo "<p class='rojo'>Campos vacios, rellenalos porfavor</p>";
            }
            if (!empty($titulo_0) && empty($isan_0)){
                echo existeNombres($titulo_0, $peliculas);
            }

            dibujaenOculto($peliculas);
            pintaTabla($peliculas);
        }

        function existeNombre($titulo_0, $peliculas) {
            $existe = false;
            //recorreo el array
            foreach ($peliculas as $item) {
                //separo el titulo
                $res = explode("-", trim($item));
                //pregunto por el titulo
                if ($res[0] == $titulo_0) {
                    $existe = true;
                }
            }
            return $existe;
        }
        function existeNombres($titulo_0, $peliculas) {
            
            //recorreo el array
            foreach ($peliculas as $item) {
                
                $res = explode("-", trim($item));
                
                // if ($res[0] == $titulo_0) {
                //     $existe = true;
                // }
                if (strncmp($res[0], $titulo_0, 5) === 0)
                    echo "Los strings coinciden";
                    print_r($peliculas);
                
            }
            
        }


        function dibujaenOculto($peliculas) {
            $txtArea = "<textarea style='display: none' name='listaPeliculas' form='main'>";
            foreach ($peliculas as $item) {
                $txtArea .= trim($item) . "\n";
            }
            $txtArea .= "</textarea>";
            echo $txtArea;
        }

        function pintaTabla($peliculas) {
            echo "<div class='contenedor'>";
            $table = "<table>";
            $table .= "<tr>";
            $table .= "<td> Titulo </td>";
            $table .= "<td> ISAN </td>";
            $table .= "<td> Año </td>";
            $table .= "<td>Puntos</td>";
            $table .= "</tr>";
            foreach ($peliculas as $item) {
                $res = explode("-", trim($item));

                $table .= "<tr>";
                $table .= "<td> $res[0] </td>";
                $table .= "<td> $res[1] </td>";
                $table .= "<td> $res[2] </td>";
                $table .= "<td> $res[3] </td>";
                $table .= "</tr>";
            }
            $table .= "</table>";
            echo $table;
            echo "</div>";
        }
        print_r($_POST);
        ?>
        <form action="main.php" method="post" id="main">
            <label for="">Titulo: </label>
            <input type="text" name="titulo" id="" ><br>
            <label for="">ISAN: </label>
            <input type="number" name="isan" id=""><br>
            <label for="">Año: </label>
            <input type="number" name="anio" id=""><br>
            <select name="puntos" id="">
                <option value="">Selecciona una puntuacion</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <!-- <input type="hidden" name="list_Pelis" id="" value="<?php echo $list_Pelis ?>"> -->
            <input type="submit" name="guardar" value="Guardar">
        </form>
        <pre>
</body>
</html>