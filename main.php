<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <pre>
        <?php
       
        if(isset($_POST['submit'])){
            //Recogemos los datos de formulario en un array para convertirlo en string
            $titulo_0 = $_POST['titulo'];
            $isan_0 = $_POST['isan'];
            $anio_0 = $_POST['anio'];
            $puntos_0 = $_POST['puntos'];

            agregarPelicula($titulo_0, $isan_0, $anio_0, $puntos_0);

        }
        //Creamos una funcion en la que pasamos los parametros pasados por POST
    
        function agregarPelicula($titulo_0, $isan_0, $anio_0, $puntos_0){
            $pelicula = array();
            //añadiremos en un array las peliculas recogidas por POST
            if(isset($_POST['lista_Pelis'])){
                //separamos el array en el que añadimos las peliculas
                $pelicula = explode("\n", trim($_POST['lista_Pelis']));
            }
            //Si esta vacio registra un nuevo nombre y un nuevo ISAN
            if(!empty($titulo_0) && !empty($isan_0)){
                //creo una funcion en la que comprobare si existe el nombre
                if(!compruebaNombre($titulo_0, $pelicula)){
                    $pelicula[] = trim($titulo_0). "-" .trim($isan_0). "-" .trim($anio_0). "-" .trim($puntos_0);
                    echo "TODO CORRECTO";
                }else{
                    echo "El titulo ya esta registrado";
                }
            }else{
               
                echo "Lo campos estan vacios";
            }

            imprime($pelicula);
            dibujaTabla($pelicula);
        
        }
        function compruebaNombre($titulo_0, $pelicula){
            $encontrado = false;
            foreach ($pelicula as $dato){
                //separamos los valores del array creado
                $ite = explode("-", trim($dato));
                //recorremos el item[0]= titulo;
                if($ite[0] == $titulo_0){
                    $$encontrado = true;
                }
            }
            return $encontrado;
        }
        function imprime($pelicula){
            $txtArea= "<textarea style='display: none' name='lista_Pelis' form='main'>";
                  
            foreach ($pelicula as $item) {
                        $txtArea .= trim($item) . "\n";
                    }
                    $txtArea .= "</textarea>";
                    echo $txtArea;
            
        }
        function dibujaTabla($pelicula) {
            $table = "<table border=1>";
            $table .= "<tr>";
            $table .= "<td>Titulo </td>";
            $table .= "<td> ISAN </td>";
            $table .= "<td> Año </td>";
            $table .= "<td> Puntos</td>";
            $table .= "</tr>";
            foreach ($pelicula as $item) {
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
        }


        
        // print_r($_POST);
        
        
        ?>
        <form action="main.php" method="post" id="prueba">
            <label for="">Titulo: </label>
            <input type="text" name="titulo" id=""><br>
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
            
            <button type="submit" name="submit">Guardar</button>
        </form>

    </pre>
</body>
</html>