<tr class="form-group">
    <th>
        <?php
        $revisarCurso = "SELECT * FROM cursos";
        $elegirCurso = mysqli_query($conexion, $revisarCurso);
        if (mysqli_num_rows($elegirCurso) > 0) {
        ?>
            <label for="cadaCurso" class="text-white">
                <i class="fas fa-chalkboard"></i> Elegir para Curso:
            </label>
            <select name="cadaCurso" id="cadaCurso" class="form-select">
                <option value="vacio" selected>Selección del curso</option>
                <?php
                while ($row = mysqli_fetch_array($elegirCurso)) {
                    echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                }
                ?>
            </select>
        <?php
        } else {
        ?>
            <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
        <?php
        }
        mysqli_free_result($elegirCurso);
        ?>
    </th>
    <th>
        <div class="form-check">
            <input type="checkbox" id="vercurso2" class="form-check-input"></input>
            <label for="vercurso2" class="form-check-label text-white">
                ¿Quieres segundo curso? (Opcional)
            </label>
        </div>
        <div id="mascurso2" style="display: none;">
            <?php
            $elegirCurso2 = mysqli_query($conexion, $revisarCurso);
            if (mysqli_num_rows($elegirCurso2) > 0) {
            ?>
                <label for="cadaCurso2" class="text-white">
                    <i class="fas fa-chalkboard"></i> Elegir para Segundo Curso:
                </label>
                <select name="cadaCurso2" id="cadaCurso2" class="form-select">
                    <option value="vacio" selected>Selección del curso</option>
                    <?php
                    while ($row = mysqli_fetch_array($elegirCurso2)) {
                        echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                    }
                    ?>
                </select>
            <?php
            } else {
            ?>
                <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
            <?php
            }
            mysqli_free_result($elegirCurso2);
            ?>
            <br>
            <div class="form-check">
                <input type="checkbox" id="vercurso3" class="form-check-input"></input>
                <label for="vercurso3" class="form-check-label text-white">
                    ¿Quieres tercero curso? (Opcional)
                </label>
            </div>
            <div id="mascurso3" style="display: none;">
                <?php
                $elegirCurso3 = mysqli_query($conexion, $revisarCurso);
                if (mysqli_num_rows($elegirCurso3) > 0) {
                ?>
                    <label for="cadaCurso3" class="text-white">
                        <i class="fas fa-chalkboard"></i> Elegir para Tercero Curso:
                    </label>
                    <select name="cadaCurso3" id="cadaCurso3" class="form-select">
                        <option value="vacio" selected>Selección del curso</option>
                        <?php
                        while ($row = mysqli_fetch_array($elegirCurso3)) {
                            echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                        }
                        ?>
                    </select>
                <?php
                } else {
                ?>
                    <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                <?php
                }
                mysqli_free_result($elegirCurso3);
                ?>
                <br>
                <div class="form-check">
                    <input type="checkbox" id="vercurso4" class="form-check-input"></input>
                    <label for="vercurso4" class="form-check-label text-white">
                        ¿Quieres cuarta curso? (Opcional)
                    </label>
                </div>
                <div id="mascurso4" style="display: none;">
                    <?php
                    $elegirCurso4 = mysqli_query($conexion, $revisarCurso);
                    if (mysqli_num_rows($elegirCurso4) > 0) {
                    ?>
                        <label for="cadaCurso4" class="text-white">
                            <i class="fas fa-chalkboard"></i> Elegir para Cuarta Curso:
                        </label>
                        <select name="cadaCurso4" id="cadaCurso4" class="form-select">
                            <option value="vacio" selected>Selección del curso</option>
                            <?php
                            while ($row = mysqli_fetch_array($elegirCurso4)) {
                                echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                            }
                            ?>
                        </select>
                    <?php
                    } else {
                    ?>
                        <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                    <?php
                    }
                    mysqli_free_result($elegirCurso4);
                    ?>
                    <br>
                    <div class="form-check">
                        <input type="checkbox" id="vercurso5" class="form-check-input"></input>
                        <label for="vercurso5" class="form-check-label text-white">
                            ¿Quieres quinto curso? (Opcional)
                        </label>
                    </div>
                    <div id="mascurso5" style="display: none;">
                        <?php
                        $elegirCurso5 = mysqli_query($conexion, $revisarCurso);
                        if (mysqli_num_rows($elegirCurso5) > 0) {
                        ?>
                            <label for="cadaCurso5" class="text-white">
                                <i class="fas fa-chalkboard"></i> Elegir para quinto Curso:
                            </label>
                            <select name="cadaCurso5" id="cadaCurso5" class="form-select">
                                <option value="vacio" selected>Selección del curso</option>
                                <?php
                                while ($row = mysqli_fetch_array($elegirCurso5)) {
                                    echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                        <?php
                        }
                        mysqli_free_result($elegirCurso5);
                        ?>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" id="vercurso6" class="form-check-input"></input>
                            <label for="vercurso6" class="form-check-label text-white">
                                ¿Quieres sexto curso? (Opcional)
                            </label>
                        </div>
                        <div id="mascurso6" style="display: none;">
                            <?php
                            $elegirCurso6 = mysqli_query($conexion, $revisarCurso);
                            if (mysqli_num_rows($elegirCurso6) > 0) {
                            ?>
                                <label for="cadaCurso6" class="text-white">
                                    <i class="fas fa-chalkboard"></i> Elegir para sexto Curso:
                                </label>
                                <select name="cadaCurso6" id="cadaCurso6" class="form-select">
                                    <option value="vacio" selected>Selección del curso</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($elegirCurso6)) {
                                        echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                    }
                                    ?>
                                </select>
                            <?php
                            } else {
                            ?>
                                <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                            <?php
                            }
                            mysqli_free_result($elegirCurso6);
                            ?>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" id="vercurso7" class="form-check-input"></input>
                                <label for="vercurso7" class="form-check-label text-white">
                                    ¿Quieres septimo curso? (Opcional)
                                </label>
                            </div>
                            <div id="mascurso7" style="display: none;">
                                <?php
                                $elegirCurso7 = mysqli_query($conexion, $revisarCurso);
                                if (mysqli_num_rows($elegirCurso7) > 0) {
                                ?>
                                    <label for="cadaCurso7" class="text-white">
                                        <i class="fas fa-chalkboard"></i> Elegir para septimo Curso:
                                    </label>
                                    <select name="cadaCurso7" id="cadaCurso7" class="form-select">
                                        <option value="vacio" selected>Selección del curso</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($elegirCurso7)) {
                                            echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                <?php
                                }
                                mysqli_free_result($elegirCurso7);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </th>
</tr>