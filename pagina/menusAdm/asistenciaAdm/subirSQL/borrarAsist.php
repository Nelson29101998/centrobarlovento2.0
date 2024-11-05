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

    $borrarId = $_GET['borrarId'];
    $borrarTiempoId = $_GET['borrarTiempoId'];
    $borrarNom =  $_GET['borrarNom'];
    $borrarTaller = $_GET['borrarTaller'];
    $revisarMes = $_GET['borrarMes'];
    $revisarAno = $_GET['borrarAno'];

    $mesesNum = array(
        "Enero" => 1,
        "Febrero" => 2,
        "Marzo" => 3,
        "Abril" => 4,
        "Mayo" => 5,
        "Junio" => 6,
        "Julio" => 7,
        "Agosto" => 8,
        "Septiembre" => 9,
        "Octubre" => 10,
        "Noviembre" => 11,
        "Diciembre" => 12
    );

    // $mes_actual_es = $meses[$sacarMesHoy];
    $sacarNumMes = $mesesNum[$revisarMes];
    // echo $sacarNumMes;
    $mesAnteriorNum = $sacarNumMes - 1;
    $mesAtras = array_search($mesAnteriorNum, $mesesNum);

    if ($mesAnteriorNum == 0) {
        $mesAnteriorNum = 12;
    }

    $dice = "No";

    $actualizarSql = "UPDATE asistencias SET nextMes = '" . $dice . "' WHERE estudiante LIKE '%" . $borrarNom . "%' AND cursos='" . $borrarTaller . "' AND mes = '" . $mesAtras . "' AND ano = '" . $revisarAno . "'";

    
        $sql = "DELETE FROM asistencias WHERE id = '" . $borrarId . "'";

        $sqlBorrarTiempo = "DELETE FROM tallertiempo 
        WHERE idTallerTiempo = '" . $borrarTiempoId . "' AND estudiante LIKE '%" . $borrarNom . "%' AND taller='" . $borrarTaller . "'";
    
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
        if (($conexion->query($sql) === TRUE) && ($conexion->query($sqlBorrarTiempo) === TRUE) && ($conexion->query($actualizarSql) === TRUE)) {
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