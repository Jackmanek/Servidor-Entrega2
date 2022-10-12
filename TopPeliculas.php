<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top-Pliculas</title>
    <style>
        form{
            width:600px;
            border:1px solid black;
            height:400px;
            margin:0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content:space-around;
            font-family:Helvetica;
        }
        label{
            width: 48%;
            height:10%;
            display:flex;
            align-items: center;
            justify-content:center;
        }
        input, select{
            width:45%;
            height:10%;
            text-align:center;
            font-family:Helvetica;
        }
        
        button{
            height:20%;
            width:80%;
            font-family:Helvetica;
            font-size:1.6rem;
        }


    </style>
</head>
<body>
    <pre>
        <?php
        $strinPeliS = "";
        if(isset($_POST["submit"])){

            //$peliculas = $peliculas."<br>".$_POST["nombreP"]."<br>".$_POST["isan"]."<br>".$_POST["anio"]."<br>".$_POST["puntos"];
            //echo $peliculas;

            $peliculas = array($_POST['nombreP'] , $_POST['isan'], $_POST['anio'], $_POST['puntos']);
            //print_r($_POST);
            
            $strinPeli = implode(", ", $peliculas);
            $strinPeliS = $_POST['strinPeliS'];
            $strinPeliS = $strinPeliS . $strinPeli;
            
            // echo "<br>";
            // echo $strinPeliS;
            // echo "<br>";
            $arrayFinal = array();

            $array1=explode("/", $strinPeliS);
            for($i=0;$i<sizeof($array1);$i++){
                $aux = explode(",", $array1[$i]);
                array_push($arrayFinal,$aux);
            }

            echo "<table border=1>";
            foreach($arrayFinal as $item){
                echo "<tr>";
                foreach($item as $it){
                    echo "<td>";
                    echo $it;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
        print_r($_POST);
            
        }
        
        
            

        ?>
    </pre>
    <form action="TopPeliculas.php" method="post">
        <label for="nombreP">Nombre Pelicula: </label>
        <input type="text" name="nombreP" id=""><br>
        <label for="isan">Numero ISAN: </label>
        <input type="text" name="isan" id=""><br>
        <label for="anio">Año: </label>
        <input type="text" name="anio" id=""><br>
        <label for="puntos">Puntuacion: </label>
        <select name="puntos" id="">
                <option value="">Select puntuacion</option>
                <option value="1">1 punto</option>
                <option value="2">2 puntos</option>
                <option value="3">3 puntos</option>
                <option value="4">4 puntos</option>
                <option value="5">5 puntos</option>
        </select><br>
        <input type="hidden" name="strinPeliS" id="" value="<?php echo $strinPeliS; ?>">
        <button type="submit" name="submit" >Enviar</button>

    </form>    

</body>
</html>