<?php
include_once "../../../ajuste/config.php";
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../conectarSQL/conectar_SQL.php";

    $sacarId = $_GET['verId'];
    $verDatosProSQL = "SELECT * FROM profesor WHERE id='" . $sacarId . "'";
    $tablaDatosPro = mysqli_query($conexion, $verDatosProSQL);

    $sacarRut = $_GET['verRut'];
    $verBancoProSQL = "SELECT * FROM bancoprofesor WHERE idRut='" . $sacarRut . "'";
    $tablaBancoPro = mysqli_query($conexion, $verBancoProSQL);
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>Ver datos</title>

        <?php
        //! Favicon
        $direccion = "../../../";
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

            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */

            #ajustarTexto {
                width: 35%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Dato de Profesor: </h1>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <table>
                <thead>
                    <tr>
                        <th>
                            <h5>Datos Personal</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($tablaDatosPro) > 0) {
                        while ($row = mysqli_fetch_array($tablaDatosPro)) {
                            $bucarIdDato = $row['id'];
                            $verNombre = $row["nombre"];
                            $verRut = $row["rut"];
                            $verFecha = $row['nacimiento'];
                            $vertel = $row["telefono"];
                            $verMail = $row["mail"];
                            $verDir = $row["direccion"];
                            $verArea = $row["areaDocente"];
                            $verOtro = $row["otroDato"];
                    ?>
                            <tr>
                                <th>
                                    <label>
                                        Nombre:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['nombre'];
                                        ?>
                                    </p>
                                </th>
                                <th>
                                    <label>
                                        Fecha de nacimiento:
                                    </label>
                                    <p>
                                        <?php
                                        $arreglaFecha = $row['nacimiento'];
                                        echo date("d/m/Y", strtotime($arreglaFecha));
                                        ?>
                                    </p>
                                </th>
                                <th>
                                    <label>
                                        Rut:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['rut'];
                                        ?>
                                    </p>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        Teléfono:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['telefono'];
                                        ?>
                                    </p>
                                </th>
                                <th>
                                    <label>
                                        Mail:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['mail'];
                                        ?>
                                    </p>
                                </th>
                                <th>
                                    <label>
                                        Direccion:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['direccion'];
                                        ?>
                                    </p>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        Área docente:
                                    </label>
                                    <p>
                                        <?php
                                        echo $row['areaDocente'];
                                        ?>
                                    </p>
                                </th>
                                <th>
                                    <label>
                                        Otro Datos:
                                    </label>
                                    <p>
                                        <?php
                                        if (empty($row['otroDato'])) {
                                            echo "Vacio";
                                        } else {
                                            echo $row['otroDato'];
                                        }
                                        ?>
                                    </p>
                                </th>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>
                            <h5>Datos Banco</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($tablaBancoPro) > 0) {
                        while ($row = mysqli_fetch_array($tablaBancoPro)) {
                            if (!empty($row['banco'])) {
                                $bucarIdBanco = $row['id'];
                                $verNomBanco = $row['banco'];
                                $verTipoBanco = $row['tipo'];
                                $verCodeBanco = $row['codigoTipo'];
                                $verNomRealBanco = $row['nombre'];
                                $verRutBanco = $row['rut'];
                                $verMailBanco = $row['mail'];
                                $verObsBanco = $row['observaciones'];
                    ?>
                                <tr>
                                    <th>
                                        <label>
                                            Banco:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['banco'];
                                            ?>
                                        </p>
                                    </th>
                                    <th>
                                        <label>
                                            Tipo de cuenta:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['tipo'];
                                            ?>
                                            /
                                            <?php
                                            echo $row['codigoTipo'];
                                            ?>
                                        </p>
                                    </th>
                                    <th>
                                        <label>
                                            Nombre:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['nombre'];
                                            ?>
                                        </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>
                                            rut:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['rut'];
                                            ?>
                                        </p>
                                    </th>
                                    <th>
                                        <label>
                                            Mail:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['mail'];
                                            ?>
                                        </p>
                                    </th>
                                    <th>
                                        <label>
                                            Observacion:
                                        </label>
                                        <p>
                                            <?php
                                            echo $row['observaciones'];
                                            ?>
                                        </p>
                                    </th>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <th>
                                        <label>
                                            No hay dato de banco.
                                        </label>
                                    </th>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>

            <br>

            <table>
                <tbody>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" id="editarSql" class="form-check-input"></input>
                                <label for="editarSql" class="form-check-label text-white">
                                    Editar de Datos Personal
                                </label>
                            </div>
                        </th>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" id="editarBancoSql" class="form-check-input"></input>
                                <label for="editarBancoSql" class="form-check-label text-white">
                                    Editar de Datos Banco
                                </label>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>

            <br>

            <table>
                <tbody>
                    <tr>
                        <th>
                            <div id="tablaDatos" style="display: none;">
                                <?php
                                include_once "ordenar/editarDatos.php";
                                ?>
                            </div>
                        </th>
                        <th>
                            <div id="tablaBanco" style="display: none;">
                                <?php
                                include_once "ordenar/editarBanco.php";
                                ?>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>

            <br>

            <div class="text-center">
                <a href='javascript:history.back()'>
                    <button type='button' class='btn btn-primary'>
                        <i class='fa-solid fa-reply'></i> Volver
                    </button>
                </a>
            </div>


        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            $(document).ready(function() {
                $("#editarSql").change(function() {
                    // show hide paragraph on button click
                    $("#tablaDatos").slideToggle();
                });

                $("#editarBancoSql").change(function() {
                    // show hide paragraph on button click
                    $("#tablaBanco").slideToggle();
                });
            });

            function editarProfesor() {
                //* Datos personales
                var nomPro = document.forms["formPro"]["nomPro"].value;

                var nacePro = document.forms["formPro"]["fechaPro"].value;

                var rutPro = document.forms["formPro"]["rutPro"].value;
                var telPro = document.forms["formPro"]["telefonoPro"].value;
                var correoPro = document.forms["formPro"]["mailPro"].value;
                var dirPro = document.forms["formPro"]["direccionPro"].value;
                var areaPro = document.forms["formPro"]["areaPro"].value;

                if (nomPro == "" || nomPro == null) {
                    $(document).ready(function() {
                        $(".errorNomPro").toast("show");
                    });
                    return false;
                }

                if (nacePro == "" || nacePro == null) {
                    $(document).ready(function() {
                        $(".errorNacePro").toast("show");
                    });
                    return false;
                }

                if (rutPro == "" || rutPro == null) {
                    $(document).ready(function() {
                        $(".errorRutPro").toast("show");
                    });
                    return false;
                }

                if (telPro == "" || telPro == null) {
                    $(document).ready(function() {
                        $(".errorTelPro").toast("show");
                    });
                    return false;
                }

                if (correoPro == "" || correoPro == null) {
                    $(document).ready(function() {
                        $(".errorCorreoPro").toast("show");
                    });
                    return false;
                }

                if (dirPro == "" || dirPro == null) {
                    $(document).ready(function() {
                        $(".errorDirPro").toast("show");
                    });
                    return false;
                }

                if (areaPro == "" || areaPro == null) {
                    $(document).ready(function() {
                        $(".errorAreaPro").toast("show");
                    });
                    return false;
                }


                //* Cuenta
                var userPro = document.forms["formPro"]["userPro"].value;
                var passPro = document.forms["formPro"]["contrPro"].value;

                if (userPro == "" || userPro == null) {
                    $(document).ready(function() {
                        $(".errorUserPro").toast("show");
                    });
                    return false;
                }

                if (passPro == "" || passPro == null) {
                    $(document).ready(function() {
                        $(".errorPassPro").toast("show");
                    });
                    return false;
                }

                return true;
            }
        </script>
    </body>

    </html>

<?php
    mysqli_close($conexion);
}
?>