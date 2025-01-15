<?php
require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
include_once "../../../conectarSQL/conectar_SQL.php";

$taller = $_GET['verTaller'];
$sacarMes = $_GET['verMes'];
$sacarAno = $_GET['verAno'];

$buscarTaller = "SELECT * FROM tallertiempo 
                 WHERE taller='" . $taller . "' AND mes='" . $sacarMes . "' AND ano='" . $sacarAno . "'";

$resultado = mysqli_query($conexion, $buscarTaller) or die(mysqli_error($conexion));

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir estilo de encabezado
$headerStyle = [
    'font' => [
        'bold' => true,
        'color' => ['rgb' => 'FFFFFF'],
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => '4CAF50'],
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
    ],
];

// Definir estilo de celdas
$cellStyle = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
    ],
];

// Escribir los encabezados
$sheet->setCellValue('A1', 'Nombre');
$sheet->setCellValue('B1', 'Mes');
$sheet->setCellValue('C1', 'Año');
for ($i = 1; $i <= 31; $i++) {
    $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 3);
    $sheet->setCellValue($column . '1', $i);
}

// Aplicar estilos a los encabezados
$sheet->getStyle('A1:C1')->applyFromArray($headerStyle);
$sheet->getStyle('D1:' . $column . '1')->applyFromArray($headerStyle);

// Escribir los datos y aplicar estilos a las celdas
$rowNumber = 2;
if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_array($resultado)) {
        $sheet->setCellValue('A' . $rowNumber, $row['estudiante']);
        $sheet->setCellValue('B' . $rowNumber, $row['mes']);
        $sheet->setCellValue('C' . $rowNumber, $row['ano']);
        for ($i = 1; $i <= 31; $i++) {
            $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 3);
            $sheet->setCellValue($column . $rowNumber, $row[$i] === null ? '-' : ($row[$i] == 1 ? 'Asistencia' : 'Inasistencia'));
            $sheet->getStyle($column . $rowNumber)->applyFromArray($cellStyle);
        }
        $rowNumber++;
    }
}

// Ajustar el ancho de las columnas automáticamente
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
$filename = 'Asistencia_' . $taller . '_' . $sacarMes . '_' . $sacarAno . '.xlsx';
$writer->save($filename);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir al archivo Excel para descarga
header('Location: ' . $filename);
