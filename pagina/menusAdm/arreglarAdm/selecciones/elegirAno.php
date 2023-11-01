<option value="vacio" selected>Selección del ano</option>

<?php
$anoEmpiezoBarlovento = 2018;
$anoAhora = date("Y");

for ($i = $anoEmpiezoBarlovento; $i <= $anoAhora; $i++) {
    if ($i == $anoAhora) {
        $colorAno = "class='bg-success text-white'";
    } else {
        $colorAno = "";
    }

    echo "<option value='" . $i . "' " . $colorAno . ">" . $i . "</option>";
}
?>