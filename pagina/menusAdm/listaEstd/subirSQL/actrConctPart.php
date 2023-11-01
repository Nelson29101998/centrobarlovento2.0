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

    $rutPartc = $_GET["buscarRut"];

    $sacarNom1 = $_POST["cambiarNom1"];
    $sacarNom2 = $_POST["cambiarNom2"];
    $sacarParent1 = $_POST["cambiarParent1"];
    $sacarParent2 = $_POST["cambiarParent2"];
    $sacarCel1 = $_POST["cambiarCel1"];
    $sacarCel2 = $_POST["cambiarCel2"];

    $sqlAsistencia = "UPDATE inscripcion SET nomCont1='" . $sacarNom1 . "', nomCont2='" . $sacarNom2 . "',
    parentCont1='" . $sacarParent1 . "', parentCont2='" . $sacarParent2 . "', celCont1='" . $sacarCel1 . "',
    celCont2='" . $sacarCel2 . "' WHERE rutPartc='" . $rutPartc . "'";
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

        <title>Actualizar de Participante</title>
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
        <br>
        <?php
        if ($conexion->query($sqlAsistencia) === TRUE) {
        ?>
            <center>
                <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
                <h1 class='display-4'>Has actualizado su exito. Muchas gracias por preferirnos.</h1>
                <a href='javascript:history.back()'>
                    <button type='button' class='btn btn-primary'>
                        <i class='fa-solid fa-reply'></i> Volver
                    </button>
                </a>
            </center>";
        <?php
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
            echo "Error: " . $sqlAsistencia;
        }
        $conexion->close();
        ?>
    </body>

    </html>

<?php
}
?>