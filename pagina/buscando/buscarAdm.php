<?php
session_start();
include '../../conectarSQL/conectar_SQL.php';

$nameAdm = $_POST['admn'];
$contrasena = $_POST['contrs'];

//*Es para revisar a la cuenta de la tabla de la base de datos.
$buscarBD = "SELECT * FROM administrar WHERE usuario = '$nameAdm' AND clave = '$contrasena'";
$revisarBd = mysqli_query($conexion, $buscarBD);
$encontrar = mysqli_fetch_array($revisarBd, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../disenoMejor/bootstrap/css/bootstrap.min.css">
    <script src="../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../disenoMejor/fontawesome/css/all.min.css">
    <script script="../../disenoMejor/fontawesome/js/all.min.js"></script>

    <link rel="stylesheet" href="../../disenoMejor/MDBootstrap/css/mdb.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Buscando</title>
    <link rel="icon" type="image/png" href="../../image/icon_Barlovento.png" />
    <style>
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

        body {
            background-color: #2689F9;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <?php
        if (isset($encontrar['usuario'])) {
            if (isset($encontrar['clave'])) {
                //*Nombre
                $_SESSION['nombre'] = $encontrar['nombre'];

                //* usuario
                $_SESSION['usuario'] = $encontrar['usuario'];

                //*Rut
                $_SESSION['rut'] = $encontrar['rut'];

                if ((!empty($_COOKIE['verVentana'])) && ($_COOKIE['verVentana'] == "Aceptar")) {
                    setcookie("nameCookieAdm", $encontrar['nombre'], strtotime('+30 days'), "/", false, false);
                    setcookie("userCookieAdm", $encontrar['usuario'], strtotime('+30 days'), "/", false, false);
                    setcookie("rutCookieAdm", $encontrar['rut'], strtotime('+30 days'), "/", false, false);
                }

                header("Location: ../menusAdm/menu.php");
            } else {
                echo "<center>
            <img src='../../image/Misterio.jpg' class='img-fluid'>
            <h1 class='display-4 text-white'>La contraseña estan incorrecto.</h1>
            <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Volver</button></a>
            </center>";
            }
        } else {
            echo "<center>
        <img src='../../image/Misterio.jpg'>
        <h1 class='display-4 text-white'>El usuario estan incorrecto o no esta registrado.</h1>
        <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Volver</button></a>
        </center>";
        }
        ?>
    </div>
</body>

</html>