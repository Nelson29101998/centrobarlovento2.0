<form id="formPro" name="formPro" onsubmit="return true" method="post" action="subirSql/actualizarSqlBanco.php?idRut=
<?php echo $verRut . "Bank" ?>">
    <table>
        <thead>
            <tr>
                <th>
                    <h5>Editar de Datos Banco</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="form-group">
                <th>
                    <label for="bancoPro" class="text-white">
                        <i class="fa-solid fa-building-columns"></i> Banco:
                    </label>
                    <input type="text" class="form-control" name="bancoPro" id="bancoPro" maxlength="50" placeholder="Ingresa su Banco" <?php
                                                                                                                                        if (!empty($verNomBanco)) {
                                                                                                                                            echo "value='" . $verNomBanco . "'";
                                                                                                                                        }
                                                                                                                                        ?>>
                </th>
                <th>
                    <label for="tipoBanc" class="text-white">
                        <i class="fa-solid fa-piggy-bank"></i> Tipo de cuenta (Corrioente, Vista, RUT):
                    </label>
                    <select class="form-select" name="tipoBanc" id="tipoBanc">
                        <?php
                        if ($verTipoBanco == "Corrioente") {
                        ?>
                            <option>Seleccion de tipo de cuenta</option>
                            <option selected value="Corrioente">Corrioente</option>
                            <option value="Vista">Vista</option>
                            <option value="RUT">RUT</option>
                        <?php
                        } else if ($verTipoBanco == "Vista") {
                        ?>
                            <option>Seleccion de tipo de cuenta</option>
                            <option value="Corrioente">Corrioente</option>
                            <option selected value="Vista">Vista</option>
                            <option value="RUT">RUT</option>
                        <?php
                        } else if ($verTipoBanco == "RUT") {
                        ?>
                            <option>Seleccion de tipo de cuenta</option>
                            <option value="Corrioente">Corrioente</option>
                            <option value="Vista">Vista</option>
                            <option selected value="RUT">RUT</option>
                        <?php
                        } else {
                        ?>
                            <option selected>Seleccion de tipo de cuenta</option>
                            <option value="Corrioente">Corrioente</option>
                            <option value="Vista">Vista</option>
                            <option value="RUT">RUT</option>
                        <?php

                        }
                        ?>
                    </select>
                    <br>
                    <input type="text" class="form-control" name="tipoDatoPro" id="tipoDatoPro" maxlength="30" placeholder="Ingresa su codigo" <?php
                                                                                                                                                if (!empty($verCodeBanco)) {
                                                                                                                                                    echo "value='" . $verCodeBanco . "'";
                                                                                                                                                }
                                                                                                                                                ?>>
                </th>
            </tr>
            <tr class="form-group">
                <th>
                    <label for="nombreBanco" class="text-white">
                        <i class="fa-regular fa-address-card"></i> A nombre de:
                    </label>
                    <input type="text" class="form-control" name="nombreBanco" id="nombreBanco" maxlength="50" placeholder="Ingresa su nombre" <?php
                                                                                                                                                if (!empty($verNomRealBanco)) {
                                                                                                                                                    echo "value='" . $verNomRealBanco . "'";
                                                                                                                                                }
                                                                                                                                                ?>>
                </th>
                <th>
                    <label for="rutBanco" class="text-white">
                        <i class="fa-solid fa-id-card"></i> RUT:
                    </label>
                    <input type="text" class="form-control" name="rutBanco" id="rutBanco" maxlength="12" placeholder="Ingresa su rut" <?php
                                                                                                                                        if (!empty($verRutBanco)) {
                                                                                                                                            echo "value='" . $verRutBanco . "'";
                                                                                                                                        }
                                                                                                                                        ?>>
                </th>
            </tr>
            <tr>
                <th>
                    <label for="mailBanco" class="text-white">
                        <i class="fas fa-at"></i> Mail:
                    </label>
                    <input type="email" class="form-control" name="mailBanco" id="mailBanco" maxlength="50" placeholder="Ingresa su correo" <?php
                                                                                                                                            if (!empty($verMailBanco)) {
                                                                                                                                                echo "value='" . $verMailBanco . "'";
                                                                                                                                            }
                                                                                                                                            ?>>
                </th>
                <th>
                    <label for="ObserBanco" class="text-white">
                        <i class="fa-solid fa-box-archive"></i> Observaciones:
                    </label>
                    <input type="text" class="form-control" name="ObserBanco" id="ObserBanco" maxlength="100" placeholder="Ingresa su Observaciones" <?php
                                                                                                                                                        if (!empty($verObsBanco)) {
                                                                                                                                                            echo "value='" . $verObsBanco . "'";
                                                                                                                                                        }
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