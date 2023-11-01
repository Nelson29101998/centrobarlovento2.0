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
    $editarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias WHERE rut='" . $cargaRut . "'";
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
        <title>Editar de Estudiante</title>
        
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
                <h1>Editar de Estudiante</h1>
            </div>
        </div>
        <br>
        <form id="formEditar" name="formEditar" onsubmit="return editarEstd()" method="post" action="subirSQL/cambiarEstd.php?cambiarRut=<?php echo $cargaRut; ?>">
            <table>
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Estudiante</th>
                        <th>Contacto</th>
                        <th>Mail:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $carga = mysqli_query($conexion, $editarSQL);
                    if (mysqli_num_rows($carga) == 1) {
                        while ($row = mysqli_fetch_array($carga)) {
                            echo "<tr class='form-group'>
                                    <th>
                                        <input type='text' class='form-control' name='editRut' id='editRut' value='" . $row['rut'] . "' maxlength='9'>
                                    </th>
                                    <th>
                                        <input type='text' class='form-control' name='editEstd' id='editEstd' value='" . $row['estudiante'] . "' maxlength='50'>
                                    </th>
                                    <th>
                                        <input type='text' class='form-control' name='editTel' id='editTel' value='" . $row['telefono'] . "' maxlength='12'>
                                    </th>
                                    <th>
                                        <input type='email' class='form-control' name='editMail' id='editMail' value='" . $row['mail'] . "' maxlength='50'>
                                    </th>                               
                                </tr>";
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
            tippy('#editRut', {
                content: "Por ejemplo de Rut: 2xx32xxxk No punto ni guion.",
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            tippy('#editTel', {
                content: "Por ejemplo de teléfono: +569XXXXXXXX No ponga espacio.",
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            function editarEstd() {
                return true;
            }
        </script>
    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>