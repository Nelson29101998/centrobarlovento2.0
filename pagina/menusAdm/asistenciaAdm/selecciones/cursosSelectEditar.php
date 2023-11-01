<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarCurso ="SELECT * FROM cursos";

$resultadosCurso = mysqli_query($conexion, $revisarCurso);
if (mysqli_num_rows($resultadosCurso) > 0) {
    while ($row = mysqli_fetch_array($resultadosCurso)) {
        echo "<option value='".$row['nombreCurso']."'>".$row['nombreCurso']."</option>";
    }
}
mysqli_free_result($resultadosCurso);
?>