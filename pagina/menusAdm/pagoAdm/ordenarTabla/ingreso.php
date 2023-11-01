<div class="animate__animated animate__backInLeft">
    <form id="formPago" name="formPago" onsubmit="return crearPago()" method="post" action="subirSQL/subirPago.php">
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
                            <i class="fas fa-user"></i> Rut - Nombre (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <select name="rutNom" id="rutNom" class="form-select">
                            <?php
                            include_once "selecciones/sacarAlumnosSelect.php";
                            ?>
                        </select>
                    </th>
                    <th class="form-group">
                        <label for="monto" class="text-white">
                            <i class="fa-solid fa-percent"></i> Monto:
                        </label>
                        <br>
                        <div class="field">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="field">
                            <input type="text" class="form-control" name="monto" id="monto" maxlength="50" placeholder="Ingresa su monto">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th class="form-group">
                        <label for="fechaPago" class="text-white">
                            <i class="fa-solid fa-calendar-days"></i> Fecha de pago:
                        </label>
                        <input type='date' class='form-control' id='fechaPago' name='fechaPago'>
                    </th>
                    <th class="form-group">
                        <label for="concepto" class="text-white">
                            <i class="fa-solid fa-hand-holding-dollar"></i> Por concepto:
                        </label>
                        <input type="text" class="form-control" name="concepto" id="concepto" maxlength="50" placeholder="Ingresa su concepto">
                    </th>
                </tr>
                <tr>
                    <th class="form-group">
                        <label for="viaPago" class="text-white">
                            <i class="fa-solid fa-credit-card"></i> Vía de pago:
                        </label>
                        <select name="viaPago" id="viaPago" class="form-select">
                            <?php
                            include_once "selecciones/viasPagos.php";
                            ?>
                        </select>
                    </th>
                    <th class="form-group">
                        <label for="observ" class="text-white">
                            Observaciones:
                        </label>
                        <input type="text" class="form-control" name="observ" id="observ" maxlength="50" placeholder="Ingresa su observaciones">
                    </th>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-floppy-disk"></i> Agregar
            </button>

            <button type="reset" class="btn btn-success">
                <i class="fas fa-recycle"></i> Limpiar
            </button>
        </div>
    </form>
</div>