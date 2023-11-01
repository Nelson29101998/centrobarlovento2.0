<?php
$selecion0 = "";
if (!empty($_GET['verAno'])) {
    if ($_GET['verAno'] == "vacio") {
        $selecion0 = "selected";
    } else {
        $selecion0 = "";
    }
}

echo "<option value='vacio' " . $selecion0 . ">Selección del año</option>";

$anoEmpiezoBarlovento = 2018;
$anoAhora = date("Y");

$selecionEsteAno = "";
$colorAno = "";
for ($i = $anoEmpiezoBarlovento; $i <= $anoAhora; $i++) {
    if (!empty($_GET['verAno'])) {
        if ($_GET['verAno'] == $i) {
            $selecionEsteAno = "selected";
        } else {
            $selecionEsteAno = "";
        }
    }

    if ($i == $anoAhora) {
        $colorAno = "class='bg-success text-white'";
    } else {
        $colorAno = "";
    }

    echo "<option value='" . $i . "' " . $colorAno . " " . $selecionEsteAno . ">" . $i . "</option>";
}
