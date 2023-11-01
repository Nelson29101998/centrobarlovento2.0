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

    $cajaIdTiempo = $_GET['cajaIdTiempo'];

    $cajaEstdTiempo = $_GET['cajaEstdTiempo'];

    $cajaTaller = $_GET['cajaTaller'];

    $cajaMes = $_GET['cajaMes'];

    $cajaAno = $_GET['cajaAno'];

    include_once "../ordenar/postDias.php";
    include_once "../ordenar/postDias2.php";
    include_once "../ordenar/postDias3.php";

    
    //echo $lis2D . "<br>";


    //  echo $cajaIdTiempo . "<br>" . $cajaEstdTiempo . "<br>" . $cajaTaller . "<br>" . $cajaMes . "<br>" . $cajaAno . "<br>";

    $guardaDiasSQL = ("UPDATE tallertiempo SET
    `1`=" . $lis1D . " , `2`=" . $lis2D . ", `3`=" . $lis3D . ", `4`=" . $lis4D . ", `5`=" . $lis5D . ",
    `6`=" . $lis6D . ", `7`=" . $lis7D . ", `8`=" . $lis8D . ", `9`=" . $lis9D . ", `10`=" . $lis10D . ",
    `11`=" . $lis11D . ", `12`=" . $lis12D . ", `13`=" . $lis13D . ", `14`=" . $lis14D . ", `15`=" . $lis15D . ",
    `16`=" . $lis16D . ", `17`=" . $lis17D . ", `18`=" . $lis18D . ", `19`=" . $lis19D . ", `20`=" . $lis20D . ",
    `21`=" . $lis21D . ", `22`=" . $lis22D . ", `23`=" . $lis23D . ", `24`=" . $lis24D . ", `25`=" . $lis25D . ",
    `26`=" . $lis26D . ", `27`=" . $lis27D . ", `28`=" . $lis28D . ", `29`=" . $lis29D . ", `30`=" . $lis30D . ",
    `31`=" . $lis31D . "
    WHERE `idTallerTiempo`='" . $cajaIdTiempo . "' AND `estudiante`='" . $cajaEstdTiempo . "' AND `taller`='" . $cajaTaller . "' AND
    `mes`='" . $cajaMes . "' AND `ano`='" . $cajaAno . "'");
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

        <title>Actualizar de dia de asistencia</title>
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
        if (($conexion->query($guardaDiasSQL) === TRUE)) {
            echo "<br>
            <center>
                <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
                <h1 class='display-4'>
                    Has actualizar su exito. Muchas gracias por preferirnos.
                </h1>
                <a href='javascript:history.back()'>
                    <button type='button' class='btn btn-primary'>
                        <i class='fa-solid fa-reply'></i> Volver
                    </button>
                </a>
            </center>";
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