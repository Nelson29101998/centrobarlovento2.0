<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarCurso ="SELECT * FROM cursos";

$resultadosCurso = mysqli_query($conexion, $revisarCurso);
if (mysqli_num_rows($resultadosCurso) > 0) {
    while ($row4 = mysqli_fetch_array($resultadosCurso)) {
        echo "<option value='".$row4['nombreCurso']."'>".$row4['nombreCurso']."</option>";
    }
}
mysqli_free_result($resultadosCurso);
?>