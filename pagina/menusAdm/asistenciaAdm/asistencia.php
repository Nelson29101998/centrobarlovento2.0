<?php
function tiempoDatos()
{
    $month = date("F"); //Reemplazable por número del 1 a 12
    $year = date("Y"); //Reemplazable por un año valido
    $sacarMes = array(
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    );
    return $sacarMes[$month];
}

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

    $tiempoDatos = $date = new DateTime(date("H:i:s"));
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
        <title>Asistencia</title>
        <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
        <?php
        //! Favicon
        $direccion = "../../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>
        <link rel="stylesheet" href="css/diseno.css?v=<? echo $version; ?>">
        <style>
            input[type=radio] {
                width: 100%;
            }

            th {
                font-size: 12px;
            }
        </style>
    </head>

    <body>
        <?php
        //*SideNav y Hora
        include_once "../navMenus/sideNav.php";
        ?>
        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Asistencia</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <form id="formFecha" name="formFecha" onsubmit="return fechaTalleres()" method="get" action="asistencia.php">
                <table style="background-color: #F71806; border-radius: 15px;">
                    <tbody>
                        <tr>
                            <th>
                                <label for="verCurso" class="text-white">
                                    <h5>
                                        <i class="fa-solid fa-chalkboard"></i> Taller:
                                    </h5>
                                </label>
                                <select name="verCurso" id="verCurso" class="form-select">
                                    <?php
                                    include_once "selecciones/cursosSelect.php";
                                    ?>
                                </select>
                            </th>
                            <th>
                                <label for="verMes" class="text-white">
                                    <h5>
                                        <i class="fa-regular fa-calendar"></i> Mes:
                                    </h5>
                                </label>
                                <select name="verMes" id="verMes" class="form-select">
                                    <?php
                                    include_once "selecciones/elegirMes2.php";
                                    ?>
                                </select>
                            </th>
                            <th>
                                <label for="verAno" class="text-white">
                                    <h5>
                                        <i class="fa-solid fa-hourglass-half"></i> Año:
                                    </h5>
                                </label>
                                <select name="verAno" id="verAno" class="form-select">
                                    <?php
                                    include_once "selecciones/elegirAno2.php";
                                    ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                <label class="col-auto">
                                    Es hoy: <i class="fa-solid fa-square fa-2xl" style="color: #33cc33;"></i>
                                </label>
                            </th>
                            <th colspan="2" class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-magnifying-glass"></i> Buscar
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <br>
                <?php

                function masParct($date, $conexion, $sacarCurso, $sacarMes, $revisarMes, $sacarAno)
                {
                    $sacarMesHoy = date("F");
                    $sacarAnoHoy = date("Y");

                    $meses = array(
                        "January" => "Enero",
                        "February" => "Febrero",
                        "March" => "Marzo",
                        "April" => "Abril",
                        "May" => "Mayo",
                        "June" => "Junio",
                        "July" => "Julio",
                        "August" => "Agosto",
                        "September" => "Septiembre",
                        "October" => "Octubre",
                        "November" => "Noviembre",
                        "December" => "Diciembre"
                    );

                    $mesesNum = array(
                        "Enero" => 1,
                        "Febrero" => 2,
                        "Marzo" => 3,
                        "Abril" => 4,
                        "Mayo" => 5,
                        "Junio" => 6,
                        "Julio" => 7,
                        "Agosto" => 8,
                        "Septiembre" => 9,
                        "Octubre" => 10,
                        "Noviembre" => 11,
                        "Diciembre" => 12
                    );

                    // $mes_actual_es = $meses[$sacarMesHoy];
                    $sacarNumMes = $mesesNum[$revisarMes];
                    // echo $sacarNumMes;
                    $mesAnteriorNum = $sacarNumMes - 1;
                    $mesAtras = array_search($mesAnteriorNum, $mesesNum);

                    if ($mesAnteriorNum == 0) {
                        $mesAnteriorNum = 12;
                    }

                    $guardarTodosTiempoTaller = "SELECT * FROM asistencias 
                    WHERE cursos='" . $sacarCurso . "' AND mes='" . $mesAtras . "' AND ano='" . $sacarAnoHoy . "'";

                    $correcto = true;

                    $resultadosTiempoTodos = mysqli_query($conexion, $guardarTodosTiempoTaller);
                    while ($rowTiempo = mysqli_fetch_array($resultadosTiempoTodos)) {
                        // $tiempoRut = $rowTiempo['idTallerTiempo'];
                        $rutPartc = $rowTiempo['rut'];
                        $nomPartc = $rowTiempo['estudiante'];
                        $remplazoNom = str_replace(" ", "", $nomPartc);
                        $telPartc = $rowTiempo['telefono'];
                        $correoPartc = $rowTiempo['mail'];


                        $revisarBienSiYaTiene = "SELECT * FROM asistencias 
                        WHERE estudiante like '%" . $nomPartc . "%' AND cursos='" . $sacarCurso . "' AND mes='" . $revisarMes . "' AND ano='" . $sacarAnoHoy . "'";

                        $resultadosRevisar = mysqli_query($conexion, $revisarBienSiYaTiene);

                        if (mysqli_num_rows($resultadosRevisar) == 1) {
                            while ($row = mysqli_fetch_array($resultadosRevisar)) {
                                $nombrePartc = $row['estudiante'];
                                $nextMes = $row['nextMes'];
                                $cursoPartc = $row['cursos'];
                                $mesPartc = $row['mes'];
                                $anoPartc = $row['ano'];
                            }
                        } else {
                            $nombrePartc = "";
                            $nextMes = "";
                            $cursoPartc = "";
                            $mesPartc = "";
                            $anoPartc = "";
                        }

                        if ($rutPartc != "" || $rutPartc != null) {
                            $tiempoRut = $date->format('H:i:s') . $rutPartc;
                        } else {
                            $tiempoRut = $date->format('H:i:s') . $remplazoNom;
                        }

                        if ($nombrePartc != $nomPartc && $nextMes != "") {
                            $sqlCurso = "INSERT INTO asistencias(idTallerTiempo, rut, estudiante, cursos, telefono, mail, mes, ano) 
                        VALUES ('" . $tiempoRut . "', '" . $rutPartc . "','" . $nomPartc . "','" . $sacarCurso . "','" . $telPartc . "',
                        '" . $correoPartc . "', '" . $sacarMes . "', '" . $sacarAno . "')";

                            $sqlCursoTiempo = "INSERT INTO tallertiempo(idTallerTiempo, estudiante, taller, mes, ano)
                        VALUES ('"  . $tiempoRut . "', '"  . $nomPartc . "', '" . $sacarCurso . "', '" . $sacarMes . "', '" . $sacarAno . "')";

                            if ($conexion->query($sqlCurso) === TRUE) {
                                if ($conexion->query($sqlCursoTiempo) === TRUE) {
                                    $correcto = true;
                                } else {
                                    $correcto = false;
                                }
                            } else {
                                $correcto = false;
                            }
                        }
                    }
                }

                if (!empty($_GET['verMes']) && !empty($_GET['verAno']) && !empty($_GET['verCurso'])) {
                    $sacarCurso = $_GET['verCurso'];
                    $sacarMes = $_GET['verMes'];
                    $_SESSION["revisarMes"] = $sacarMes;
                    $sacarAno = $_GET['verAno'];

                    //$revisarSQL = "SELECT * FROM asistencias WHERE cursos = '" . $_GET['verCurso'] . "'";
                    $revisarSQL = "SELECT * FROM asistencias WHERE cursos = '" . $_GET['verCurso'] . "' AND mes = '" . $_GET['verMes'] . "' AND ano = '" . $_GET['verAno'] . "' ORDER BY estudiante ASC";
                    $resultadosBuscar = mysqli_query($conexion, $revisarSQL);


                    if (isset($_SESSION["revisarMes"])) {
                        masParct($date, $conexion, $sacarCurso, $sacarMes, $_SESSION["revisarMes"], $sacarAno);
                    }
                } else if (!empty($_GET['buscarPartc'])) {
                    $revisarSQL = "SELECT * FROM asistencias WHERE estudiante LIKE '%" . $_GET['buscarPartc'] . "%'
                    ORDER BY FIELD(DATE_FORMAT(`mes`, '%M'),
                    'Enereo',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre')";
                }
                ?>
            </form>

            <form id="formBuscarPartc" name="formBuscarPartc" onsubmit="return buscarPart()" method="get" action="asistencia.php">
                <table style="background-color: #F71806; border-radius: 15px;">
                    <tbody>
                        <tr>
                            <th>
                                <label for="cadaEstudiante" class="text-white">
                                    <i class="fa-solid fa-magnifying-glass-chart"></i> Buscar asistencia por Participante:
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <select name="buscarPartc" id="buscarPartc" class="form-select">
                                    <?php
                                    include_once "selecciones/buscarPartc.php";
                                    ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-magnifying-glass"></i> Buscar Participante
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="animate__animated animate__backInLeft">
                <?php
                if (!empty($_GET['verCurso']) || !empty($_GET['buscarPartc'])) {
                    include_once "ordenar/tablaDia.php";
                } else {
                ?>
                    <br>
                    <div style="text-align:center;">
                        <h4>
                            Se requiere elegir de taller, Mes, Año o Buscar el Participante de asistencia.
                        </h4>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <br>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            tippy('#guardarIdDia', {
                animation: 'scale',
                content: "Guardar Asistencia",
            });

            tippy('#exelExp', {
                animation: 'scale',
                content: "Exporta de Excel",
            });

            tippy('#nadaTop', {
                animation: 'scale',
                content: "Nada",
            });

            tippy('#anadirMes', {
                animation: 'scale',
                content: "Proximo mes",
            });

            tippy('#pdfId', {
                animation: 'scale',
                placement: 'left',
                content: "Certificado de Asistencia (PDF)",
            });

            tippy('#borrarId', {
                animation: 'scale',
                placement: 'left',
                content: "Borrar",
            });

            tippy('#asTop', {
                animation: 'scale',
                content: "Asistencia",
            });

            tippy('#inasTop', {
                animation: 'scale',
                content: "Inasistencia",
            });

            tippy('#nadaTop', {
                animation: 'scale',
                content: "Nada",
            });

            function fechaTalleres() {
                var faltaSelectTaller = document.forms["formFecha"]["verCurso"].value;
                /* var faltaSelectMes = document.forms["formFecha"]["verMes"].value;
                 var faltaSelectAno = document.forms["formFecha"]["verAno"].value; */
                if (faltaSelectTaller == "vacio") {
                    return false;
                }
                /*  if (faltaSelectMes == "vacio") {
                      return false;
                  }
                  if (faltaSelectAno == "vacio") {
                      return false;
                  }*/
                return true;
            }

            function cursosAsistencia() {
                var faltaSelectTaller = document.forms["formCursos"]["verCurso"].value;
                var faltaSelectPart = document.forms["formCursos"]["verParticipante"].value;
                if ((faltaSelectTaller == "vacio") && (faltaSelectPart == "vacio")) {
                    return false;
                }
                return true;
            }

            function buscarPart() {
                var elegirEstd = document.forms["formBuscarPartc"]["buscarPartc"].value;
                if (elegirEstd == "vacio") {
                    return false;
                }
            }

            function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('tablaBarlovento');
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :
                    XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
            }
        </script>
    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>