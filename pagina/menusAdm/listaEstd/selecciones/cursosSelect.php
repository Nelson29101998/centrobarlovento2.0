<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarCurso = "SELECT * FROM cursos WHERE habilitar=true ORDER BY nombreCurso";

$selecion0 = "";
if (!empty($_GET['verCurso'])) {
    if ($_GET['verCurso'] == "vacio") {
        $selecion0 = "selected";
    }
}

echo "<option value='vacio' " . $selecion0 . ">Selección del Taller Activos</option>";

$selecionCurso = "";
$resultadosCurso = mysqli_query($conexion, $revisarCurso);
if (mysqli_num_rows($resultadosCurso) > 0) {
    while ($row = mysqli_fetch_array($resultadosCurso)) {
        if (!empty($_GET['verCurso'])) {
            if ($_GET['verCurso'] == $row['nombreCurso']) {
                $selecionCurso = "selected";
            } else {
                $selecionCurso = "";
            }
        }
        echo "<option value='" . $row['nombreCurso'] . "' " . $selecionCurso . ">" . $row['nombreCurso'] . "</option>";
    }
}
mysqli_free_result($resultadosCurso);
?>