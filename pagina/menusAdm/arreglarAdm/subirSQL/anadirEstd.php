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

    setlocale(LC_ALL, 'es_ES');

    $tiempoDatos = $date = new DateTime(date("H:i:s"));

    $sacarMes = $_POST['elegirMes'];
    $sacarAno = $_POST['elegirAno'];
    $sacarCurso = $_POST['verCurso'];

    $revisarBool = false;


    //$verRut = $_POST['cadaEstudiante'];

    if (!empty($_POST['estd_list'])) {
        foreach ($_POST['estd_list'] as $checkRut) {
            $verRut = $checkRut;

            $tiempoRut = $date->format('H:i:s') . $verRut;

            $buscarRut = 'SELECT * FROM inscripcion WHERE rutPartc="' . $verRut . '"';

            $sacarEstudiante = mysqli_query($conexion, $buscarRut);
            if (mysqli_num_rows($sacarEstudiante) == 1) {
                while ($row = mysqli_fetch_array($sacarEstudiante)) {
                    $sacarNom = $row['nombrePartc'];
                    $sacarTel = $row['celularPartc'];
                    $sacarMail = $row['mailPartc'];
                }
            }

            $sqlPartc1 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
            VALUES ('" . $tiempoRut . "', '" . $verRut . "','" . $sacarNom . "','" . $sacarCurso . "','" . $sacarTel . "','" . $sacarMail . "', '" . $sacarMes . "', '" . $sacarAno . "')";

            $sqlPartc1Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
            VALUES ('"  . $tiempoRut . "', '"  . $sacarNom . "', '" . $sacarCurso . "', '" . $sacarMes . "', '" . $sacarAno . "')";

            if (($conexion->query($sqlPartc1) === TRUE) && ($conexion->query($sqlPartc1Tiempo) === TRUE)) {
                $revisarBool = true;
            }else{
                echo "Error: " . $sql . $conexion->error;
            }
        }
    }
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

        <title>Subiendo de Estudiante</title>
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
        if ($revisarBool == true) {
            echo "OK 1";
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