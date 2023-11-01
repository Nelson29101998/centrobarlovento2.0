<div class="animate__animated animate__backInLeft">
    <table>
        <thead>
            <tr>
                <th>
                    N*
                </th>
                <th>
                    Ver Datos
                </th>
                <th>
                    Nombre Profesor
                </th>
                <th>
                    Fecha de nacimiento
                </th>
                <th>
                    Rut
                </th>
                <th>
                    Teléfono
                </th>
                <th>
                    Mail
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $revisarSQLPro = "SELECT * FROM profesor";
            $tablaPro = mysqli_query($conexion, $revisarSQLPro);
            $sumTotal = 0;
            if (mysqli_num_rows($tablaPro) > 0) {
                while ($row = mysqli_fetch_array($tablaPro)) {
                    $sumTotal = $sumTotal + 1;
                    echo "<tr>
                        <th>" . $sumTotal . "</th>
                        <th>
                            <a href='datosProf.php?verId=" . $row['id'] . "&verRut=".$row['rut']."Bank'>
                                <div class='text-center'>
                                    <button type='button' class='btn btn-primary'>
                                        <i class='fas fa-file-lines'></i>
                                    </button>
                                </div>
                            </a>
                        </th>
                        <th>" . $row['nombre'] . "</th>
                        <th>" . date("d-m-Y", strtotime($row['nacimiento'])) . "</th>
                        <th>" . $row['rut'] . "</th>
                        <th>" . $row['telefono'] . "</th>
                        <th>" . $row['mail'] . "</th>
                        <th>
                        <a href='subirSQL/borrarProfesor.php?buscarId=" . $row['id'] . "&buscarRut=" . $row['rut'] . "'>                                 
                            <button type='button' id='borrarId' class='btn btn-danger'>
                                <i class='fas fa-trash-can'></i>
                            </button>
                        </a>
                        </th>
                        </tr>";
                }
            }
            mysqli_free_result($tablaPro);
            ?>
        </tbody>
    </table>
</div>