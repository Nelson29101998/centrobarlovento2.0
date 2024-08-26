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

    // $cajaTaller = $_GET['cajaTaller'];

    // $cajaMes = $_GET['cajaMes'];

    // $cajaAno = $_GET['cajaAno'];

    if ($_POST['guardar'] == 'guardarTodos') {
        $cajaTaller = $_GET['cajaTaller'];

        $cajaMes = $_GET['cajaMes'];

        $cajaAno = $_GET['cajaAno'];
        $guardarTodosTiempoTaller = "SELECT * FROM tallertiempo 
                    WHERE taller='" . $cajaTaller . "' AND mes='" . $cajaMes . "' AND ano='" . $cajaAno . "'";

        $resultadosTiempoTodos = mysqli_query($conexion, $guardarTodosTiempoTaller);
        while ($rowTiempo = mysqli_fetch_array($resultadosTiempoTodos)) {

            $cajaIdTiempo = $rowTiempo['idTallerTiempo'];
            $cajaEstd = $rowTiempo['estudiante'];
            $cajaEstdSinCambiar = $cajaEstd;
            $cajaEstd = str_replace(" ", "", $cajaEstd);
            $cajaEstd = strtolower($cajaEstd);

            if (isset($_POST['dias1' . $cajaEstd])) {
                if ($_POST['dias1' . $cajaEstd] == 1 || $_POST['dias1' . $cajaEstd] == 0) {
                    $lis1D = "'" . $_POST['dias1' . $cajaEstd] . "'";
                }
            } else {
                $lis1D = "NULL";
            }
            
            if (isset($_POST['dias2' . $cajaEstd])) {
                if ($_POST['dias2' . $cajaEstd] == 1 || $_POST['dias2' . $cajaEstd] == 0) {
                    $lis2D = "'" . $_POST['dias2' . $cajaEstd] . "'";
                }
            } else {
                $lis2D = "NULL";
            }
            
            if (isset($_POST['dias3' . $cajaEstd])) {
                if ($_POST['dias3' . $cajaEstd] == 1 || $_POST['dias3' . $cajaEstd] == 0) {
                    $lis3D = "'" . $_POST['dias3' . $cajaEstd] . "'";
                }
            } else {
                $lis3D = "NULL";
            }
            
            if (isset($_POST['dias4' . $cajaEstd])) {
                if ($_POST['dias4' . $cajaEstd] == 1 || $_POST['dias4' . $cajaEstd] == 0) {
                    $lis4D = "'" . $_POST['dias4' . $cajaEstd] . "'";
                }
            } else {
                $lis4D = "NULL";
            }
            
            if (isset($_POST['dias5' . $cajaEstd])) {
                if ($_POST['dias5' . $cajaEstd] == 1 || $_POST['dias5' . $cajaEstd] == 0) {
                    $lis5D = "'" . $_POST['dias5' . $cajaEstd] . "'";
                }
            } else {
                $lis5D = "NULL";
            }
            
            if (isset($_POST['dias6' . $cajaEstd])) {
                if ($_POST['dias6' . $cajaEstd] == 1 || $_POST['dias6' . $cajaEstd] == 0) {
                    $lis6D = "'" . $_POST['dias6' . $cajaEstd] . "'";
                }
            } else {
                $lis6D = "NULL";
            }
            
            if (isset($_POST['dias7' . $cajaEstd])) {
                if ($_POST['dias7' . $cajaEstd] == 1 || $_POST['dias7' . $cajaEstd] == 0) {
                    $lis7D = "'" . $_POST['dias7' . $cajaEstd] . "'";
                }
            } else {
                $lis7D = "NULL";
            }
            
            if (isset($_POST['dias8' . $cajaEstd])) {
                if ($_POST['dias8' . $cajaEstd] == 1 || $_POST['dias8' . $cajaEstd] == 0) {
                    $lis8D = "'" . $_POST['dias8' . $cajaEstd] . "'";
                }
            } else {
                $lis8D = "NULL";
            }
            
            if (isset($_POST['dias9' . $cajaEstd])) {
                if ($_POST['dias9' . $cajaEstd] == 1 || $_POST['dias9' . $cajaEstd] == 0) {
                    $lis9D = "'" . $_POST['dias9' . $cajaEstd] . "'";
                }
            } else {
                $lis9D = "NULL";
            }
            
            if (isset($_POST['dias10' . $cajaEstd])) {
                if ($_POST['dias10' . $cajaEstd] == 1 || $_POST['dias10' . $cajaEstd] == 0) {
                    $lis10D = "'" . $_POST['dias10' . $cajaEstd] . "'";
                }
            } else {
                $lis10D = "NULL";
            }

            if (isset($_POST['dias11' . $cajaEstd])) {
                if ($_POST['dias11' . $cajaEstd] == 1 || $_POST['dias11' . $cajaEstd] == 0) {
                    $lis11D = "'" . $_POST['dias11' . $cajaEstd] . "'";
                }
            } else {
                $lis11D = "NULL";
            }
            
            if (isset($_POST['dias12' . $cajaEstd])) {
                if ($_POST['dias12' . $cajaEstd] == 1 || $_POST['dias12' . $cajaEstd] == 0) {
                    $lis12D = "'" . $_POST['dias12' . $cajaEstd] . "'";
                }
            } else {
                $lis12D = "NULL";
            }
            
            if (isset($_POST['dias13' . $cajaEstd])) {
                if ($_POST['dias13' . $cajaEstd] == 1 || $_POST['dias13' . $cajaEstd] == 0) {
                    $lis13D = "'" . $_POST['dias13' . $cajaEstd] . "'";
                }
            } else {
                $lis13D = "NULL";
            }
            
            if (isset($_POST['dias14' . $cajaEstd])) {
                if ($_POST['dias14' . $cajaEstd] == 1 || $_POST['dias14' . $cajaEstd] == 0) {
                    $lis14D = "'" . $_POST['dias14' . $cajaEstd] . "'";
                }
            } else {
                $lis14D = "NULL";
            }
            
            if (isset($_POST['dias15' . $cajaEstd])) {
                if ($_POST['dias15' . $cajaEstd] == 1 || $_POST['dias15' . $cajaEstd] == 0) {
                    $lis15D = "'" . $_POST['dias15' . $cajaEstd] . "'";
                }
            } else {
                $lis15D = "NULL";
            }
            
            if (isset($_POST['dias16' . $cajaEstd])) {
                if ($_POST['dias16' . $cajaEstd] == 1 || $_POST['dias16' . $cajaEstd] == 0) {
                    $lis16D = "'" . $_POST['dias16' . $cajaEstd] . "'";
                }
            } else {
                $lis16D = "NULL";
            }
            
            if (isset($_POST['dias17' . $cajaEstd])) {
                if ($_POST['dias17' . $cajaEstd] == 1 || $_POST['dias17' . $cajaEstd] == 0) {
                    $lis17D = "'" . $_POST['dias17' . $cajaEstd] . "'";
                }
            } else {
                $lis17D = "NULL";
            }
            
            if (isset($_POST['dias18' . $cajaEstd])) {
                if ($_POST['dias18' . $cajaEstd] == 1 || $_POST['dias18' . $cajaEstd] == 0) {
                    $lis18D = "'" . $_POST['dias18' . $cajaEstd] . "'";
                }
            } else {
                $lis18D = "NULL";
            }
            
            if (isset($_POST['dias19' . $cajaEstd])) {
                if ($_POST['dias19' . $cajaEstd] == 1 || $_POST['dias19' . $cajaEstd] == 0) {
                    $lis19D = "'" . $_POST['dias19' . $cajaEstd] . "'";
                }
            } else {
                $lis19D = "NULL";
            }
            
            if (isset($_POST['dias20' . $cajaEstd])) {
                if ($_POST['dias20' . $cajaEstd] == 1 || $_POST['dias20' . $cajaEstd] == 0) {
                    $lis20D = "'" . $_POST['dias20' . $cajaEstd] . "'";
                }
            } else {
                $lis20D = "NULL";
            }

            if (isset($_POST['dias21' . $cajaEstd])) {
                if ($_POST['dias21' . $cajaEstd] == 1 || $_POST['dias21' . $cajaEstd] == 0) {
                    $lis21D = "'" . $_POST['dias21' . $cajaEstd] . "'";
                }
            } else {
                $lis21D = "NULL";
            }
            
            if (isset($_POST['dias22' . $cajaEstd])) {
                if ($_POST['dias22' . $cajaEstd] == 1 || $_POST['dias22' . $cajaEstd] == 0) {
                    $lis22D = "'" . $_POST['dias22' . $cajaEstd] . "'";
                }
            } else {
                $lis22D = "NULL";
            }
            
            if (isset($_POST['dias23' . $cajaEstd])) {
                if ($_POST['dias23' . $cajaEstd] == 1 || $_POST['dias23' . $cajaEstd] == 0) {
                    $lis23D = "'" . $_POST['dias23' . $cajaEstd] . "'";
                }
            } else {
                $lis23D = "NULL";
            }
            
            if (isset($_POST['dias24' . $cajaEstd])) {
                if ($_POST['dias24' . $cajaEstd] == 1 || $_POST['dias24' . $cajaEstd] == 0) {
                    $lis24D = "'" . $_POST['dias24' . $cajaEstd] . "'";
                }
            } else {
                $lis24D = "NULL";
            }
            
            if (isset($_POST['dias25' . $cajaEstd])) {
                if ($_POST['dias25' . $cajaEstd] == 1 || $_POST['dias25' . $cajaEstd] == 0) {
                    $lis25D = "'" . $_POST['dias25' . $cajaEstd] . "'";
                }
            } else {
                $lis25D = "NULL";
            }
            
            if (isset($_POST['dias26' . $cajaEstd])) {
                if ($_POST['dias26' . $cajaEstd] == 1 || $_POST['dias26' . $cajaEstd] == 0) {
                    $lis26D = "'" . $_POST['dias26' . $cajaEstd] . "'";
                }
            } else {
                $lis26D = "NULL";
            }
            
            if (isset($_POST['dias27' . $cajaEstd])) {
                if ($_POST['dias27' . $cajaEstd] == 1 || $_POST['dias27' . $cajaEstd] == 0) {
                    $lis27D = "'" . $_POST['dias27' . $cajaEstd] . "'";
                }
            } else {
                $lis27D = "NULL";
            }
            
            if (isset($_POST['dias28' . $cajaEstd])) {
                if ($_POST['dias28' . $cajaEstd] == 1 || $_POST['dias28' . $cajaEstd] == 0) {
                    $lis28D = "'" . $_POST['dias28' . $cajaEstd] . "'";
                }
            } else {
                $lis28D = "NULL";
            }
            
            if (isset($_POST['dias29' . $cajaEstd])) {
                if ($_POST['dias29' . $cajaEstd] == 1 || $_POST['dias29' . $cajaEstd] == 0) {
                    $lis29D = "'" . $_POST['dias29' . $cajaEstd] . "'";
                }
            } else {
                $lis29D = "NULL";
            }
            
            if (isset($_POST['dias30' . $cajaEstd])) {
                if ($_POST['dias30' . $cajaEstd] == 1 || $_POST['dias30' . $cajaEstd] == 0) {
                    $lis30D = "'" . $_POST['dias30' . $cajaEstd] . "'";
                }
            } else {
                $lis30D = "NULL";
            }
            
            if (isset($_POST['dias31' . $cajaEstd])) {
                if ($_POST['dias31' . $cajaEstd] == 1 || $_POST['dias31' . $cajaEstd] == 0) {
                    $lis31D = "'" . $_POST['dias31' . $cajaEstd] . "'";
                }
            } else {
                $lis31D = "NULL";
            }

            $guardaTodosSQL = ("UPDATE tallertiempo SET
            `1`=" . $lis1D . " , `2`=" . $lis2D . ", `3`=" . $lis3D . ", `4`=" . $lis4D . ", `5`=" . $lis5D . ",
            `6`=" . $lis6D . ", `7`=" . $lis7D . ", `8`=" . $lis8D . ", `9`=" . $lis9D . ", `10`=" . $lis10D . ",
            `11`=" . $lis11D . ", `12`=" . $lis12D . ", `13`=" . $lis13D . ", `14`=" . $lis14D . ", `15`=" . $lis15D . ",
            `16`=" . $lis16D . ", `17`=" . $lis17D . ", `18`=" . $lis18D . ", `19`=" . $lis19D . ", `20`=" . $lis20D . ",
            `21`=" . $lis21D . ", `22`=" . $lis22D . ", `23`=" . $lis23D . ", `24`=" . $lis24D . ", `25`=" . $lis25D . ",
            `26`=" . $lis26D . ", `27`=" . $lis27D . ", `28`=" . $lis28D . ", `29`=" . $lis29D . ", `30`=" . $lis30D . ",
            `31`=" . $lis31D . "
            WHERE `idTallerTiempo`='" . $cajaIdTiempo . "' AND `estudiante`='" . $cajaEstdSinCambiar . "' AND `taller`='" . $cajaTaller . "' AND
            `mes`='" . $cajaMes . "' AND `ano`='" . $cajaAno . "'");

            if ($conexion->query($guardaTodosSQL) === TRUE) {
                $resultadoBool = true;
            } else {
                $resultadoBool = false;
            }
        }
    } else {
        $cajaEstd = $_POST['guardar'];

        $cajaTaller = $_GET['cajaTaller'];

        $cajaMes = $_GET['cajaMes'];

        $cajaAno = $_GET['cajaAno'];

        $guardarTodosTiempoTaller = "SELECT * FROM tallertiempo 
                    WHERE estudiante ='" . $cajaEstd . "' AND taller='" . $cajaTaller . "' AND mes='" . $cajaMes . "' AND ano='" . $cajaAno . "'";

        $resultadosTiempo = mysqli_query($conexion, $guardarTodosTiempoTaller);

        if (mysqli_num_rows($resultadosTiempo) == 1) {
            while ($rowTiempo = mysqli_fetch_array($resultadosTiempo)) {
                // echo $rowTiempo['idTallerTiempo'];
                $cajaIdTiempo = $rowTiempo['idTallerTiempo'];
            }
        }

        $cajaEstd = str_replace(" ", "", $cajaEstd);

        $cajaEstd = strtolower($cajaEstd);

        $cajaEstdSinCambiar = $_POST['guardar'];

        include_once "../ordenar/postDias.php";
        include_once "../ordenar/postDias2.php";
        include_once "../ordenar/postDias3.php";

        $guardaDiasSQL = ("UPDATE tallertiempo SET
        `1`=" . $lis1D . " , `2`=" . $lis2D . ", `3`=" . $lis3D . ", `4`=" . $lis4D . ", `5`=" . $lis5D . ",
        `6`=" . $lis6D . ", `7`=" . $lis7D . ", `8`=" . $lis8D . ", `9`=" . $lis9D . ", `10`=" . $lis10D . ",
        `11`=" . $lis11D . ", `12`=" . $lis12D . ", `13`=" . $lis13D . ", `14`=" . $lis14D . ", `15`=" . $lis15D . ",
        `16`=" . $lis16D . ", `17`=" . $lis17D . ", `18`=" . $lis18D . ", `19`=" . $lis19D . ", `20`=" . $lis20D . ",
        `21`=" . $lis21D . ", `22`=" . $lis22D . ", `23`=" . $lis23D . ", `24`=" . $lis24D . ", `25`=" . $lis25D . ",
        `26`=" . $lis26D . ", `27`=" . $lis27D . ", `28`=" . $lis28D . ", `29`=" . $lis29D . ", `30`=" . $lis30D . ",
        `31`=" . $lis31D . "
        WHERE `idTallerTiempo`='" . $cajaIdTiempo . "' AND `estudiante`='" . $cajaEstdSinCambiar . "' AND `taller`='" . $cajaTaller . "' AND
        `mes`='" . $cajaMes . "' AND `ano`='" . $cajaAno . "'");
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
        if (!empty($guardaDiasSQL)) {
            $resultaUno = $conexion->query($guardaDiasSQL);
        } else {
            $resultaUno = false;
        }

        if ($resultaUno || $resultadoBool) {
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