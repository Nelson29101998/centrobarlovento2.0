<table>
    <thead>
        <tr>
            <th>
                Rut
            </th>
            <th>
                Nombre de Participante
            </th>
            <th>
                Fecha de pago
            </th>
            <th>
                Monto
            </th>
            <th>
                Por Concepto
            </th>
            <th>
                Via de pago
            </th>
            <th>
                Observaciones
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $revisarSQLPago = "SELECT * FROM pagos";
        $tablaPago = mysqli_query($conexion, $revisarSQLPago);
        if (mysqli_num_rows($tablaPago) > 0) {
            while ($row = mysqli_fetch_array($tablaPago)) {
                echo "<tr>
                    <th>
                        " . $row['rut'] . "
                    </th>
                    <th>
                        " . $row['nombre'] . "
                    </th>
                    <th>
                        " . date("d-m-Y", strtotime($row['fecha'])) . "
                    </th>
                    <th>
                        <i class='fa-solid fa-dollar-sign'></i>
                        " . $row['monto'] . "
                    </th>
                    <th>
                        " . $row['conpt'] . "
                    </th>
                    <th>
                        " . $row['viaPago'] . "
                    </th>
                    <th>
                        " . $row['obscr'] . "
                    </th>
                    <th>
                        <a href='editarPago.php?editarPago=" . $row['id'] . "'> 
                            <button type='button' id='editarPago' class='btn btn-primary'>
                                <i class='fas fa-pencil fa-2xl'></i>
                            </button>
                        </a>
                    </th>
                    <th>
                        <a href='subirSQL/borrarPago.php?borrarId=" . $row['id'] . "'>                                   
                            <button type='button' id='borrarId' class='btn btn-danger'>
                                <i class='fas fa-trash-can fa-2xl'></i>
                            </button>
                        </a>
                    </th>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>