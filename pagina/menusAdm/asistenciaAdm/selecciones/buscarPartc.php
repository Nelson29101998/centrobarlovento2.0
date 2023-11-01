<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$selecion0 = "";
if (!empty($_GET['buscarPartc'])) {
    if ($_GET['buscarPartc'] == "vacio") {
        $selecion0 = "selected";
    } else {
        $selecion0 = "";
    }
}

echo "<option value='vacio' " . $selecion0 . ">Selección del Participante</option>";

$revisarEstudiante ="SELECT DISTINCT estudiante FROM asistencias ORDER BY estudiante";

$resultadosEstudiante = mysqli_query($conexion, $revisarEstudiante);
if (mysqli_num_rows($resultadosEstudiante) > 0) {
    while ($row = mysqli_fetch_array($resultadosEstudiante)) {
        if (!empty($_GET['buscarPartc'])) {
            if ($_GET['buscarPartc'] == $row['estudiante']) {
                $selecionCurso = "selected";
            } else {
                $selecionCurso = "";
            }
        }
        echo "<option value='".$row['estudiante']."' " . $selecionCurso . ">".$row['estudiante']."</option>";
    }
}
mysqli_free_result($resultadosEstudiante);
?>