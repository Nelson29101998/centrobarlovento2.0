<option value="vacio" selected>Selección del mes</option>
<?php
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
?>

<option value="Enero" <?php echo $colorHoy1; ?>>Enero</option>

<option value="Febrero" <?php echo $colorHoy2; ?>>Febrero</option>

<option value="Marzo" <?php echo $colorHoy3; ?>>Marzo</option>

<option value="Abril" <?php echo $colorHoy4; ?>>Abril</option>

<option value="Mayo" <?php echo $colorHoy5; ?>>Mayo</option>

<option value="Junio" <?php echo $colorHoy6; ?>>Junio</option>

<option value="Julio" <?php echo $colorHoy7; ?>>Julio</option>

<option value="Agosto" <?php echo $colorHoy8; ?>>Agosto</option>

<option value="Septiembre" <?php echo $colorHoy9; ?>>Septiembre</option>

<option value="Octubre" <?php echo $colorHoy10; ?>>Octubre</option>

<option value="Noviembre" <?php echo $colorHoy11; ?>>Noviembre</option>

<option value="Diciembre" <?php echo $colorHoy12; ?>>Diciembre</option>