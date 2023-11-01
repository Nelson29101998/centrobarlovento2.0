<form id="formCurso" name="formCurso" onsubmit="return crearCurso()" method="post" action="subirSql/actualizarSqlCurso.php?bucarId=<?php echo $buscarId; ?>">
    <table>
        <thead>
            <tr>
                <th>
                    <h5>Datos del Curso</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="form-group">
                <th>
                    <label for="nomCurso" class="text-white">
                        <i class="fa-solid fa-file-pen"></i> Nombre Del Curso (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="nomCurso" id="nomCurso" maxlength="50" placeholder="Ingresa su nombre de curso" <?php
                                                                                                                                                    echo "value='" . $verNombre . "'";
                                                                                                                                                    ?> required>
                </th>
                <th>
                    <label for="codigoCurso" class="text-white">
                        <i class="fa-solid fa-key"></i> Código:
                    </label>
                    <input type="text" class="form-control" name="codigoCurso" id="codigoCurso" maxlength="50" placeholder="Ingresa su código" <?php
                                                                                                                                                echo "value='" . $verCode . "'";
                                                                                                                                                ?>>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="fechaCurso" class="text-white">
                        <i class="fa-solid fa-calendar-days"></i> Fecha:
                    </label>
                    <?php
                    echo "<input type='date' class='form-control' id='fechaCurso' name='fechaCurso' min='" . date("Y-m-d") . "'
                    value='" . $verFecha . "'>"
                    ?>
                </th>
                <th rowspan="2">
                    <label class="text-white">
                        <i class="fa-regular fa-clock"></i> Horario:
                    </label>
                    <p>
                        Desde:
                        <input type="time" class="form-control" name="horaDesde" id="horaDesde" min="07:00" max="21:00" <?php
                                                                                                                        echo "value='" . $verHoraDesde . "'";
                                                                                                                        ?>>
                    </p>
                    <p>
                        Hasta:
                        <input type="time" class="form-control" name="horaHasta" id="horaHasta" min="07:00" max="21:00" <?php
                                                                                                                        echo "value='" . $verHoraHasta . "'";
                                                                                                                        ?>>
                    </p>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="profesorCurso" class="text-white">
                        <i class="fa-solid fa-chalkboard-user"></i> Profesor:
                    </label>
                    <select class="form-select" name="profesorCurso" id="profesorCurso">
                        <option <?php
                                echo "value='" . $verPro . "'";
                                ?> selected>
                            <?php
                            echo $verPro;
                            ?>
                        </option>
                        <?php
                        $revisarProfesor = "SELECT * FROM profesor";
                        $elegirProfesor = mysqli_query($conexion, $revisarProfesor);
                        if (mysqli_num_rows($elegirProfesor) > 0) {
                            while ($row = mysqli_fetch_array($elegirProfesor)) {
                                echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </th>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-arrows-rotate"></i> Actalizar
        </button>
    </div>
</form>