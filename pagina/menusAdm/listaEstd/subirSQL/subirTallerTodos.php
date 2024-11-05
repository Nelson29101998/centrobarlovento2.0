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
    $datosSQLRevisar = "SELECT * FROM asistencias WHERE estudiante LIKE '%" . $nomPartc . "%' AND cursos = '" . $sacarCurso . "'";

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
            $nomPartc = $row['nombrePartc'];
            $remplazoNom = str_replace(" ", "", $nomPartc);
            $telPartc = $row["celularPartc"];
            $correoPartc = $row["mailPartc"];
        }
    }

    if ($rutPartc != "" || $rutPartc != null) {
        $tiempoRut = $date->format('H:i:s') . $rutPartc;
    } else {
        $tiempoRut = $date->format('H:i:s') . $remplazoNom;
    }

    if ($_POST["elegirMes"] == "vacio") {
        $sacarMes = tiempoDatos();
    } else {
        $sacarMes = $_POST['elegirMes'];
    }

    $sacarMesHoy = tiempoDatos();

    if ($_POST["elegirAno"] == "vacio") {
        $sacarAno = date("Y");
    } else {
        $sacarAno = $_POST['elegirAno'];
    }

    $sacarAnoHoy = date("Y");

    $sacarCurso1 = $_POST['sacarCurso1'];

    $guardarTodosTiempoTaller = "SELECT * FROM asistencias 
                    WHERE cursos='" . $sacarCurso1 . "' AND mes='" . $sacarMesHoy . "' AND ano='" . $sacarAnoHoy . "' AND estudiante <> '" . $nomPartc . "'";

    $resultadosTiempoTodos = mysqli_query($conexion, $guardarTodosTiempoTaller);
    while ($rowTiempo = mysqli_fetch_array($resultadosTiempoTodos)) {
        // $tiempoRut = $rowTiempo['idTallerTiempo'];
        $rutPartc = $rowTiempo['rut'];
        $nomPartc = $rowTiempo['estudiante'];
        $remplazoNom = str_replace(" ", "", $nomPartc);
        $telPartc = $rowTiempo['telefono'];
        $correoPartc = $rowTiempo['mail'];

        $revisarTaller = $rowTiempo['cursos'];
        $revisarMes = $rowTiempo['mes'];
        $revisarAno = $rowTiempo['ano'];

        if ($rutPartc != "" || $rutPartc != null) {
            $tiempoRut = $date->format('H:i:s') . $rutPartc;
        } else {
            $tiempoRut = $date->format('H:i:s') . $remplazoNom;
        }

        echo "Nombre: " . $nomPartc . "<br>";
        echo "Rut: " . $rutPartc . "<br>";
        echo "Taller: " . $revisarTaller . "<br>";
        echo "Mes: " . $revisarMes . "<br>";
        echo "Ano: " . $revisarAno . "<br>";

        $funcionaBool = false;

        if ($sacarCurso1 != $revisarTaller || $sacarMes != $revisarMes || $sacarAno != $revisarAno) {
            echo "ok
            <br>
            <br>";


            $sqlCurso = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
            VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso1 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";

            $sqlCursoTiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
            VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso1 . "', '" . $sacarMes . "', '" . $sacarAno . "')";

            if ($conexion->query($sqlCurso) === TRUE) {
                if ($conexion->query($sqlCursoTiempo) === TRUE) {
                    $funcionaBool = true;
                }
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

        if ($funcionaBool == true) {
            echo "Todo exitoso. Muchas gracias por preferirnos.";
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