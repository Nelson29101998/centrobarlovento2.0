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
    $nomPartc = $_POST["nombreParticipante"];
    $remplazoNom = str_replace(" ", "", $nomPartc);

    $edadPartc = $_POST["edadPartc"];
    $nacePartc = date("Y-m-d", strtotime($_POST["nacePartc"]));
    $rutPartc = $_POST["rutPartc"];
    $telPartc = $_POST["telefonoPartc"];
    $correoPartc = $_POST["correoPartc"];
    $dirPartc = $_POST["direccionPartc"];
    $vivePartc = $_POST["vivePartc"];


    //* Tabla de Médicos
    $diagnostico = $_POST["diagn"];
    $medico = $_POST["medico"];
    $medicaHora = $_POST["medicaHora"];
    $otroMedico = $_POST["otroMedico"];

    //* Tabla de Salud    
    $alergia = $_POST["alergia"];
    $hospital = $_POST["hospital"];

    //* Tabla de contactos en caso de emergencia
    $contUnoNom = $_POST["contUnoNom"];
    $contDosNom = $_POST["contDosNom"];
    $contUnoParent = $_POST["contUnoParent"];
    $contDosParent = $_POST["contDosParent"];
    $contUnoPhone = $_POST["contUnoPhone"];
    $contDosPhone = $_POST["contDosPhone"];
    $mailUnoPhone = $_POST["mailUnoPhone"];
    $mailDosPhone = $_POST["mailDosPhone"];

    if ($rutPartc != "") {
        $tiempoRut = $date->format('H:i:s') . $rutPartc;
    } else {
        $tiempoRut = $date->format('H:i:s') . $remplazoNom;
    }

    if ($_POST["elegirMes"] == "vacio") {
        $sacarMes = tiempoDatos();
    } else {
        $sacarMes = $_POST['elegirMes'];
    }

    if ($_POST["elegirAno"] == "vacio") {
        $sacarAno = date("Y");
    } else {
        $sacarAno = $_POST['elegirAno'];
    }

    if ($_POST['sacarTodoTaller'] == "siTodo" || !empty($_POST['sacarTodoTaller'])) {
        $checkTodo = $_POST['sacarTodoTaller'];
    } else {
        $checkTodo = "";
    }

    //* Tabla de los cursos
    //! Curso 1

    if ($_POST['sacarCurso1'] != "vacio") {
        $sacarCurso1 = $_POST['sacarCurso1'];
        //idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano
        $sqlCurso1 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso1 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso1 = "";
    }

    //! Curso 2
    if ($_POST['sacarCurso2'] != "vacio") {
        $sacarCurso2 = $_POST['sacarCurso2'];
        $sqlCurso2 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso2 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso2 = "";
    }

    //! Curso 3
    if ($_POST['sacarCurso3'] != "vacio") {
        $sacarCurso3 = $_POST['sacarCurso3'];
        $sqlCurso3 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso3 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso3 = "";
    }

    //! Curso 4
    if ($_POST['sacarCurso4'] != "vacio") {
        $sacarCurso4 = $_POST['sacarCurso4'];
        $sqlCurso4 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso4 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso4 = "";
    }

    //! Curso 5
    if ($_POST['sacarCurso5'] != "vacio") {
        $sacarCurso5 = $_POST['sacarCurso5'];
        $sqlCurso5 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso5 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso5 = "";
    }

    //! Curso 6
    if ($_POST['sacarCurso6'] != "vacio") {
        $sacarCurso6 = $_POST['sacarCurso6'];
        $sqlCurso6 = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso6 . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";
    } else {
        $sqlCurso6 = "";
    }

    $sql = "INSERT INTO inscripcion(nombrePartc, edad, nacePartc, rutPartc, celularPartc, mailPartc,
    direccionPartc, vivePartc, diagnostico, medicoTratantes, medicaHora, otroMedico,  alergias, preferencia,
    nomCont1, nomCont2, parentCont1, parentCont2, celCont1, celCont2, mailCont1, mailCont2) VALUES
    ('" . $nomPartc . "', '" . $edadPartc . "', '" . $nacePartc . "', '" . $rutPartc . "', '" . $telPartc . "',
    '" . $correoPartc . "', '" . $dirPartc . "', '" . $vivePartc . "',
    '" . $diagnostico . "', '" . $medico . "', '" . $medicaHora . "', '" . $otroMedico . "',
    '" . $alergia . "','" . $hospital . "',
    '" . $contUnoNom . "', '" . $contDosNom . "', '" . $contUnoParent . "', '" . $contDosParent . "',
    '" . $contUnoPhone . "','" . $contDosPhone . " ', '" . $mailUnoPhone . "', '" . $mailDosPhone . "')";

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

        function masParct($checkTodo, $date, $conexion, $sacarCurso, $sacarMes, $sacarAno, $nomPartc)
        {
            if ($checkTodo == "siTodo") {
                $sacarMesHoy = tiempoDatos();
                $sacarAnoHoy = date("Y");

                $guardarTodosTiempoTaller = "SELECT * FROM asistencias 
            WHERE cursos='" . $sacarCurso . "' AND mes='" . $sacarMesHoy . "' AND ano='" . $sacarAnoHoy . "' AND estudiante <> '" . $nomPartc . "'";

                $correcto = true;

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

                    if ($sacarCurso != $revisarTaller || $sacarMes != $revisarMes || $sacarAno != $revisarAno) {
                        echo "ok
                            <br>
                            <br>";

                        $sqlCurso = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
                VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso . "','" . $telPartc . "','" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";

                        $sqlCursoTiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso . "', '" . $sacarMes . "', '" . $sacarAno . "')";

                        if ($conexion->query($sqlCurso) === TRUE) {
                            if ($conexion->query($sqlCursoTiempo) === TRUE) {
                                $correcto = true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        $correcto = false;
                    }
                }

                return $correcto;
            } else {
                return true;
            }
        }

        $funcionaBool1 = false;
        $funcionaBool2 = false;
        $funcionaBool3 = false;
        $funcionaBool4 = false;
        $funcionaBool5 = false;
        $funcionaBool6 = false;

        if ($conexion->query($sql) === TRUE) {
            if (!empty($sqlCurso1)) {
                $sqlCurso1Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso1 . "', '" . $sacarMes . "', '" . $sacarAno . "')";

                $funcionaBool1 = masParct($checkTodo, $date, $conexion, $sacarCurso1, $sacarMes, $sacarAno, $nomPartc);

                if ($conexion->query($sqlCurso1) === TRUE && $funcionaBool1) {
                    if ($conexion->query($sqlCurso1Tiempo) === TRUE && $funcionaBool1) {
                        $anotar = "Curso 1 esta ok";
                        if (!empty($sqlCurso2)) {
                            $funcionaBool2 = masParct($checkTodo, $date, $conexion, $sacarCurso2, $sacarMes, $sacarAno, $nomPartc);

                            if ($conexion->query($sqlCurso2) === TRUE && $funcionaBool2) {
                                $sqlCurso2Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso2 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso2Tiempo) === TRUE && $funcionaBool2) {
                                    $anotar = $anotar . ", Curso 2 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso3)) {
                            $funcionaBool3 = masParct($checkTodo, $date, $conexion, $sacarCurso3, $sacarMes, $sacarAno, $nomPartc);

                            if ($conexion->query($sqlCurso3) === TRUE && $funcionaBool3) {
                                $sqlCurso3Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso3 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso3Tiempo) === TRUE && $funcionaBool3) {
                                    $anotar = $anotar . ", Curso 3 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso4)) {
                            $funcionaBool4 = masParct($checkTodo, $date, $conexion, $sacarCurso4, $sacarMes, $sacarAno, $nomPartc);

                            if ($conexion->query($sqlCurso4) === TRUE && $funcionaBool4) {
                                $sqlCurso4Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso4 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso4Tiempo) === TRUE && $funcionaBool4) {
                                    $anotar = $anotar . ", Curso 4 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso5)) {
                            $funcionaBool5 = masParct($checkTodo, $date, $conexion, $sacarCurso5, $sacarMes, $sacarAno, $nomPartc);

                            if ($conexion->query($sqlCurso5) === TRUE && $funcionaBool5) {
                                $sqlCurso5Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso5 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso5Tiempo) === TRUE && $funcionaBool5) {
                                    $anotar = $anotar . ", Curso 5 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso6)) {
                            $funcionaBool6 = masParct($checkTodo, $date, $conexion, $sacarCurso6, $sacarMes, $sacarAno, $nomPartc);
                            
                            if ($conexion->query($sqlCurso6) === TRUE && $funcionaBool6) {
                                $sqlCurso6Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso6 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso6Tiempo) === TRUE && $funcionaBool6) {
                                    $anotar = $anotar . ", Curso 6 esta ok";
                                }
                            }
                        }
                    }
                }
            }
            echo "<br>
    <center>
    <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
    <h1 class='display-4'>Has guardo su exito. Muchas gracias por preferirnos.</h1>
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