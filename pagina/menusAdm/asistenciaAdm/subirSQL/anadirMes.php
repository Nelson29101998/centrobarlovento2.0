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

    setlocale(LC_ALL, 'es_ES');

    $buscarRut = 'SELECT * FROM asistencias WHERE idTallerTiempo="' . $cajaIdTiempo . '"';

    $sacarEstudiante = mysqli_query($conexion, $buscarRut);
    if (mysqli_num_rows($sacarEstudiante) == 1) {
        while ($row = mysqli_fetch_array($sacarEstudiante)) {
            $sacarNom = $row['estudiante'];
            $sacarTel = $row['telefono'];
            $sacarMail = $row['mail'];
            $verRut = $row['rut'];
        }
    }
    $tiempoDatos = $date = new DateTime(date("H:i:s"));

    $tiempoRut = $date->format('H:i:s') . $verRut;

    switch ($cajaMes) {
        case "Enero":
            $Mes = "Febrero";
            break;
        case "Febrero":
            $Mes = "Marzo";
            break;
        case "Marzo":
            $Mes =  "Abril";
            break;
        case "Abril":
            $Mes = "Mayo";
            break;
        case "Mayo":
            $Mes = "Junio";
            break;
        case "Junio":
            $Mes = "Julio";
            break;
        case "Julio":
            $Mes = "Agosto";
            break;
        case "Agosto":
            $Mes = "Septiembre";
            break;
        case "Septiembre":
            $Mes = "Octubre";
            break;
        case "Octubre":
            $Mes = "Noviembre";
            break;
        case "Noviembre":
            $Mes = "Diciembre";
            break;
        case "Diciembre":
            $Mes = "Enero";
            $cajaAno = $cajaAno + 1;
            break;
    };

    $sqlCurso = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
    VALUES ('" . $tiempoRut . "', '" . $verRut . "','" . $sacarNom . "','" . $cajaTaller . "','" . $sacarTel . "','" . $sacarMail . "', '" . $Mes . "', '" . $cajaAno . "')";

    $sqlCursoTiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
    VALUES ('"  . $tiempoRut . "', '"  . $cajaEstdTiempo . "', '" . $cajaTaller . "', '" . $Mes . "', '" . $cajaAno . "')";
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

        <title>Anadir Mes</title>
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
        if ($conexion->query($sqlCurso) === TRUE && $conexion->query($sqlCursoTiempo) === TRUE) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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