<option value="vacio" selected>Selección de la participante</option>
<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarEstd ="SELECT * FROM estudiante";

$resultadosEstd = mysqli_query($conexion, $revisarEstd);
if (mysqli_num_rows($resultadosEstd) > 0) {
    while ($row = mysqli_fetch_array($resultadosEstd)) {
        echo "<option value='".$row['rut']."'>".$row['rut']." - ". $row['nombre']."</option>";
    }
}
mysqli_free_result($resultadosEstd);
?>