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

    $tiempoDatos = $date = new DateTime(date("H:i:s"));

    //* Tabla de Participante
    $nomPartc = $_POST["nombreParticipante"];
    $edadPartc = $_POST["edadPartc"];
    $nacePartc = date("Y-m-d", strtotime($_POST["nacePartc"]));
    $rutPartc = $_POST["rutPartc"];
    $telPartc = $_POST["telefonoPartc"];
    $correoPartc = $_POST["correoPartc"];
    $dirPartc = $_POST["direccionPartc"];
    $vivePartc = $_POST["vivePartc"];

    $tiempoRut = $date->format('H:i:s') . $rutPartc;

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

    $tiempoRut = $date->format('H:i:s') . $rutPartc;
    $sacarMes = $_POST['elegirMes'];
    $sacarAno = $_POST['elegirAno'];

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

    $sql = "INSERT INTO inscripcion(nombrePartc, edad, nacePartc, rutPartc, celularPartc, mailPartc,
    direccionPartc, vivePartc, diagnostico, medicoTratantes, medicaHora, otroMedico,  alergias, preferencia,
    nomCont1, nomCont2, parentCont1, parentCont2, celCont1, celCont2) VALUES
    ('" . $nomPartc . "', '" . $edadPartc . "', '" . $nacePartc . "', '" . $rutPartc . "', '" . $telPartc . "',
    '" . $correoPartc . "', '" . $dirPartc . "', '" . $vivePartc . "',
    '" . $diagnostico . "', '" . $medico . "', '" . $medicaHora . "', '" . $otroMedico . "',
    '" . $alergia . "','" . $hospital . "',
    '" . $contUnoNom . "', '" . $contDosNom . "', '" . $contUnoParent . "', '" . $contDosParent . "',
    '" . $contUnoPhone . "','" . $contDosPhone . "')";

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
        if ($conexion->query($sql) === TRUE) {
            if (!empty($sqlCurso1)) {
                $sqlCurso1Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso1 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                if ($conexion->query($sqlCurso1) === TRUE) {
                    if ($conexion->query($sqlCurso1Tiempo) === TRUE) {
                        $anotar = "Curso 1 esta ok";
                        if (!empty($sqlCurso2)) {
                            if ($conexion->query($sqlCurso2) === TRUE) {
                                $sqlCurso2Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso2 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso2Tiempo) === TRUE) {
                                    $anotar = $anotar . ", Curso 2 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso3)) {
                            if ($conexion->query($sqlCurso3) === TRUE) {
                                $sqlCurso3Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso3 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso3Tiempo) === TRUE) {
                                    $anotar = $anotar . ", Curso 3 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso4)) {
                            if ($conexion->query($sqlCurso4) === TRUE) {
                                $sqlCurso4Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso4 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso4Tiempo) === TRUE) {
                                    $anotar = $anotar . ", Curso 4 esta ok";
                                }
                            }
                        }
                        if (!empty($sqlCurso5)) {
                            if ($conexion->query($sqlCurso5) === TRUE) {
                                $sqlCurso5Tiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso5 . "', '" . $sacarMes . "', '" . $sacarAno . "')";
                                if ($conexion->query($sqlCurso5Tiempo) === TRUE) {
                                    $anotar = $anotar . ", Curso 5 esta ok";
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