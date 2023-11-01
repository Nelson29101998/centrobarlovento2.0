<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: red;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .footer {
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    .title {
        display: block;
        border-top: 5px solid #2689F9;
        height: 30px;
        line-height: 30px;
        padding: 4px 6px;
        font-size: 16px;
        margin-bottom: 13px;
        clear: both;
    }

    .title .izquierda {
        float: left;
    }

    .title .derecha {
        float: right;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .btn {
        /* font-size: 19px; */
        font-weight: bolder;
    }
</style>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white;">
        &times;
    </a>
    <?php
    $verServer = $_SERVER['SERVER_NAME'];
    if ($verServer == 'centrobarlovento-4379ff6a6396.herokuapp.com') {
        $sacar = "/";
    } else {
        $sacar = "/centroBarlovento/";
    }

    if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
        include_once "../../conectarSQL/conectar_SQL.php";
        require_once "../../ajuste/MobileDetect/Mobile_Detect.php";
    } else {
        include_once "../../../conectarSQL/conectar_SQL.php";
        require_once "../../../ajuste/MobileDetect/Mobile_Detect.php";
    }

    $detect = new Mobile_Detect;

    $espacioSQL = "SHOW TABLE STATUS";

    $resultados = mysqli_query($conexion, $espacioSQL);
    $tamano = 0;
    $tamanoMax = 5;
    if (mysqli_num_rows($resultados) > 0) {
        while ($row = mysqli_fetch_array($resultados)) {
            $tamano += $row["Data_length"] + $row["Index_length"];
        }
    }
    ?>
    <div id="my-element">
        <?php
        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
        ?>
            <a href="../menu.php">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-house-chimney fa-xl"></i> Menú
                </button>
            </a>
        <?php
        }
        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/asistenciaAdm/asistencia.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="asistenciaAdm/asistencia.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="../asistenciaAdm/asistencia.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-clipboard-list fa-xl"></i> Asistencia
            </button>
            </a>
        <?php
        }
        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/arreglarAdm/fichaDeParticipante.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="arreglarAdm/fichaDeParticipante.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="../arreglarAdm/fichaDeParticipante.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-clipboard-user fa-xl"></i> Ficha de participantes
            </button>
            </a>
        <?php
        }
        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/profesorAdm/profesor.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="profesorAdm/profesor.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="../profesorAdm/profesor.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-users fa-xl"></i> Ficha del Profesor
            </button>
            </a>
        <?php
        }

        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/cursosAdm/fichaCursos.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="cursosAdm/fichaCursos.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="../cursosAdm/fichaCursos.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-table-list fa-xl"></i> Ficha de los Talleres
            </button>
            </a>
        <?php
        }

        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/listaEstd/listaEstudiante.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="listaEstd/listaEstudiante.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/listaEstd/listaEstudiante.php") {
                echo '<a href="../listaEstd/listaEstudiante.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-list-check fa-xl"></i> Listado de Participante
            </button>
            </a>
        <?php
        }

        if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/pagoAdm/pago.php") {
            if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
                echo '<a href="pagoAdm/pago.php">';
            } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/pagoAdm/pago.php") {
                echo '<a href="../pagoAdm/pago.php">';
            }
        ?>
            <button type="button" class="btn btn-primary">
                <i class="fa-solid fa-money-check-dollar fa-xl"></i> Pagos
            </button>
            </a>
        <?php
        }
        if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
            echo '<a href="../buscando/cerrarCuenta.php">';
        } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
            echo '<a href="../../buscando/cerrarCuenta.php">';
        }
        ?>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-sign-out-alt fa-xl"></i> Cerrar sesión
        </button>
        </a>
    </div>

    <?php
    $mbytes = number_format($tamano / (1024 * 1024), 2);
    $totalPorct = 0;
    $totalPorct = (100 * $mbytes) / $tamanoMax;
    ?>

    <div class="footer text-center">
        <div class="container-fluid">
            Espacio de la base de datos
            <br>
            <div class="progress" style="height: 15px; border-radius: 10px;">
                <?php
                if ($totalPorct < 50) {
                    $colorLetra = '';
                    $palabra = '';
                }
                if ($totalPorct >= 50 && $totalPorct < 90) {
                    $colorLetra = 'bg-warning';
                    $palabra = 'Queda poca espacio';
                }
                if ($totalPorct >= 90) {
                    $colorLetra = 'bg-danger';
                    $palabra = 'Esta lleno espacio';
                }
                echo "<div class='progress-bar " . $colorLetra . "' role='progressbar' style='width: " . $totalPorct . "%; border-radius: 10px;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>
                " . $palabra . "
                </div>";
                ?>
            </div>
            <?php
            echo $mbytes . " MB / " . $tamanoMax . " MB";
            ?>
        </div>

        <?php
        if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
            echo '<img src="../../image/logo_barlovento.png" class="img-fluid" alt="logo_CentroBarlovento">';
        } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
            echo '<img src="../../../image/logo_barlovento.png" class="img-fluid" alt="logo_CentroBarlovento">';
        }
        ?>
        <span>© 2018 - <?php echo date("Y"); ?></span>
        <span><?php echo $verServer; ?></span>
    </div>
</div>

<div class="container-fluid">
    <div class="title">
        <span style="font-size:30px;cursor:pointer;" class="izquierda" onclick="openNav()">&#9776; Volver</span>

        <span style="font-size:20px;cursor:pointer;" class="badge badge-primary derecha" id="verReloj"></span>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
    echo '<script src="../../moment/moment.min.js"></script>';
} else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusAdm/menu.php") {
    echo '<script src="../../../moment/moment.min.js"></script>';
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";

        const element = document.getElementById('my-element');
        element.classList.add('animate__animated', 'animate__fadeInLeft');
        element.style.setProperty('--animate-duration', '1.8s');
        setTimeout(function() {
            element.classList.remove('animate__animated', 'animate__fadeInLeft');
        }, 2500)
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    var tiempoDato = null,
        datos = null;

    var actualizar = function() {
        datos = moment(new Date());
        tiempoDato.html(datos.format('DD-MM-YYYY HH:mm a'));
    };

    $(document).ready(function() {
        tiempoDato = $('#verReloj');
        actualizar();
        setInterval(actualizar, 1000);
    });
</script>
