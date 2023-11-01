<?php
//Heroku para SQL (Externo de la base de datos).

$servername = "xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "v9ndjrlbp8vmkwvx";
$password = "ukxa5cw90w4tw4k1";
$bd = "wp1z0tk2fml75a4x";


//XAMPP para SQL (Se queda en casa y no se puede afuera).
/*
$servername = "localhost";
$username = "root";
$password = "";
$bd = "centrobarlovento";
*/
$conexion = new mysqli($servername, $username, $password, $bd);
if ($conexion->connect_error) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/bootstrap/css/stylesidebar.css">
        <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/fontawesome/css/all.min.css">
        <title>No encuentro de la base de datos</title>
    </head>

    <body>
        <center>
            <h1>¡No encontrado la base de datos!</h1>
            <br>
            <img src="https://drive.google.com/uc?id=1GEjDiM8KaSZRLSyL48ckNbQXNkq88-SM" class="img-thumbnail rounded" width="400">
            <br>
            <a href="cerrar.php"><button type="button" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Volver</button></a>
        </center>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="/bootstrap/bootstrap.min.js"></script>
    </body>

    </html>
<?php
}
?>