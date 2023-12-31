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

    //* Datos personales
    $nomPro = $_POST['nomPro'];
    $nacePro = date("Y-m-d", strtotime($_POST["fechaPro"]));
    $rutPro = $_POST['rutPro'];
    $telPro = $_POST['telefonoPro'];
    $correoPro = $_POST['mailPro'];
    $dirPro = $_POST['direccionPro'];
    $areaPro = $_POST['areaPro'];
    $otroPro = $_POST['otroPro'];

    $sqlCuentaPro = "INSERT INTO profesor (nombre, nacimiento, rut, telefono, mail, direccion, areaDocente, otroDato)
    VALUES ('" . $nomPro . "','" . $nacePro . "','" . $rutPro . "','" . $telPro . "','" . $correoPro . "','" . $dirPro . "','" . $areaPro . "','" . $otroPro . "')";
    
    /*
        //* Datos Bancarias
        $idRut = $_POST['rutPro']."Bank";
        $nomBancoPro = $_POST['bancoPro'];
        $tipoBancoPro = $_POST['tipoBanc'];
        $codigotipoBancoPro = $_POST['tipoDatoPro'];
        $nomRealBancoPro = $_POST['nombreBanco'];
        $rutBancoPro = $_POST['rutBanco'];
        $mailBancoPro = $_POST['mailBanco'];
        $obsBancoPro = $_POST['ObserBanco'];
        //idRut, banco, tipo, nombre, rut, mail, observaciones

        $sqlBancoPro = "INSERT INTO bancoprofesor (idRut, banco, tipo, codigoTipo, nombre, rut, mail, observaciones)
        VALUES ('" . $idRut . "','" . $nomBancoPro . "','" . $tipoBancoPro . "','".$codigotipoBancoPro."','" . $nomRealBancoPro . "','" . $rutBancoPro . "','" . $mailBancoPro . "','" . $obsBancoPro . "')";
        */
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

        <title>Subiendo de Curso</title>
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
        if (($conexion->query($sqlCuentaPro) === TRUE)) {
            if (($conexion->query($sqlBancoPro) === TRUE)) {
            } else {
                echo "Error: " . $sql . $conexion->error;
            }
            echo "<br>
            <center>
                <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
                <h1 class='display-4'>
                    Has guardo su exito. Muchas gracias por preferirnos.
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