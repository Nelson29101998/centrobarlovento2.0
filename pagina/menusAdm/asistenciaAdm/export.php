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
            $row['ano']
        );

        for ($i = 1; $i <= 31; $i++) {
            if($row[$i] == 1){
                $lineData[] = "Asistencia";
            }else if($row[$i] == 0 && $row[$i] != null){
                $lineData[] = "Inasistencia";
            }elseif($row[$i] == null){
                $lineData[] = "-";
            }
        }

        $excelData[] = $lineData; 
    }
}

$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 