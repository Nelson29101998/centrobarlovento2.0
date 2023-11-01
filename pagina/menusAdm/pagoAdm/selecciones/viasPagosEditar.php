<option value="vacio">Selección de la vía de pago</option>
<?php
if (isset($row['viaPago'])) {
    if ($row['viaPago'] == "Transferencia") {
?>
        <option value="Transferencia" selected>Transferencia</option>
        <option value="Cheque">Cheque</option>
        <option value="Otro">Otro</option>
    <?php
    }

    if ($row['viaPago'] == "Cheque") {
    ?>
        <option value="Transferencia">Transferencia</option>
        <option value="Cheque" selected>Cheque</option>
        <option value="Otro">Otro</option>
    <?php
    }

    if ($row['viaPago'] == "Otro") {
    ?>
        <option value="Transferencia">Transferencia</option>
        <option value="Cheque">Cheque</option>
        <option value="Otro" selected>Otro</option>
<?php
    }
}
?>