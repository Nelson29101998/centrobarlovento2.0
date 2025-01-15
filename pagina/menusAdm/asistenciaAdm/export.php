<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../../conectarSQL/conectar_SQL.php";
require_once '../../../ajuste/PhpXlsxGenerator.php';

$taller = $_GET['verTaller'];
$sacarMes = $_GET['verMes'];
$sacarAno = $_GET['verAno'];

$buscarTaller = "SELECT * FROM tallertiempo 
                    WHERE taller='" . $taller . "' AND mes='" . $sacarMes . "' AND ano='" . $sacarAno . "'";

function filterData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$filename = "Asistencia_" . date('Y-m-d') . ".xls";

$excelData[] = array('Nombre', 'Mes', 'Ano');

for ($i = 1; $i <= 31; $i++) {
    array_push($excelData[0], "Dia " . $i);
}

$query = $conexion->query($buscarTaller);
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $lineData = array(
            $row['estudiante'],
            $row['mes'],
            $row['ano']
        );

        for ($i = 1; $i <= 31; $i++) {
            if ($row[$i] == 1) {
                $lineData[] = "Asistencia";
            } else if ($row[$i] == 0 && $row[$i] != null) {
                $lineData[] = "Inasistencia";
            } elseif ($row[$i] == null) {
                $lineData[] = "-";
            }
        }

        $excelData[] = $lineData;
    }
}

$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($filename);

exit;
