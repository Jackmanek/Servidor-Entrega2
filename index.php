<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        form{
            width:450px;
            height: 150px;
            border:1px solid black;
            border-radius:12px;
           
        }
        .cosa{
            margin: 30px auto;
        }
    </style>
</head>
<body>
    <form class="row mb-3 cosa" action="main.php">
        <div class="mb-3">
            <label for="staticEmail2" class="form-label">Introduce tu Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
    </form>
</body>
</html>