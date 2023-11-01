<div class="container">
    <div class="animate__animated animate__flipInX animate__delay-1s">
        <div class="text-center">
            <h1>Curso</h1>
        </div>
    </div>
</div>

<div class="animate__animated animate__bounceIn animate__delay-1s">
    <form id="formCurso" name="formCurso" onsubmit="return crearCurso()" method="post" action="subirSQL/sqlCurso.php?cualquier=anadir">
        <table style="background-color: #F71806;">
            <tbody>
                <tr class="form-group">
                    <th>
                        <label for="nomCurso" class="text-white">
                            <i class="fas fa-chalkboard-user"></i> Ingresa su nombre de Curso:
                        </label>
                        <input type="text" class="form-control" name="nomCurso" id="nomCurso" maxlength="50" placeholder="Ingresa su nombre de Curso">
                    </th>

                </tr>
                <tr class="form-group">
                    <th class="text-center">
                        <button type="submit" id="anadirCurso" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<br>

<div class="animate__animated animate__bounceIn animate__delay-1s">
    <table style="background-color: #F71806;">
        <thead>
            <tr>
                <th>
                    N*
                </th>
                <th>
                    Nombre de Curso
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $revisarCurso = "SELECT * FROM cursos";
            $sum = 0;
            $resultadosCurso = mysqli_query($conexion, $revisarCurso);
            if (mysqli_num_rows($resultadosCurso) > 0) {
                while ($row = mysqli_fetch_array($resultadosCurso)) {
                    $sum = $sum + 1;
                    echo "<tr>
                        <th>" . $sum . "</th>
                        <th>" . $row['nombreCurso'] . "</th>
                        <th>
                        <a href='subirSQL/sqlCurso.php?borrarId=" . $row['id'] . "&cualquier=borrar'>                                   
                            <button type='button' id='borrarId' class='btn btn-danger'>
                                <i class='fas fa-trash-can'></i>
                            </button>
                        </a> 
                        </th>
                        </tr>";
                }
            } else {
                echo "<tr>
                    <th class='text-center' colspan='2'>
                    <i class='fas fa-folder-open'></i> No hay curso
                    </th>
                    </tr>";
            }
            mysqli_free_result($resultadosCurso);
            ?>
        </tbody>
    </table>
</div>