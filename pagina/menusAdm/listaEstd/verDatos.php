<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    
        $cargaAsist = $_GET["verEstudiante"];
        // echo "hola", $cargaAsist;
   

    include_once "../../../conectarSQL/conectar_SQL.php";
    $datosSQL = "SELECT * FROM inscripcion WHERE nombrePartc like '%" . $cargaAsist . "%'";
    $datosSQL2 = "SELECT * FROM inscripcion WHERE nombrePartc like'%" . $cargaAsist . "%'";

    $revisarSQL = "SELECT * FROM asistencias WHERE estudiante like '%" . $cargaAsist . "%'";
    $resultados = mysqli_query($conexion, $revisarSQL);
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

    <body class="container">

        <br>

        <div>
            <a href='listaEstudiante.php'>
                <button type='button' class='btn btn-primary'>
                    <i class="fas fa-xmark"></i> Volver
                </button>
            </a>
        </div>

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
                        $sacarNom = $row['nombrePartc'];
                        echo "<tr class='form-group'>
                                    <th>
                                        <label class='text-white'>
                                            Paritcipante:
                                        </label>
                                        <br>
                                        " . $sacarNom . "
                                    </th>
                                    <th>
                                        <label class='text-white'>
                                            Fecha de Nacimiento:
                                        </label>
                                        <br>";
                        $fechaNace = date("d-m-Y", strtotime($row['nacePartc']));
                        if ($fechaNace != "01-01-1970") {
                            echo $fechaNace;
                        } else {
                            echo "";
                        }
                        echo "</th>
                                    <th>
                                        <label class='text-white'>
                                            Edad:
                                        </label>
                                        <br>";
                        if ($row['edad'] != "" && $row['edad'] != 0) {
                            echo  $row['edad'];
                        } else {
                            echo "";
                        }
                        echo " </th>
                                    <th>
                                        <label class='text-white'>
                                            Rut:
                                        </label>
                                        <br>";
                        if ($row['rutPartc'] != "") {
                            echo $row['rutPartc'];
                        } else {
                            echo "";
                        }
                        echo "</th>";
                        echo "<th>
                                <a href='editar/editarPartc.php?idAsist=" . $row['nombrePartc'] . "'>
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
                                        <br>";
                        if ($row['celularPartc'] != "") {
                            echo $row['celularPartc'];
                        } else {
                            echo "";
                        }
                        echo "</th>
                                    <th>
                                        <label class='text-white'>
                                            Mail:
                                        </label>
                                        <br>";
                        if ($row['mailPartc'] != "") {
                            echo $row['mailPartc'];
                        } else {
                            echo "";
                        }
                        echo "</th>
                                    <th colspan='2'>
                                        <label class='text-white'>
                                            Dirección:
                                        </label>
                                        <br>";
                        if ($row['direccionPartc'] != "") {
                            echo $row['direccionPartc'];
                        } else {
                            echo "";
                        }
                        echo "</th>
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
                            echo "";
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
                            <th colspan="4">
                                <h5>Datos los Talleres</h5>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <h5>
                                    Cursos:
                                </h5>
                            </th>
                            <th>
                                <h5>
                                    Mes:
                                </h5>
                            </th>
                            <th>
                                <h5>
                                    Año:
                                </h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($resultados)) {
                            $sacarTaller = $row['cursos'];
                            $sacarTiempo = $row['idTallerTiempo'];
                            $sacarId = $row['id'];
                            $mes = $row['mes'];
                            $ano = $row['ano'];
                            echo "<tr class='form-group'>
                            <th>
                                " . $sacarTaller . "
                            </th>
                            <th>
                                " . $mes . "
                            </th>
                            <th>
                                " . $ano . "
                            </th>";
                            echo "<th>
                                    <a href='subirSQL/borrarEstdTaller.php?borrarTaller=" . $sacarTaller . "&borrarNom=" . $sacarNom . "&borrarId=" . $sacarId . "&borrarTiempoId=" . $sacarTiempo . "&borrarMes=" . $mes . "&borrarAno=" . $ano . "'>
                                        <button type='button' class='btn btn-danger'>
                                            <i class='fas fa-trash-can'></i>
                                        </button>
                                    </a>
                            </th>
                        </tr>";
                        }
                        mysqli_free_result($resultados);
                        ?>
                    </tbody>
                </table>
        <?php
            }
        }
        ?>

        <br>

        <form id="formInscrNewTaller" name="formInscrNewTaller" onsubmit="return crearInscripcion()" method="post" action="subirSQL/subirNewTaller.php?newTallerNom=<?php echo $sacarNom; ?>">
            <table>
                <thead>
                    <tr>
                        <th>
                            <h5>Crear nuevo Taller</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso1" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 1:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso1" id="sacarCurso1" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso2" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 2:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso2" id="sacarCurso2" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect2.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso3" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 3:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso3" id="sacarCurso3" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect3.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso4" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 4:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso4" id="sacarCurso4" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect4.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso5" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 5:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso5" id="sacarCurso5" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect5.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th class="form-group" colspan="2">
                            <label for="sacarCurso6" class="text-white">
                                <i class="fa-solid fa-chalkboard-user"></i> Curso 6:
                            </label>
                            <label class="col-auto">
                                <select name="sacarCurso6" id="sacarCurso6" class="form-select">
                                    <?php
                                    include_once "selecciones/sacarCursosSelect6.php";
                                    ?>
                                </select>
                            </label>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" name="sacarTodoTaller" id="sacarTodoTaller" type="checkbox" value="siTodo">
                                <label class="form-check-label" for="sacarTodoTaller">
                                <i class="fas fa-user-group"></i> ¿Quiere ser mismo en el taller para todos los participantes?
                                </label>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="elegirMes" class="text-white">
                                <i class="fa-regular fa-calendar"></i> Elige un mes:
                            </label>
                            <select name="elegirMes" id="elegirMes" class="form-select">
                                <?php
                                include_once "selecciones/elegirMes.php";
                                ?>
                            </select>
                        </th>
                        <th>
                            <label for="elegirAno" class="text-white">
                                <i class="fa-regular fa-calendar"></i> Elige un Año:
                            </label>
                            <select name="elegirAno" id="elegirAno" class="form-select">
                                <?php
                                include_once "selecciones/elegirAno.php";
                                ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk"></i> Guardar y Nuevo Taller
                                </button>

                                <!-- <button type="submit" formaction="subirSQL/subirTallerTodos.php?newTallerNom=<?php //echo $sacarNom; 
                                                                                                                    ?>" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk"></i> Guardar todos los participante
                                </button> -->

                                <button type="reset" class="btn btn-success">
                                    <i class="fas fa-recycle"></i> Limpiar
                                </button>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </form>

        <?php
        mysqli_free_result($carga);
        $carga = mysqli_query($conexion, $datosSQL2);
        if (mysqli_num_rows($carga) == 1) {
            while ($row = mysqli_fetch_array($carga)) {
        ?>
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
                            echo "";
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
                            echo "";
                        }
                        echo "</th>";
                        echo "<th>
                                <a href='editar/editarMedico.php?idAsist=" . $row['nombrePartc'] . "'>
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
                            echo "";
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
                            echo "";
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
                            echo "";
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
                            echo "";
                        }
                        echo "</th>";
                        echo "<th>
                        <a href='editar/editarSalud.php?idAsist=" . $row['nombrePartc'] . "'>
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
                                    echo "";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['nomCont2'] != "") {
                                    echo $row['nomCont2'];
                                } else {
                                    echo "";
                                }
                                ?>
                            </th>
                            <?php
                            echo "<th>
                                    <a href='editar/editarConct.php?idAsist=" . $row['nombrePartc'] . "'>
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
                                    echo "";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['parentCont2'] != "") {
                                    echo $row['parentCont2'];
                                } else {
                                    echo "";
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
                                    echo "";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['celCont2'] != "") {
                                    echo $row['celCont2'];
                                } else {
                                    echo "";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr class='form-group'>
                            <th>
                                Mail:
                            </th>
                            <th>
                                <?php
                                if ($row['mailCont1'] != "") {
                                    echo $row['mailCont1'];
                                } else {
                                    echo "";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['mailCont2'] != "") {
                                    echo $row['mailCont2'];
                                } else {
                                    echo "";
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
            <a href='listaEstudiante.php'>
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