<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarEditarPago = "SELECT * FROM pagos WHERE id='" . $editarPago . "'";

$resultadosEditar = mysqli_query($conexion, $revisarEditarPago);
if (mysqli_num_rows($resultadosEditar) == 1) {
    while ($row = mysqli_fetch_array($resultadosEditar)) {
?>
        <div class="animate__animated animate__backInLeft">
            <?php
            echo "<form id='formPago' name='formPago' method='post' action='subirSQL/actualizarPago.php?buscarId=" . $editarPago . "'>";
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h5>Ingreso Individual</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="form-group">
                                <label for="rutNom" class="text-white">
                                    <i class="fas fa-user"></i> Rut - Nombre:
                                </label>
                                <p>
                                    <?php
                                    echo $row['rut'] . " - " . $row['nombre'];
                                    ?>
                                </p>
                            </th>
                            <th class="form-group">
                                <label for="monto" class="text-white">
                                    <i class="fa-solid fa-percent"></i> Monto:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='monto' id='monto' maxlength='50' value='" . $row['monto'] . "'
                                placeholder='Ingresa su monto'>";
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th class="form-group">
                                <label for="fechaPago" class="text-white">
                                    <i class="fa-solid fa-calendar-days"></i> Fecha de pago:
                                </label>
                                <?php
                                $verFecha = date("Y-m-d", strtotime($row['fecha']));
                                echo "<input type='date' class='form-control' id='fechaPago' name='fechaPago' value='" . $verFecha . "'>"
                                ?>
                            </th>
                            <th class="form-group">
                                <label for="concepto" class="text-white">
                                    <i class="fa-solid fa-hand-holding-dollar"></i> Por concepto:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='concepto' id='concepto' maxlength='50' value='" . $row['conpt'] . "'
                                placeholder='Ingresa su concepto'>";
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th class="form-group">
                                <label for="viaPago" class="text-white">
                                    <i class="fa-solid fa-credit-card"></i> Vía de pago:
                                </label>
                                <select name="viaPago" id="viaPago" class="form-select">
                                    <?php
                                    include_once "selecciones/viasPagosEditar.php";
                                    ?>
                                </select>
                            </th>
                            <th class="form-group">
                                <label for="observ" class="text-white">
                                    Observaciones:
                                </label>
                                <?php
                                echo "<input type='text' class='form-control' name='observ' id='observ' maxlength='50' value='" . $row['obscr'] . "'
                                placeholder='Ingresa su observaciones'>";
                                ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-floppy-disk"></i> Actualizar
                    </button>

                    <a href='javascript:history.back()'>
                    <button type='button' class='btn btn-danger'>
                        <i class='fa-solid fa-reply'></i> Volver
                    </button>
                </a>
                </div>
            </form>
        </div>
<?php
    }
}

mysqli_free_result($resultadosEditar);
?>