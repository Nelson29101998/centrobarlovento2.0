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
        <title>Ficha de Cursos</title>
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
                    <h1>Ficha de los Talleres</h1>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i>): Obligatorio
                    </label>
                </div>
            </div>
        </div>

        <br>

        <div class="animate__animated animate__backInLeft">
            <form id="formCurso" name="formCurso" onsubmit="return crearCurso()" method="post" action="subirSql/sqlCurso.php?cualquier=anadir">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Datos del Taller</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="form-group">
                            <th>
                                <label for="nomCurso" class="text-white">
                                    <i class="fa-solid fa-file-pen"></i> Nombre Del Taller (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                                </label>
                                <input type="text" class="form-control" name="nomCurso" id="nomCurso" maxlength="50" placeholder="Ingresa su nombre de curso" required>
                            </th>
                            <th>
                                <label for="fechaCurso" class="text-white">
                                    <i class="fa-solid fa-calendar-days"></i> Fecha:
                                </label>
                                <?php
                                date_default_timezone_set("America/Santiago");
                                echo "<input type='date' class='form-control' id='fechaCurso' name='fechaCurso'  min='" . date("Y-m-d") . "'>";
                                ?>
                            </th>

                        </tr>
                        <tr class="form-group">
                            <th rowspan="2">
                                <label class="text-white">
                                    <i class="fa-regular fa-clock"></i> Horario:
                                </label>
                                <p>
                                    Desde:
                                    <input type="time" class="form-control" name="horaDesde" id="horaDesde" min="07:00" max="21:00">
                                </p>
                                <p>
                                    Hasta:
                                    <input type="time" class="form-control" name="horaHasta" id="horaHasta" min="07:00" max="21:00">
                                </p>
                            </th>
                        </tr>
                        <tr class="form-group">
                            <th>
                                <label for="profesorCurso" class="text-white">
                                    <i class="fa-solid fa-chalkboard-user"></i> Profesor:
                                </label>
                                <select class="form-select" name="profesorCurso" id="profesorCurso">
                                    <option selected>Seleccion de Profesor</option>
                                    <?php
                                    $revisarProfesor = "SELECT * FROM profesor";
                                    $elegirProfesor = mysqli_query($conexion, $revisarProfesor);
                                    if (mysqli_num_rows($elegirProfesor) > 0) {
                                        while ($row = mysqli_fetch_array($elegirProfesor)) {
                                            echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-floppy-disk"></i> Agregar
                    </button>

                    <button type="reset" class="btn btn-success">
                        <i class="fas fa-recycle"></i> Limpiar
                    </button>
                </div>
            </form>
        </div>

        <br>

        <div class="text-center">
            <div class="animate__animated animate__backInLeft">
                <table>
                    <thead>
                        <tr>
                            <th>
                                N*
                            </th>
                            <th>
                                Ver Datos de Talleres
                            </th>
                            <th>
                                Lista de Talleres activos
                            </th>
                            <th>
                                Inhabilitar Taller
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $revisarCurso = "SELECT * FROM cursos WHERE habilitar=true";
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
                                                <i class='fa-solid fa-eye-slash'></i>
                                            </button>
                                        </a>
                                    </div>
                                    </th>
                                </tr>";
                            }
                        } else {
                            echo "<tr>
                                    <th class='text-center' colspan='5'>
                                        No hay habitar ni cursos
                                    </th>                                    
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <br>

                <a href="inhabitar.php">
                    <button type="button" class="btn btn-primary">
                        <i class="fa-solid fa-eye-low-vision"></i> Ver inhabitar de los Talleres
                    </button>
                </a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
    </body>

    </html>

<?php
    mysqli_close($conexion);
}
?>