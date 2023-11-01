<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    if (!empty($_GET["verRut"])) {
        $cargaRut = $_GET["verRut"];
    } else {
        $cargaRut = 0;
    }

    include_once "../../../conectarSQL/conectar_SQL.php";
    $datosSQL = "SELECT * FROM inscripcion WHERE rutPartc='" . $cargaRut . "'";
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
        <title>Datos de Participante</title>

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
                background-color: #F71806;
                border-radius: 13px;
            }

            td,
            th {
                text-align: left;
                padding: 8px;
            }


            .despues tr:nth-child(even) {
                background-color: #dddddd;
            }

            #ajustarTexto {
                width: 35%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }

            .form-group label {
                float: left;
                text-align: left;
            }

            .form-group select {
                display: inline-block;
                width: auto;
                vertical-align: middle;
            }
        </style>
    </head>

    <body>
        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Datos de Participante</h1>
                </div>
            </div>
        </div>
        <br>
        <?php
        $carga = mysqli_query($conexion, $datosSQL);
        if (mysqli_num_rows($carga) == 1) {
            while ($row = mysqli_fetch_array($carga)) {
        ?>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Datos Participante</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<tr class='form-group'>
                                    <th>
                                        <label class='text-white'>
                                            Paritcipante:
                                        </label>
                                        <br>
                                        " . $row['nombrePartc'] . "
                                    </th>
                                    <th>
                                        <label class='text-white'>
                                            Fecha de Nacimiento:
                                        </label>
                                        <br>";
                        $fechaNace = date("d-m-Y", strtotime($row['nacePartc']));
                        if ($row['nacePartc'] != "00-00-0000") {
                            echo $fechaNace;
                        } else {
                            echo "No hay dato de (Fecha de Nacimiento)";
                        }
                        echo "</th>
                                    <th>
                                        <label class='text-white'>
                                            Edad:
                                        </label>
                                        <br>";
                        if ($row['edad'] != "") {
                            echo  $row['edad'];
                        } else {
                            echo "No hay dato de (Edad)";
                        }
                        echo " </th>
                                    <th>
                                        <label class='text-white'>
                                            Rut:
                                        </label>
                                        <br>
                                        " . $row['rutPartc'] . "
                                    </th>";
                        echo "<th>
                                <a href='editar/editarPartc.php?idRut=" . $row['rutPartc'] . "'>
                                    <button type='button' id='editarPartc' class='btn btn-primary'>
                                        <i class='fa-solid fa-file-pen fa-xl'></i>
                                    </button>
                                </a>
                            </th>";
                        echo "</tr>
                                <tr class='form-group'>
                                    <th>
                                        <label class='text-white'>
                                            Contacto:
                                        </label>
                                        <br>
                                        " . $row['celularPartc'] . "
                                    </th>
                                    <th>
                                        <label class='text-white'>
                                            Mail:
                                        </label>
                                        <br>
                                        " . $row['mailPartc'] . " 
                                    </th>
                                    <th colspan='2'>
                                        <label class='text-white'>
                                            Dirección:
                                        </label>
                                        <br>
                                        " . $row['direccionPartc'] . " 
                                    </th>
                                </tr>
                                <tr class='form-group'>
                                    <th>
                                        <label class='text-white'>
                                            Con quién vive:
                                        </label>
                                        <br>";
                        if ($row['vivePartc'] != "") {
                            echo  $row['vivePartc'];
                        } else {
                            echo "No hay dato de (Con quién vive)";
                        }
                        echo "</th>
                                </tr>";
                        ?>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Datos Antecedentes Medicos</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<tr class='form-group'>
                                    <th>
                                        <label class='text-white'>
                                            Diagnóstico:
                                        </label>
                                        <br>";
                        if ($row['diagnostico'] != "") {
                            echo $row['diagnostico'];
                        } else {
                            echo "No hay dato de (Diagnóstico)";
                        }
                        echo "</th>";
                        echo "<th>
                                <label class='text-white'>
                                    Médicos tratantes:
                                </label>
                                <br>";
                        if ($row['medicoTratantes'] != "") {
                            echo $row['medicoTratantes'];
                        } else {
                            echo "No hay dato de (Médicos tratantes)";
                        }
                        echo "</th>";
                        echo "<th>
                                <a href='editar/editarMedico.php?idRut=" . $row['rutPartc'] . "'>
                                    <button type='button' id='editarPartc' class='btn btn-primary'>
                                        <i class='fa-solid fa-file-pen fa-xl'></i>
                                    </button>
                                </a>
                            </th>";
                        echo "</tr>
                        <tr class='form-group'>";
                        echo "<th>
                            <label class='text-white'>
                                Medicamentos y horarios en que los toma:
                            </label>
                            <br>";
                        if ($row['medicaHora'] != "") {
                            echo $row['medicaHora'];
                        } else {
                            echo "No hay dato de (Medicamentos y horarios en que los toma)";
                        }
                        echo "</th>";
                        echo "<th>
                            <label class='text-white'>
                            Otros antecedentes importantes:
                            </label>
                            <br>";
                        if ($row['otroMedico'] != "") {
                            echo $row['otroMedico'];
                        } else {
                            echo "No hay dato de (Otros antecedentes importantes)";
                        }
                        echo "</th>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Datos Informacion de salud</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<tr class='form-group'>
                        <th>
                                <label class='text-white'>
                                    Clínica u hospital de preferencia:
                                </label>
                                <br>";
                        if ($row['preferencia'] != "") {
                            echo $row['preferencia'];
                        } else {
                            echo "No hay dato de (Clínica u hospital de preferencia)";
                        }
                        echo "</th>";
                        echo "<th>
                                <label class='text-white'>
                                    Alergia:
                                </label>
                                <br>";
                        if ($row['alergias'] != "") {
                            echo $row['alergias'];
                        } else {
                            echo "No hay dato de (Alergia)";
                        }
                        echo "</th>";
                        echo "<th>
                        <a href='editar/editarSalud.php?idRut=" . $row['rutPartc'] . "'>
                            <button type='button' id='editarPartc' class='btn btn-primary'>
                                <i class='fa-solid fa-file-pen fa-xl'></i>
                            </button>
                        </a>
                    </th>
                        </tr>";
                        ?>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Datos Otros contactos de emergencia</h5>
                            </th>
                            <th>
                                <h5>
                                    Contacto 1
                                </h5>
                            </th>
                            <th>
                                <h5>
                                    Contacto 2
                                </h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='form-group'>
                            <th>
                                Nombre:
                            </th>
                            <th>
                                <?php
                                if ($row['nomCont1'] != "") {
                                    echo $row['nomCont1'];
                                } else {
                                    echo "No hay dato de (Nombre de Contacto 1)";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['nomCont2'] != "") {
                                    echo $row['nomCont2'];
                                } else {
                                    echo "No hay dato de (Nombre de Contacto 2)";
                                }
                                ?>
                            </th>
                            <?php
                            echo "<th>
                                    <a href='editar/editarConct.php?idRut=" . $row['rutPartc'] . "'>
                                        <button type='button' id='editarPartc' class='btn btn-primary'>
                                            <i class='fa-solid fa-file-pen fa-xl'></i>
                                        </button>
                                    </a>
                                </th>";
                            ?>
                        </tr>
                        <tr class='form-group'>
                            <th>
                                Parentesco:
                            </th>
                            <th>
                                <?php
                                if ($row['parentCont1'] != "") {
                                    echo $row['parentCont1'];
                                } else {
                                    echo "No hay dato de (Parentesco de Contacto 1)";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['parentCont2'] != "") {
                                    echo $row['parentCont2'];
                                } else {
                                    echo "No hay dato de (Parentesco de Contacto 2)";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr class='form-group'>
                            <th>
                                Teléfono:
                            </th>
                            <th>
                                <?php
                                if ($row['celCont1'] != "") {
                                    echo $row['celCont1'];
                                } else {
                                    echo "No hay dato de (Teléfono de Contacto 1)";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['celCont2'] != "") {
                                    echo $row['celCont2'];
                                } else {
                                    echo "No hay dato de (Teléfono de Contacto 2)";
                                }
                                ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
        <?php
            }
        }
        mysqli_free_result($carga);
        ?>
        <br>
        <div class="text-center">
            <a href='javascript:history.back()'>
                <button type='button' class='btn btn-primary'>
                    <i class="fas fa-xmark"></i> Volver
                </button>
            </a>
        </div>

        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            tippy('#editarPartc', {
                animation: 'scale',
                content: "Editar de Participante",
            });
        </script>
    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>