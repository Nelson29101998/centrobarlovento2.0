<?php
session_start();
unset($_SESSION["usuario"], $_SESSION["rut"]);
setcookie('PHPSESSID', '', time() - 3600, '/');

setcookie("nameCookieAdm", "", time() - 3600, "/");
setcookie("userCookieAdm", "", time() - 3600, "/");
setcookie("rutCookieAdm", "", time() - 3600, "/");

setcookie("nameCookieProf", "", time() - 3600, "/");
setcookie("userCookieProf", "", time() - 3600, "/");
setcookie("rutCookieProf", "", time() - 3600, "/");

setcookie("nameCookieEstd", "", time() - 3600, "/");
setcookie("userCookieEstd", "", time() - 3600, "/");
setcookie("rutCookieEstd", "", time() - 3600, "/");

session_destroy();
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
    <title>Esperando...</title>

    <?php
    //! Favicon
    $direccion = "../../";
    include_once $direccion . "ajuste/favicon.php";
    ?>

    <style>
        h5 {
            font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
        }

        body {
            background-color: #2689F9;

        }
    </style>
</head>

<body>
    <div class="modal fade" id="ventanaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloVentana"><i class="fas fa-sync fa-spin"></i> Cerrado Sesion</h5>
                </div>
                <div class="modal-body">
                    <p>Espere un segundo.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        var myModal = new bootstrap.Modal(document.getElementById("ventanaModal"));
        document.onreadystatechange = function() {
            myModal.show();

            setTimeout(() => {
                window.location.href = '../../index.php';
            }, 3500);
        }
    </script>
</body>

</html>