<?php
include '../../../ajuste/TCPDF/tcpdf.php';
include_once "../../../conectarSQL/conectar_SQL.php";

$titulo = "Certificado de Asistencia";

$nomEst = $_GET['nomEst'];

$rut = $_GET["rut"];

$taller = $_GET['taller'];

$numAst = $_GET['numAst'];

$numIna = $_GET['numIna'];

$total = $numAst + $numIna;

$guardaMes = $_GET['revMes'];

$guardaAno = $_GET['revAno'];

$html = <<<EOD
<style>
  table {
    margin-left: auto;
    margin-right: auto;
    
  }
 
  .tamanoNombre{
    width: 12px
  }
</style>
<table>
    <thead>
        <tr>
            <th align="center">
                <strong>Certificado de Asistencia</strong> 
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <p>
                    Certifico que el (la) participante <strong>$nomEst</strong>, RUT: <strong>$rut</strong>
                </p>
                <p>
                    Tuvo la siguiente cantidad de presencialidad al taller: <strong>$taller</strong>
                </p>
                <p>
                    Mes: <strong>$guardaMes</strong> y Año: <strong>$guardaAno</strong>
                </p>
            </th>
        </tr>
        <tr>
            <th>
                <p>               
                    <ul>
                        <li>
                            <strong>Asistencia:</strong>  $numAst días.
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <strong>Inasistencia:</strong>  $numIna días.
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <strong>Total de clases:</strong>  $total días.
                        </li>
                    </ul>
                </p>
            </th>
        </tr>
        <tr>
            <th>
                Se extiende el presente documento para los fines que estime pertinente.
                <br>
                <br>
                Saluda atentamente.
            </th>
        </tr>
    </tbody>
</table>
EOD;

class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . '../../../../image/logo_barloventoAzul.jpg';
        $this->Image($image_file, 20, 10, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //Title
        $month = date("n"); //Reemplazable por número del 1 a 12
        $year = date("Y"); //Reemplazable por un año valido
        switch (date('n', mktime(0, 0, 0, $month, 1, $year))) {
            case 1:
                $MesAhora = "Enero";
                break;
            case 2:
                $MesAhora = "Febrero";
                break;
            case 3:
                $MesAhora = "Marzo";
                break;
            case 4:
                $MesAhora = "Abril";
                break;
            case 5:
                $MesAhora = "Mayo";
                break;
            case 6:
                $MesAhora = "Junio";
                break;
            case 7:
                $MesAhora = "Julio";
                break;
            case 8:
                $MesAhora = "Agosto";
                break;
            case 9:
                $MesAhora = "Septiembre";
                break;
            case 10:
                $MesAhora = "Octubre";
                break;
            case 11:
                $MesAhora = "Noviembre";
                break;
            case 12:
                $MesAhora = "Diciembre";
                break;
        };

        $fecha = date("d") . " de " . $MesAhora . " de " . date("Y");
        $this->Cell(0, 9, "Santiago, " . $fecha, 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-35);
        // Set font

        $html = '<hr>
        <br>
        <table>
            <thead>
                <tr>
                    <th align="center">
                        <strong>Tabancura 1515, 7650021 Vitacura, Región Metropolitana</strong>   
                        <p>
                            <strong>Centro Barlovento</strong>
                        </p>
                    </th>
                </tr>
            </thead>
        </table>';
        $this->writeHTML($html, true, false, true, false, '');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor("Cristina");
$pdf->SetTitle($titulo);
//* set margins o posicion en el centro.
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setFontSubsetting(true);
$pdf->SetFont('helvetica', 'I', 14);
$pdf->AddPage();
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Output("Certificado_de_Asistencia_de_" . $nomEst . '.pdf', 'I');
