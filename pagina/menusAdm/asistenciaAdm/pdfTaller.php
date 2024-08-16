<?php
include '../../../ajuste/TCPDF/tcpdf.php';

include_once "../../../conectarSQL/conectar_SQL.php";

$titulo = "Certificado de Asistencia de los Talleres";

$taller = $_GET['verTaller'];

$sacarMes = $_GET['verMes'];

$sacarAno = $_GET['verAno'];

$buscarTaller = "SELECT * FROM tallertiempo 
                    WHERE taller='" . $taller . "' AND mes='" . $sacarMes . "' AND ano='" . $sacarAno . "'";

$resultadosTaller = mysqli_query($conexion, $buscarTaller);

$html = <<<EOD
<style>
  table {
    margin-left: auto;
    margin-right: auto;
  }

  th, td {
   border: 1px solid black;
   border-radius: 10px;
  }
 
  .tamanoNombre{
    font-size: 12px;
  }

  .containerTitulo {
    height: 50px;
   }

   .containerFilas {
    height: 65px;
   }

   span {
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
   }

   .inner:before {
    bottom: 0;
    border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
   }

   .inner:after {
    bottom: 0;
    right: 0;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
   }

</style>
<table>
    <thead>
        <tr>
            <th align="center" class="containerTitulo" colspan="4">
                <div class="inner">
                    <span>
                        <strong>Taller de $taller de $sacarMes de $sacarAno</strong>
                    </span> 
                </div>
            </th>
        </tr>
        <tr>
            <th class="containerTitulo">
                <div class="inner" align="center">
                    <strong>Nombre:</strong>
                </div>
            </th>
            <th class="containerTitulo">
                <div class="inner" align="center">
                    <strong>Taller:</strong>
                </div>
            </th>
            <th class="containerTitulo">
                <div class="inner" align="center">
                    <strong>Asistencia:</strong>
                </div>
            </th>
            <th class="containerTitulo">
                <div class="inner" align="center">
                    <strong>Inasistencia:</strong>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
EOD;

if (mysqli_num_rows($resultadosTaller) > 0) {
    while ($row = mysqli_fetch_array($resultadosTaller)) {
        $totalAsist = 0;
        $totalInast = 0;
        $totalAmbos = 0;
        $sumAsist = 1;
        $sumInast = 1;
        for ($i = 1; $i <= 31; $i++) {
            if($row[$i] == 1){
                $totalAsist += $sumAsist;
            }else if($row[$i] == 0 && $row[$i] != null){
                $totalInast += $sumInast;
            }
        }

        $totalAmbos = $totalAsist + $totalInast;

        $html .= <<<EOD
        <tr>
            <th  class="containerFilas" align="center">
                <div class="inner">
                    <div class="tamanoNombre">
                        $row[estudiante]
                    </div>
                </div>
            </th>
            <th class="containerFilas" align="center">
                <div class="inner">
                    <div class="tamanoNombre">
                        $row[taller]
                    </div>
                </div>
            </th>
            <th>
                <div class="inner" align="center">
                    <div class="tamanoNombre">
                        $totalAsist
                    </div>
                </div>
            </th>
            <th>
                <div class="inner" align="center">
                    <div class="tamanoNombre">
                        $totalInast
                    </div>
                </div>
            </th>
        </tr>
EOD;
    }
}

$html .= <<<EOD
        <tr>
            <th class="container" colspan="4">
                <div class="inner">
                    <div class="tamanoNombre">
                        Se extiende el presente documento para los fines que estime pertinente.
                        <br>
                        Saluda atentamente.
                    </div>
                </div>
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
$pdf->Output("Certificado_de_Asistencia_de_" . $taller .'_de_'. $sacarMes . '_de_' . $sacarAno . '.pdf', 'I');
