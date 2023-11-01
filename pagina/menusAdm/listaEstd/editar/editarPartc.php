<?php
include_once "../../../../ajuste/config.php";
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../inicio.php");
} else {

    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    if (!empty($_GET["idRut"])) {
        $cargaRut = $_GET["idRut"];
    } else {
        $cargaRut = 0;
    }

    include_once "../../../../conectarSQL/conectar_SQL.php";
    $editarSQL = "SELECT * FROM inscripcion WHERE rutPartc='" . $cargaRut . "'";
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
        <title>Editar de Participante</title>

        <?php
        //! Favicon
        $direccion = "../../../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>

        <style>
            h1,
            h5 {
                font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
            }

            body {
                background-color: #2689F9;
                color: white;
            }

            table {
                margin-left: auto;
                margin-right: auto;
                border-radius: 15px;
                background-color: #F71806;
            }

            td,
            th {
                text-align: left;
                padding: 8px;
            }

            #ajustarTexto {
                width: 37%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }

            .field {
                display: inline-block;
            }
        </style>
    </head>

    <body>
        <br>

        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Editar de Participante</h1>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i>): Obligatorio
                    </label>
                </div>
            </div>
        </div>

        <br>
        <?php
        echo "<form id='formInscr' name='formInscr' onsubmit='return crearInscripcion()' method='post' action='../subirSQL/actrEstdPart.php?buscarRut=" . $cargaRut . "'>";
        ?>
        <table>
            <thead>
                <tr>
                    <th>
                        Datos Participante
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $carga = mysqli_query($conexion, $editarSQL);
                if (mysqli_num_rows($carga) == 1) {
                    while ($row = mysqli_fetch_array($carga)) {
                ?>
                        <tr>
                            <th class="form-group">
                                <label for="nombreParticipante" class="text-white">
                                    Nombre de participante:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='nombreParticipante' id='nombreParticipante'
                                value='" . $row['nombrePartc'] . "' maxlength='50' placeholder='Ingresa su nombre'>";
                                ?>
                            </th>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Fecha de Nacimiento:
                                </label>
                                <?php
                                $fechaNace = date("Y-m-d", strtotime($row['nacePartc']));
                                echo "<input type='date' class='form-control' name='nacePartc' id='nacePartc'
                                value='" . $fechaNace . "'>";
                                ?>
                            </th>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Edad:
                                </label>
                                <?php
                                echo "<input type='number' class='form-control' name='edadPartc' id='edadPartc'
                                value='" . $row['edad'] . "'>";
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Contacto:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='telefonoPartc' id='telefonoPartc'
                                value='" . $row['celularPartc'] . "'>";
                                ?>
                            </th>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Mail:
                                </label>
                                <?php
                                echo "<input type='email' class='form-control' name='correoPartc' id='correoPartc'
                                value='" . $row['mailPartc'] . "'>";
                                ?>
                            </th>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Dirección:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='direccionPartc' id='direccionPartc'
                                value='" . $row['direccionPartc'] . "'>";
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th class="form-group">
                                <label for="nacePartc" class="text-white">
                                    Con quién vive:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='vivePartc' id='vivePartc'
                                value='" . $row['vivePartc'] . "'>";
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" class="form-group text-center">
                                <a href='javascript:history.back()'>
                                    <button type='button' class='btn btn-primary'>
                                        <i class="fas fa-xmark"></i> Volver
                                    </button>
                                </a>
                                <button type='submit' class='btn btn-success'>
                                    <i class="fa-solid fa-rotate"></i> Guardar y cambiar
                                </button>
                            </th>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        </form>

        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
    </body>

    </html>

<?php
}
?>