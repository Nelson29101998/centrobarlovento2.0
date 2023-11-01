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
        <title>Datos de Cursos</title>
        <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
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
        <?php
        //*SideNav y Hora
        include_once "../navMenus/sideNav.php";
        ?>
        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Datos de los Cursos</h1>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i>): Obligatorio
                    </label>
                </div>
            </div>
        </div>

        <br>

        <div class="text-center">
            <div class="animate__animated animate__backInLeft">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Ver Datos</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $revisarCurso = "SELECT * FROM cursos WHERE id='" . $_GET['verId'] . "'";
                        $resultados = mysqli_query($conexion, $revisarCurso);
                        if (mysqli_num_rows($resultados) > 0) {
                            while ($row = mysqli_fetch_array($resultados)) {
                                $buscarId= $row['id'];
                                $verNombre = $row['nombreCurso'];
                                $verCode = $row['codigo'];
                                $verFecha = date("Y-m-d", strtotime($row['fecha']));
                                $verHoraDesde = date("H:i", strtotime($row['horarioDesde']));
                                $verHoraHasta = date("H:i", strtotime($row['horarioHasta']));
                                $verPro = $row['profesor'];
                                echo "<tr>
                                    <th>
                                        <laber>
                                            Nombre de Curso:
                                        </laber>
                                        <p>
                                            " . $row['nombreCurso'] . "
                                        </p>
                                    </th>
                                    <th>
                                        <laber>
                                            Código:
                                        </laber>
                                        <p>
                                            " . $row['codigo'] . "
                                        </p>
                                    </th>
                                    <th>
                                        <laber>
                                            Fecha:
                                        </laber>
                                        <p>
                                            " . date("d-m-Y", strtotime($row['fecha'])) . "
                                        </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan=2>
                                        <laber>
                                            Horario:
                                        </laber>
                                        <p>
                                            Desde: " . date("H:i", strtotime($row['horarioDesde'])) . ",
                                            Hasta: " . date("H:i", strtotime($row['horarioHasta'])) . "
                                        </p>
                                    </th>
                                    <th>
                                        <laber>
                                            Profesor:
                                        </laber>
                                        <p>
                                            " . $row['profesor'] . "
                                        </p>
                                    </th>
                                </tr>
                                ";
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
                                        Editar de Datos de curso
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
                                    include_once "ordenar/editarCurso.php";
                                    ?>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>

                <br>

                <a href="fichaCursos.php">
                    <button type="button" class="btn btn-primary">
                        Volver
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
            });
        </script>
    </body>

    </html>

<?php
    mysqli_close($conexion);
}
?>