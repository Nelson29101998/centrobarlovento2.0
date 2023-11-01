<div class="animate__animated animate__backInLeft">
    <form id="formPro" name="formPro" onsubmit="return crearProfesor()" method="post" action="subirSql/sqlProfesor.php">
        <table>
            <thead>
                <tr>
                    <th>
                        <h5>Datos personales</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="form-group">
                    <th>
                        <label for="nomPro" class="text-white">
                            <i class="fas fa-user-tie"></i> Nombre completo (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="text" class="form-control" name="nomPro" id="nomPro" maxlength="50" placeholder="Ingresa su nombre">
                    </th>
                    <th>
                        <label for="fechaPro" class="text-white">
                            <i class="fas fa-calendar"></i> Fecha de nacimmiento (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="date" class="form-control" id="fechaPro" name="fechaPro" value="" min="1950-01-01">
                    </th>
                </tr>
                <tr class="form-group">
                    <th>
                        <label for="rutPro" class="text-white">
                            <i class="fas fa-address-card"></i> Rut (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="text" class="form-control" name="rutPro" id="rutPro" maxlength="9" placeholder="Ingresa su rut">
                    </th>
                    <th class="form-group">
                        <label for="telefonoPro" class="text-white">
                            <i class="fas fa-phone"></i> Teléfono (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="text" class="form-control" name="telefonoPro" id="telefonoPro" maxlength="12" placeholder="Ingresa su teléfono">
                    </th>
                </tr>
                <tr class="form-group">
                    <th>
                        <label for="mailPro" class="text-white">
                            <i class="fas fa-at"></i> Mail (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="email" class="form-control" name="mailPro" id="mailPro" maxlength="50" placeholder="Ingresa su correo">
                    </th>
                    <th class="form-group">
                        <label for="direccionPro" class="text-white">
                            <i class="fas fa-map"></i> Direccion (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="text" class="form-control" name="direccionPro" id="direccionPro" maxlength="100" placeholder="Ingresa su dirección">
                    </th>
                </tr>
                <tr class="form-group">
                    <th>
                        <label for="areaPro" class="text-white">
                            <i class="fas fa-chalkboard"></i> Área docente (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                        </label>
                        <input type="text" class="form-control" name="areaPro" id="areaPro" maxlength="100" placeholder="Ingresa su Área docente">
                    </th>
                    <th>
                        <label for="otroPro" class="text-white">
                            <i class="fa-regular fa-comment"></i> Otros datos:
                        </label>
                        <input type="text" class="form-control" name="otroPro" id="otroPro" maxlength="100" placeholder="Ingrese">
                    </th>
                </tr>
                <?php
                // include_once("cursoProf.php");
                ?>
            </tbody>
        </table>

        <br>

        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-floppy-disk"></i> Guardar
            </button>

            <button type="reset" class="btn btn-success">
                <i class="fas fa-recycle"></i> Limpiar
            </button>
        </div>
    </form>
</div>
<br>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
    <div class="text-center">
        <?php include_once "avisar/toasts.html"; ?>
    </div>
</div>

<br>

<?php
//* Lista de Profesor
include_once "verListaProfesor.php"
?>