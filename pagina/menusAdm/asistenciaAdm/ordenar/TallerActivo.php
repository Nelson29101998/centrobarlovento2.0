<table style="background-color: #F71806; border-radius: 15px;">
    <thead>
        <tr>
            <th>
                <h5>Taller Activo</h5>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $revisarCirsoActivo = "SELECT * FROM cursos WHERE nombreCurso='" . $_POST['verCurso'] . "' and habilitar=true";
        $resultadosCursoActivo = mysqli_query($conexion, $revisarCirsoActivo);
        if (mysqli_num_rows($resultadosCursoActivo) > 0) {
            while ($row = mysqli_fetch_array($resultadosCursoActivo)) {
                echo "<tr>
                        <th>
                            <laber>
                                Taller Activo:
                            </laber>
                            <p>
                                " . $row['nombreCurso'] . "
                            </p>
                        </th>
                        <th>
                            <laber>
                                Código:
                            </laber>
                            <p>
                                " . $row['codigo'] . "
                            </p>
                        </th>
                        <th>
                            <laber>
                                Fecha:
                            </laber>
                            <p>
                                " . date("d-m-Y", strtotime($row['fecha'])) . "
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan=2>
                            <laber>
                                Horario:
                            </laber>
                            <p>
                                Desde: " . date("H:i", strtotime($row['horarioDesde'])) . ",
                                Hasta: " . date("H:i", strtotime($row['horarioHasta'])) . "
                            </p>
                        </th>
                        <th>
                            <laber>
                                Profesor:
                            </laber>
                            <p>
                                " . $row['profesor'] . "
                            </p>
                        </th>
                    </tr>";
            }
        }
        ?>
    </tbody>
</table>