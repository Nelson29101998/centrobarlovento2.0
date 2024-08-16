<?php
include_once "../../../conectarSQL/conectar_SQL.php";

require_once '../../../ajuste/PhpXlsxGenerator.php';

$taller = $_GET['verTaller'];

$sacarMes = $_GET['verMes'];

$sacarAno = $_GET['verAno'];

$buscarTaller = "SELECT * FROM tallertiempo 
                    WHERE taller='" . $taller . "' AND mes='" . $sacarMes . "' AND ano='" . $sacarAno . "'";

function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$filename = "Asistencia" . date('Y-m-d') . ".xls";

$excelData[] = array('Nombre', 'Mes', 'Ano', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');


$query = $conexion->query($buscarTaller);
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $lineData = array(
            $row['estudiante'],
            $row['mes'],
            $row['ano'],
            $row['1'],
            $row['2'],
            $row['3'],
            $row['4'],
            $row['5'],
            $row['6'],
            $row['7'],
            $row['8'],
            $row['9'],
            $row['10'],
            $row['11'],
            $row['12'],
            $row['13'],
            $row['14'],
            $row['15'],
            $row['16'],
            $row['17'],
            $row['18'],
            $row['19'],
            $row['20'],
            $row['21'],
            $row['22'],
            $row['23'],
            $row['24'],
            $row['25'],
            $row['26'],
            $row['27'],
            $row['28'],
            $row['29'],
            $row['30'],
            $row['31']
        );

        $excelData[] = $lineData; 
    }
}

$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 