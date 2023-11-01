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
                if (!empty($_GET['verMes']) && !empty($_GET['verAno']) && !empty($_GET['verCurso'])) {
                    $revisarSQL = "SELECT * FROM asistencias WHERE cursos = '" . $_GET['verCurso'] . "' AND mes = '" . $_GET['verMes'] . "' AND ano = '" . $_GET['verAno'] . "'";
                } else if (!empty($_GET['buscarPartc'])) {
                    $revisarSQL = "SELECT * FROM asistencias WHERE estudiante= '" . $_GET['buscarPartc'] . "'
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
                ?>
                    <br>
                    <div style="text-align:center;">
                        <button type="button" class="btn btn-success" id="exelExp" onclick="ExportToExcel('xlsx')">
                            <i class="fa-solid fa-file-csv fa-2xl"></i></i>
                        </button>
                    </div>
                <?php
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
                var faltaSelectMes = document.forms["formFecha"]["verMes"].value;
                var faltaSelectAno = document.forms["formFecha"]["verAno"].value;
                if (faltaSelectTaller == "vacio") {
                    return false;
                }
                if (faltaSelectMes == "vacio") {
                    return false;
                }
                if (faltaSelectAno == "vacio") {
                    return false;
                }
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