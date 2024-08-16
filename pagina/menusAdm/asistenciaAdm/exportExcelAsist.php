<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$taller = $_GET['verTaller'];

$sacarMes = $_GET['verMes'];

$sacarAno = $_GET['verAno'];

$buscarTaller = "SELECT * FROM tallertiempo 
                    WHERE taller='" . $taller . "' AND mes='" . $sacarMes . "' AND ano='" . $sacarAno . "'";

$resultado = mysqli_query($conexion, $buscarTaller) or die(mysqli_error($conexion));


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
    <title>Exporta Excel de Asistencia</title>
    <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    <?php
    //! Favicon
    $direccion = "../../../";
    include_once $direccion . "ajuste/favicon.php";
    ?>
</head>

<body>
    <div class="container">
        <br>
        <h2>Revisar bien ante de Exporta Para Excel</h2>
        <br>
        <div class="well-sm col-sm-12">
            <div class="btn-group pull-right">
                <?php 
                echo "
                <a href='export.php?verTaller=" . $taller . "&verMes=" . $sacarMes . "&verAno=" . $sacarAno . "'>
                "
                ?>
                    <button id="export_data" name='export_data' value="Export to excel" class="btn btn-info">
                        Exportar a Excel
                    </button>
                </a>
            </div>
        </div>
        <br>
    </div>

    <table id="" class="table table-striped table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Mes</th>
            <th>Año</th>
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<th>" . $i . "</th>";
            }
            ?>
        </tr>
        <tbody>

            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    echo "
                <tr>
                    <th>" . $row['estudiante'] . "</th>
                    <th>" . $row['mes'] . "</th>
                    <th>" . $row['ano'] . "</th>
                    <th>" . $row['1'] . "</th>
                ";

                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $row[$i] . "</th>";
                    }

                    echo "</tr>";
                }
            }
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
</body>

</html>