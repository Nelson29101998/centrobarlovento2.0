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
        <title>Ficha de participante</title>

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

            #ajustarTexto {
                width: 37%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }

            .borderDeLabel {
                padding: 5px 10px;
                border-radius: 5px;
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
                    <h1>Ficha de participante</h1>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i>): Obligatorio
                    </label>
                    <br>
                    <label class="text-white">
                        (<i class="fa-solid fa-asterisk fa-2xs"></i><i class="fa-solid fa-asterisk fa-2xs"></i>): Opcional
                    </label>
                </div>
            </div>
            <br>
            <div class="animate__animated animate__backInLeft">
                <form id="formInscr" name="formInscr" onsubmit="return crearInscripcion()" method="post" action="subirSQL/subirInscr.php">
                    <?php
                    //*Tabla de Participante.
                    include_once "ordenarTabla/participante.php";
                    echo "<br>";
                    include_once "avisarToast/toastsPartic.html";

                    echo "<br>";

                    //*Tabla de curso del estudiante participante.
                    include_once "ordenarTabla/cursosEstd.php";

                    echo "<br>";
                    echo "<br>";

                    //*Tabla de Persona de medico.
                    include_once "ordenarTabla/medicos.php";
                    echo "<br>";
                    include_once "avisarToast/toastsMedico.html";

                    echo "<br>";

                    //*Tabla de Persona de informacion de salud.
                    include_once "ordenarTabla/informacionSalud.php";
                    echo "<br>";
                    include_once "avisarToast/toastsSalud.html";

                    echo "<br>";

                    //*Tabla de Persona de emergencia de contacto.
                    include_once "ordenarTabla/contacto.php";
                    echo "<br>";
                    include_once "avisarToast/toastsContacto.html";
                    ?>

                    <br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>

                        <button type="reset" class="btn btn-success">
                            <i class="fas fa-recycle"></i> Limpiar
                        </button>
                    </div>
                </form>

                <br>

                <?php
                //include_once "ordenarTabla/anadirTalleres.php";
                ?>
            </div>
        </div>
        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            nacePartc.max = new Date().toISOString().split("T")[0];

            var notaRut = "Por ejemplo de Rut: 2xx32xxxk No punto ni guion.";

            tippy("#rutPartc", {
                content: notaRut,
                animation: "scale",
                trigger: "click",
                interactive: true,
            });

            tippy("#rutApoyo", {
                content: notaRut,
                animation: "scale",
                trigger: "click",
                interactive: true,
            });

            var notaTel = "Por ejemplo de teléfono: +569XXXXXXXX No ponga espacio.";

            tippy("#telefonoPartc", {
                content: notaTel,
                animation: "scale",
                trigger: "click",
                interactive: true,
            });

            tippy("#telefonoApoyo", {
                content: notaTel,
                animation: "scale",
                trigger: "click",
                interactive: true,
            });

            tippy("#telefonoApoyoOtro", {
                content: notaTel,
                animation: "scale",
                trigger: "click",
                interactive: true,
            });

            function crearInscripcion() {
                var aprobar = false;
                if (tablaParticipante()) {
                    console.log("Verdar");
                    aprobar = true;
                } else {
                    tablaParticipante();
                    console.log("Falso");
                    aprobar = false;
                }
                return aprobar;
            }

            function tablaParticipante() {
                var nombreParticipante =
                    document.forms["formInscr"]["nombreParticipante"].value;
                var rutPartc = document.forms["formInscr"]["rutPartc"].value;
                var telPartc = document.forms["formInscr"]["telefonoPartc"].value;
                var mailPartc = document.forms["formInscr"]["correoPartc"].value;
                var dirPartc = document.forms["formInscr"]["direccionPartc"].value;

                if (nombreParticipante == "" || nombreParticipante == null) {
                    $(document).ready(function() {
                        $(".errorNomPartc").toast("show");
                    });
                    return false;
                }

                if (rutPartc == "" || rutPartc == null) {
                    $(document).ready(function() {
                        $(".errorRutPartc").toast("show");
                    });
                    return false;
                }

                if (telPartc == "" || telPartc == null) {
                    $(document).ready(function() {
                        $(".errorTelPartc").toast("show");
                    });
                    return false;
                }

                if (mailPartc == "" || mailPartc == null) {
                    $(document).ready(function() {
                        $(".errorMailPartc").toast("show");
                    });
                    return false;
                }

                if (dirPartc == "" || dirPartc == null) {
                    $(document).ready(function() {
                        $(".errorDirPartc").toast("show");
                    });
                    return false;
                }

                return true;
            }

            function creaAlumno() {
                var elegirTaller = document.forms["formAddAlumno"]["verCurso"].value;
                var elegirMes = document.forms["formAddAlumno"]["elegirMes"].value;
                var elegirAno = document.forms["formAddAlumno"]["elegirAno"].value;
                if (elegirTaller == "vacio" || elegirMes == "vacio" || elegirAno == "vacio") {
                    return false;
                }
                return true;
            }
        </script>
    </body>

    </html>

<?php
}
?>