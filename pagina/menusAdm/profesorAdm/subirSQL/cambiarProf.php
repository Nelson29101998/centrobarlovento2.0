<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../../inicio.html");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../../conectarSQL/conectar_SQL.php";

    $editarId = $_GET['cambiarId'];
    $sacarSelect1 = $_POST['editarCurso1'];
    $sacarSelect2 = $_POST['editarCurso2'];
    $sacarSelect3 = $_POST['editarCurso3'];
    $sacarSelect4 = $_POST['editarCurso4'];
    $sacarSelect5 = $_POST['editarCurso5'];
    $sacarSelect6 = $_POST['editarCurso6'];
    $sacarSelect7 = $_POST['editarCurso7'];
    

    $sql = "UPDATE cursoyprofesor SET curso='".$sacarSelect1."', curso2='".$sacarSelect2."', 
    curso3='".$sacarSelect3."', curso4='".$sacarSelect4."', curso5='".$sacarSelect5."',
    curso6='".$sacarSelect6."', curso7='".$sacarSelect7."'
     WHERE id='".$editarId."'";
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <title>Borrar de Asistencia</title>
        <link rel="icon" type="image/png" href="../../../../image/icon_Barlovento.png" />
        <style>
            body {
                background-color: #2689F9;
                color: white;
            }

            img {
                width: 30%;
                border-radius: 45px;
            }

            @media (max-width: 600px) {
                img {
                    width: 50%;
                    border-radius: 45px;
                }
            }
        </style>
    </head>

    <body>
        <?php
        if ($conexion->query($sql) === TRUE) {
            header("Location: ../profesor.php");
        } else {
            echo "<br>
    <center>
    <img src='../../../../image/barloventoMal.jpg' class='img-fluid'>
    <h1 class='display-4'>No pudo subir. Algo problema.</h1>
    <a href='javascript:history.back()'>
    <button type='button' class='btn btn-primary'>
    <i class='fa-solid fa-reply'></i> Volver
    </button>
    </a>
    </center>
    <br>";
            echo "Error: " . $sql . $conexion->error;
        }

        $conexion->close();
        ?>
    </body>

    </html>

<?php
}
?>