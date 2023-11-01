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
    $buscarId = $_GET['buscarId'];
    $monto = $_POST['monto'];
    $fechaPago = date("Y-m-d", strtotime($_POST["fechaPago"]));
    $concepto = $_POST['concepto'];
    $viaPago = $_POST['viaPago'];
    $observ = $_POST['observ'];

    $actualizarSqlPago = "UPDATE pagos set 
    monto='".$monto."', fecha='".$fechaPago."', conpt='".$concepto."', viaPago='".$viaPago."', obscr='".$observ."'
    WHERE id='" . $buscarId . "'";
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
        if (($conexion->query($actualizarSqlPago) === TRUE)) {
            echo "<br>
            <center>
                <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
                <h1 class='display-4'>
                    Has actualizar su exito. Muchas gracias por preferirnos.
                </h1>
                <a href='../pago.php'>
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