<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    if (!empty($_GET["verId"])) {
        $cargaId = $_GET["verId"];
    } else {
        $cargaId = 0;
    }

    include_once "../../../conectarSQL/conectar_SQL.php";
    $editarSQL = "SELECT * FROM cursoyprofesor WHERE id='" . $cargaId . "'";
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
        <title>Editar de Profesor</title>
        
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
            <div class="text-center">
                <h1>Editar de Profesor</h1>
            </div>
        </div>
        <br>
        <form id="formEditar" name="formEditar" onsubmit="return editarProfesor()" method="post" action="subirSQL/cambiarProf.php?cambiarId=<?php echo $cargaId; ?>">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            Profesor
                        </th>
                        <th>
                            Cursos
                        </th>
                        <th>
                            Cursos 2 (Opcional)
                        </th>
                        <th>
                            Cursos 3 (Opcional)
                        </th>
                        <th>
                            Cursos 4 (Opcional)
                        </th>
                        <th>
                            Cursos 5 (Opcional)
                        </th>
                        <th>
                            Cursos 6 (Opcional)
                        </th>
                        <th>
                            Cursos 7 (Opcional)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $carga = mysqli_query($conexion, $editarSQL);
                    if (mysqli_num_rows($carga) > 0) {
                        while ($row = mysqli_fetch_array($carga)) {
                            echo "<tr>
                                    <th>" . $row['id'] . "</th>
                                    <th>" . $row['profesor'] . "</th>";

                            echo "<th>
                                    <select name='editarCurso1' id='editarCurso1' class='custom-select'>
                                        <option value='" . $row['curso'] . "' selected>Antes: " . $row['curso'] . "</option>";
                            include_once("selecciones/sacarCursosSelect.php");
                            echo "</select>                            
                            </th>";

                            echo "<th>
                                    <select name='editarCurso2' id='editarCurso2' class='custom-select'>
                                    <option value='" . $row['curso2'] . "' selected>Antes: " . $row['curso2'] . "</option>";
                            include_once "selecciones/sacarCursosSelect2.php";
                            echo "</select>
                            </th>";

                            echo "<th>
                                    <select name='editarCurso3' id='editarCurso3' class='custom-select'>
                                    <option value='" . $row['curso3'] . "' selected>Antes: " . $row['curso3'] . "</option>";
                            include_once "selecciones/sacarCursosSelect3.php";
                            echo "</select>
                            </th>";

                            echo "<th>
                                    <select name='editarCurso4' id='editarCurso4' class='custom-select'>
                                    <option value='" . $row['curso4'] . "' selected>Antes: " . $row['curso4'] . "</option>";
                            include_once "selecciones/sacarCursosSelect4.php";
                            echo "</select>
                            </th>";

                            echo "<th>
                                    <select name='editarCurso5' id='editarCurso5' class='custom-select'>
                                    <option value='" . $row['curso5'] . "' selected>Antes: " . $row['curso5'] . "</option>";
                            include_once "selecciones/sacarCursosSelect5.php";
                            echo "</select>
                            </th>";

                            echo "<th>
                                    <select name='editarCurso6' id='editarCurso6' class='custom-select'>
                                    <option value='" . $row['curso6'] . "' selected>Antes: " . $row['curso6'] . "</option>";
                            include_once "selecciones/sacarCursosSelect6.php";
                            echo "</select>
                            </th>";

                            echo "<th>
                                    <select name='editarCurso7' id='editarCurso7' class='custom-select'>
                                    <option value='" . $row['curso7'] . "' selected>Antes: " . $row['curso7'] . "</option>";
                            include_once "selecciones/sacarCursosSelect7.php";
                            echo "</select>
                            </th>";

                            echo "</tr>";
                        }
                    }
                    mysqli_free_result($carga);
                    ?>
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <a href='javascript:history.back()'>
                    <button type='button' class='btn btn-danger'>
                        <i class="fas fa-xmark"></i> Cancelar
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-floppy-disk"></i> Guardar y Cambiar
                </button>
            </div>
        </form>

        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            function editarProfesor() {
                return true;
            }
        </script>

    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>