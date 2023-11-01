<option value="vacio" selected>Selección del Participante</option>
<option value="todas" >Todos</option>
<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarEstudiante ="SELECT * FROM inscripcion";

$resultadosEstudiante = mysqli_query($conexion, $revisarEstudiante);
if (mysqli_num_rows($resultadosEstudiante) > 0) {
    while ($row = mysqli_fetch_array($resultadosEstudiante)) {
        echo "<option value='".$row['nombrePartc']."'>".$row['nombrePartc']."</option>";
    }
}
mysqli_free_result($resultadosEstudiante);
?>