<form id="formPro" name="formPro" onsubmit="return editarProfesor()" method="post" action="subirSql/actualizarSqlPro.php">
    <table>
        <thead>
            <tr>
                <th>
                    <h5>
                        Ediar de Datos Personal
                    </h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="form-group">
                <th>
                    <label for="nomPro" class="text-white">
                        <i class="fas fa-user-tie"></i> Nombre completo (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="nomPro" id="nomPro" maxlength="50" placeholder="Ingresa su nombre" <?php
                                                                                                                                        echo "value='" . $verNombre . "'";
                                                                                                                                        ?>>
                </th>
                <th>
                    <label for="fechaPro" class="text-white">
                        <i class="fas fa-calendar"></i> Fecha de nacimmiento (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="date" class="form-control" id="fechaPro" name="fechaPro" <?php
                                                                                            $resultaFecha = date('Y-m-d', strtotime($verFecha));
                                                                                            echo "value='" . $resultaFecha . "'";
                                                                                            ?>>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="rutPro" class="text-white">
                        <i class="fas fa-address-card"></i> Rut (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="rutPro" id="rutPro" maxlength="9" placeholder="Ingresa su rut" <?php
                                                                                                                                    echo "value='" . $verRut . "'";
                                                                                                                                    ?>>
                </th>
                <th class="form-group">
                    <label for="telefonoPro" class="text-white">
                        <i class="fas fa-phone"></i> Teléfono (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="telefonoPro" id="telefonoPro" maxlength="12" placeholder="Ingresa su teléfono" <?php
                                                                                                                                                    echo "value='" . $vertel . "'";
                                                                                                                                                    ?>>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="mailPro" class="text-white">
                        <i class="fas fa-at"></i> Mail (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="email" class="form-control" name="mailPro" id="mailPro" maxlength="50" placeholder="Ingresa su correo" <?php
                                                                                                                                        echo "value='" . $verMail . "'";
                                                                                                                                        ?>>
                </th>
                <th class="form-group">
                    <label for="direccionPro" class="text-white">
                        <i class="fas fa-map"></i> Direccion (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="direccionPro" id="direccionPro" maxlength="100" placeholder="Ingresa su dirección" <?php
                                                                                                                                                        echo "value='" . $verDir . "'";
                                                                                                                                                        ?>>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="areaPro" class="text-white">
                        <i class="fas fa-chalkboard"></i> Área docente (<i class="fa-solid fa-asterisk fa-2xs"></i>):
                    </label>
                    <input type="text" class="form-control" name="areaPro" id="areaPro" maxlength="100" placeholder="Ingresa su Área docente" <?php
                                                                                                                                                echo "value='" . $verArea . "'";
                                                                                                                                                ?>>
                </th>
                <th>
                    <label for="otroPro" class="text-white">
                        <i class="fa-regular fa-comment"></i> Otros datos:
                    </label>
                    <input type="text" class="form-control" name="otroPro" id="otroPro" maxlength="100" placeholder="Ingrese" <?php
                                                                                                                                echo "value='" . $verOtro . "'";
                                                                                                                                ?>>
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