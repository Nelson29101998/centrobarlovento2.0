<?php
function tiempoDatos()
{
    $month = date("n"); //Reemplazable por número del 1 a 12
    $year = date("Y"); //Reemplazable por un año valido
    switch (date('n', mktime(0, 0, 0, $month, 1, $year))) {
        case 1:
            $sacarMes = 'Enero';
            break;
        case 2:
            $sacarMes = 'Febrero';
            break;
        case 3:
            $sacarMes = 'Marzo';
            break;
        case 4:
            $sacarMes = 'Abril';
            break;
        case 5:
            $sacarMes = 'Mayo';
            break;
        case 6:
            $sacarMes = 'Junio';
            break;
        case 7:
            $sacarMes = 'Julio';
            break;
        case 8:
            $sacarMes = 'Agosto';
            break;
        case 9:
            $sacarMes = 'Septiembre';
            break;
        case 10:
            $sacarMes = 'Octubre';
            break;
        case 11:
            $sacarMes = 'Noviembre';
            break;
        case 12:
            $sacarMes = 'Diciembre';
            break;
    };

    return $sacarMes;
}

function tiempoAdelanteMes($revMes)
{
    if ($revMes == 'Enero' || $revMes == 'Febrero') {
        $mes = 'Marzo';
    } elseif ($revMes == 'Marzo') {
        $mes = 'Abril';
    } elseif ($revMes == 'Abril') {
        $mes = 'Mayo';
    } elseif ($revMes == 'Mayo') {
        $mes = 'Junio';
    } elseif ($revMes == 'Junio') {
        $mes = 'Julio';
    } elseif ($revMes == 'Julio') {
        $mes = 'Agosto';
    } elseif ($revMes == 'Agosto') {
        $mes = 'Septiembre';
    } elseif ($revMes == 'Septiembre') {
        $mes = 'Octubre';
    } elseif ($revMes == 'Octubre') {
        $mes = 'Noviembre';
    } elseif ($revMes == 'Noviembre') {
        $mes = 'Diciembre';
    } elseif ($revMes == 'Diciembre') {
        $mes = 'Enero';
    }

    return $mes;
}

function tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso, $sacarMes)
{
    $datosSQLRevisar = "SELECT * FROM asistencias WHERE estudiante='" . $nomPartc . "' AND cursos = '" . $sacarCurso . "'";

    $carga = mysqli_query($conexion, $datosSQLRevisar);
    while ($row = mysqli_fetch_array($carga)) {
        $mes = $row['mes'];

        if ($mes == $sacarMes) {
            $sacarMes = tiempoAdelanteMes($mes);
        }
    }

    return $sacarMes;
}

session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../../inicio.html");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../../conectarSQL/conectar_SQL.php";

    $tiempoDatos = $date = new DateTime(date("H:i:s"));

    //* Tabla de Participante
    $nomPartc = $_GET["newTallerNom"];
    $datosSQL = "SELECT * FROM inscripcion WHERE nombrePartc='" . $nomPartc . "'";

    $carga = mysqli_query($conexion, $datosSQL);
    if (mysqli_num_rows($carga) == 1) {
        while ($row = mysqli_fetch_array($carga)) {
            $rutPartc = $row['rutPartc'];
            $telPartc = $row["celularPartc"];
            $correoPartc = $row["mailPartc"];
        }
    }

    $tiempoRut = $date->format('H:i:s') . $rutPartc;

    $sacarMes = tiempoDatos();

   

    //* Tabla de los cursos
    //! Curso 1
    if ($_POST['sacarCurso1'] != "vacio") {
        $sacarCurso1 = $_POST['sacarCurso1'];
        $sacarMes1 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso1, $sacarMes);
        if ($sacarMes1 == 'Enero'){
            $sacarAno1 = date("Y") + 1;
        }else{
            $sacarAno1 = date("Y");
        }
        //idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano
        $sqlCurso1 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso1 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes1 . "', '" . $sacarAno1 . "')";
    } else {
        $sqlCurso1 = "";
    }

    //! Curso 2
    if ($_POST['sacarCurso2'] != "vacio") {
        $sacarCurso2 = $_POST['sacarCurso2'];
        $sacarMes2 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso2, $sacarMes);
        if ($sacarMes2 == 'Enero'){
            $sacarAno2 = date("Y") + 1;
        }else{
            $sacarAno2 = date("Y");
        }
        $sqlCurso2 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso2 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes2 . "', '" . $sacarAno2 . "')";
    } else {
        $sqlCurso2 = "";
    }

    //! Curso 3
    if ($_POST['sacarCurso3'] != "vacio") {
        $sacarCurso3 = $_POST['sacarCurso3'];
        $sacarMes3 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso3, $sacarMes);
        if ($sacarMes3 == 'Enero'){
            $sacarAno3 = date("Y") + 1;
        }else{
            $sacarAno3 = date("Y");
        }
        $sqlCurso3 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso3 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes3 . "', '" . $sacarAno3 . "')";
    } else {
        $sqlCurso3 = "";
    }

    //! Curso 4
    if ($_POST['sacarCurso4'] != "vacio") {
        $sacarCurso4 = $_POST['sacarCurso4'];
        $sacarMes4 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso4, $sacarMes);
        if ($sacarMes4 == 'Enero'){
            $sacarAno4 = date("Y") + 1;
        }else{
            $sacarAno4 = date("Y");
        }
        $sqlCurso4 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso4 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes4 . "', '" . $sacarAno4 . "')";
    } else {
        $sqlCurso4 = "";
    }

    //! Curso 5
    if ($_POST['sacarCurso5'] != "vacio") {
        $sacarCurso5 = $_POST['sacarCurso5'];
        $sacarMes5 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso5, $sacarMes);
        if ($sacarMes5 == 'Enero'){
            $sacarAno5 = date("Y") + 1;
        }else{
            $sacarAno5 = date("Y");
        }
        $sqlCurso5 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso5 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes5 . "', '" . $sacarAno5 . "')";
    } else {
        $sqlCurso5 = "";
    }

    //! Curso 6
    if ($_POST['sacarCurso6'] != "vacio") {
        $sacarCurso6 = $_POST['sacarCurso6'];
        $sacarMes6 = tiempoDatosRevisar($conexion, $nomPartc, $sacarCurso6, $sacarMes);
        if ($sacarMes6 == 'Enero'){
            $sacarAno6 = date("Y") + 1;
        }else{
            $sacarAno6 = date("Y");
        }
        $sqlCurso6 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso6 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes6 . "', '" . $sacarAno6 . "')";
    } else {
        $sqlCurso6 = "";
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

        <title>Subiendo de inscripción</title>
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

        if (!empty($sqlCurso1)) {
            $sqlCurso1Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso1 . "', '" . $sacarMes1 . "', '" . $sacarAno1 . "')";
            if ($conexion->query($sqlCurso1) === TRUE) {
                if ($conexion->query($sqlCurso1Tiempo) === TRUE) {
                    $anotar = "Curso 1 esta ok";
                    if (!empty($sqlCurso2)) {
                        if ($conexion->query($sqlCurso2) === TRUE) {
                            $sqlCurso2Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso2 . "', '" . $sacarMes2 . "', '" . $sacarAno2 . "')";
                            if ($conexion->query($sqlCurso2Tiempo) === TRUE) {
                                $anotar = $anotar . ", Curso 2 esta ok";
                            }
                        }
                    }
                    if (!empty($sqlCurso3)) {
                        if ($conexion->query($sqlCurso3) === TRUE) {
                            $sqlCurso3Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso3 . "', '" . $sacarMes3 . "', '" . $sacarAno3 . "')";
                            if ($conexion->query($sqlCurso3Tiempo) === TRUE) {
                                $anotar = $anotar . ", Curso 3 esta ok";
                            }
                        }
                    }
                    if (!empty($sqlCurso4)) {
                        if ($conexion->query($sqlCurso4) === TRUE) {
                            $sqlCurso4Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso4 . "', '" . $sacarMes4 . "', '" . $sacarAno4 . "')";
                            if ($conexion->query($sqlCurso4Tiempo) === TRUE) {
                                $anotar = $anotar . ", Curso 4 esta ok";
                            }
                        }
                    }
                    if (!empty($sqlCurso5)) {
                        if ($conexion->query($sqlCurso5) === TRUE) {
                            $sqlCurso5Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso5 . "', '" . $sacarMes5 . "', '" . $sacarAno5 . "')";
                            if ($conexion->query($sqlCurso5Tiempo) === TRUE) {
                                $anotar = $anotar . ", Curso 5 esta ok";
                            }
                        }
                    }
                    if (!empty($sqlCurso6)) {
                        if ($conexion->query($sqlCurso6) === TRUE) {
                            $sqlCurso6Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso6 . "', '" . $sacarMes6 . "', '" . $sacarAno6 . "')";
                            if ($conexion->query($sqlCurso6Tiempo) === TRUE) {
                                $anotar = $anotar . ", Curso 6 esta ok";
                            }
                        }
                    }
                }
            }

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
        <script>
            console.log("<?php
                            echo $anotar;
                            ?>");
        </script>
    </body>

    </html>

<?php

}
?>