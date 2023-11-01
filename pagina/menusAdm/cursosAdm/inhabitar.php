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
        <title>Inabitar Cursos</title>
        <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
        <?php
        //! Favicon
        $direccion = "../../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>

        <style>
            h1,
            h4,
            h5 {
                font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
            }

            h4 {
                color: black;
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
                    <h1>Inabitar Cursos</h1>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i>): Obligatorio
                    </label>
                </div>
            </div>
        </div>



        <br>
        <form id="formCurso" name="formCurso" onsubmit="return crearCurso()" method="post" action="subirSQL/eliminarCurso.php">

            <div class="text-center">
                <div class="animate__animated animate__backInLeft">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    N*
                                </th>
                                <th>
                                    Ver Datos de curso
                                </th>
                                <th>
                                    Lista de cursos ya realizados
                                </th>
                                <th>
                                    Volver habilitar Curso
                                </th>
                                <th>
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $revisarCurso = "SELECT * FROM cursos WHERE habilitar=false";
                            $resultados = mysqli_query($conexion, $revisarCurso);
                            $sumTotal = 0;
                            $totalesClases = 0;
                            if (mysqli_num_rows($resultados) > 0) {
                                while ($row = mysqli_fetch_array($resultados)) {
                                    $sumTotal = $sumTotal + 1;

                                    echo "<tr>
                                    <th>
                                    " . $sumTotal . "
                                    </th>
                                    <th>
                                    <div class='text-center'>
                                        <a href='datosCurso.php?verId=" . $row['id'] . "'>
                                            <button type='button' class='btn btn-primary'>
                                                <i class='fa-solid fa-file-lines'></i>
                                            </button>
                                        </a>
                                    </div>
                                    </th>
                                    <th>
                                    " . $row['nombreCurso'] . "
                                    </th>
                                    <th>
                                    <div class='text-center'>
                                        <a href='subirSQL/cambiarHabitar.php?cambiarHabt=" . $row['id'] . "&habitar=" . $row['habilitar'] . "'>
                                            <button type='button' class='btn btn-danger'>
                                                <i class='fa-solid fa-eye'></i>
                                            </button>
                                        </a>
                                    </div>
                                    </th>
                                    <th>
                                    <div class='text-center'>
                                        <div class='form-check'>
                                            <input class='form-check-input' name='eliminar[]' id='eliminar" . $row['id'] . "' type='checkbox' value='" . $row['id'] . "'>
                                                <label class='form-check-label' for='flexCheckDefault'>
                                                    Eliminar
                                                </label>
                                        </div>
                                    </div>
                                    </th>
                                </tr>";
                                }
                            } else {
                                echo "<tr>
                                    <th class='text-center' colspan='5'>
                                        No hay inhabitar
                                    </th>                                    
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <br>
                    <button type="button" id="botonEliminar" class="btn btn-danger" onclick="ventanaEliminar()" disabled>
                        <i class='fa-solid fa-trash'></i>
                    </button>

                    <br>

                    <br>

                    <a href="fichaCursos.php">
                        <button type="button" class="btn btn-primary">
                            Volver
                        </button>
                    </a>
                </div>
            </div>

            <!-- Modal avisar para eliminar -->
            <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-tittle" id="modal-tittle">
                                ¿Desea eliminar este curso?
                            </h4>

                        </div>
                        <div class="modal-body" style="color: black;">
                            Podria perder todas las cosas de curso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="noGracias()">
                                Cancelar
                            </button>
                            <a href='subirSQL/borrarCurso.php'>
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            var myModal = new bootstrap.Modal(document.getElementById("reg-modal"));

            function ventanaEliminar() {
                myModal.show();
            }

            function noGracias() {
                myModal.hide();
            }

            $('input:checkbox').on("click", function() {
                var checkEliminar = $('input:checkbox:checked').length;
                console.log("Check: ", checkEliminar);
                if (checkEliminar > 0) {
                    document.getElementById("botonEliminar").disabled = false;
                } else {
                    document.getElementById("botonEliminar").disabled = true;
                }
            });
        </script>
    </body>

    </html>

<?php
    mysqli_close($conexion);
}
?>