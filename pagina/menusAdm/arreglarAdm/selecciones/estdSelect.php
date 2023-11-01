<tr>
    <th colspan="2">
        
        <?php
        include_once "../../../conectarSQL/conectar_SQL.php";

        $revisarEstudiante = "SELECT * FROM inscripcion";

        $resultadosEstudiante = mysqli_query($conexion, $revisarEstudiante);
        $numEst = 1;
        $cortaTabla = 4;
        if (mysqli_num_rows($resultadosEstudiante) > 0) {
            while ($row = mysqli_fetch_array($resultadosEstudiante)) {
                echo " <label class='form-check-label bg-primary borderDeLabel'>               
                        <input class='form-check-input' type='checkbox' value='" . $row['rutPartc'] . "' name='estd_list[]'>
                            " . $row['nombrePartc'] . "
                            </label>";
                if ($numEst == $cortaTabla) {
                    echo "<br><br>";
                    $numEst = 1;
                } else {
                    $numEst = $numEst + 1;
                }
            }
        }
        mysqli_free_result($resultadosEstudiante);
        ?>
    </th>
</tr>