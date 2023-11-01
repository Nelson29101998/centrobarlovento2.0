<?php
$selecion0 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "vacio") {
        $selecion0 = "selected";
    } else {
        $selecion0 = "";
    }
}

echo "<option value='vacio' " . $selecion0 . ">Selección del mes</option>";

$colorHoy1 = "";
$colorHoy2 = "";
$colorHoy3 = "";
$colorHoy4 = "";
$colorHoy5 = "";
$colorHoy6 = "";
$colorHoy7 = "";
$colorHoy8 = "";
$colorHoy9 = "";
$colorHoy10 = "";
$colorHoy11 = "";
$colorHoy12 = "";

$month = date("n"); //Reemplazable por número del 1 a 12
$year = date("Y"); //Reemplazable por un año valido
switch (date('n', mktime(0, 0, 0, $month, 1, $year))) {
    case 1:
        $colorHoy1 = "class='bg-success text-white'";
        break;
    case 2:
        $colorHoy2 = "class='bg-success text-white'";
        break;
    case 3:
        $colorHoy3 = "class='bg-success text-white'";
        break;
    case 4:
        $colorHoy4 = "class='bg-success text-white'";
        break;
    case 5:
        $colorHoy5 = "class='bg-success text-white'";
        break;
    case 6:
        $colorHoy6 = "class='bg-success text-white'";
        break;
    case 7:
        $colorHoy7 = "class='bg-success text-white'";
        break;
    case 8:
        $colorHoy8 = "class='bg-success text-white'";
        break;
    case 9:
        $colorHoy9 = "class='bg-success text-white'";
        break;
    case 10:
        $colorHoy10 = "class='bg-success text-white'";
        break;
    case 11:
        $colorHoy11 = "class='bg-success text-white'";
        break;
    case 12:
        $colorHoy12 = "class='bg-success text-white'";
        break;
};


$selecion1 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Enero") {
        $selecion1 = "selected";
    } else {
        $selecion1 = "";
    }
}

echo "<option value='Enero' " . $colorHoy1 . " " . $selecion1 . ">Enero</option>";

$selecion2 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Febrero") {
        $selecion2 = "selected";
    } else {
        $selecion2 = "";
    }
}
echo "<option value='Febrero' " . $colorHoy2 . " " . $selecion2 . ">Febrero</option>";

$selecion3 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Marzo") {
        $selecion3 = "selected";
    } else {
        $selecion3 = "";
    }
}
echo "<option value='Marzo' " . $colorHoy3 . " " . $selecion3 . ">Marzo</option>";

$selecion4 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Abril") {
        $selecion4 = "selected";
    } else {
        $selecion4 = "";
    }
}
echo "<option value='Abril' " . $colorHoy4 . " " . $selecion4 . ">Abril</option>";

$selecion5 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Mayo") {
        $selecion5 = "selected";
    } else {
        $selecion5 = "";
    }
}
echo "<option value='Mayo' " . $colorHoy5 . " " . $selecion5 . ">Mayo</option>";

$selecion6 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Junio") {
        $selecion6 = "selected";
    } else {
        $selecion6 = "";
    }
}
echo "<option value='Junio' " . $colorHoy6 . " " . $selecion6 . ">Junio</option>";


$selecion7 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Julio") {
        $selecion7 = "selected";
    } else {
        $selecion7 = "";
    }
}
echo "<option value='Julio' " . $colorHoy7 . " " . $selecion7 . ">Julio</option>";

$selecion8 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Agosto") {
        $selecion8 = "selected";
    } else {
        $selecion8 = "";
    }
}
echo "<option value='Agosto' " . $colorHoy8 . " " . $selecion8 . ">Agosto</option>";

$selecion9 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Septiembre") {
        $selecion9 = "selected";
    } else {
        $selecion9 = "";
    }
}
echo "<option value='Septiembre' " . $colorHoy9 . " " . $selecion9 . ">Septiembre</option>";

$selecion10 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Octubre") {
        $selecion10 = "selected";
    } else {
        $selecion10 = "";
    }
}
echo "<option value='Octubre' " . $colorHoy10 . " " . $selecion10 . ">Octubre</option>";

$selecion11 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Noviembre") {
        $selecion11 = "selected";
    } else {
        $selecion11 = "";
    }
}
echo "<option value='Noviembre' " . $colorHoy11 . " " . $selecion11 . ">Noviembre</option>";

$selecion12 = "";
if (!empty($_GET['verMes'])) {
    if ($_GET['verMes'] == "Diciembre") {
        $selecion12 = "selected";
    } else {
        $selecion12 = "";
    }
}
echo "<option value='Diciembre' " . $colorHoy12 . " " . $selecion12 . ">Diciembre</option>";
