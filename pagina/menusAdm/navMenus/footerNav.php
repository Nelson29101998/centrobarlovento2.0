<?php
if ($_SESSION["usuario"] === "tinBarlovento") {
    $mbytes = number_format($tamano / (1024 * 1024), 2);
    $totalPorct = 0;
    $totalPorct = (100 * $mbytes) / $tamanoMax;
?>
    <div class="container-fluid">
        Espacio de la base de datos
        <br>
        <div class="progress" style="height: 15px; border-radius: 10px;">
            <?php
            if ($totalPorct < 50) {
                $colorLetra = '';
                $palabra = '';
            }
            if ($totalPorct >= 50 && $totalPorct < 90) {
                $colorLetra = 'bg-warning';
                $palabra = 'Queda poca espacio';
            }
            if ($totalPorct >= 90) {
                $colorLetra = 'bg-danger';
                $palabra = 'Esta lleno espacio';
            }
            echo "<div class='progress-bar " . $colorLetra . "' role='progressbar' style='width: " . $totalPorct . "%; border-radius: 10px;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>
                " . $palabra . "
                </div>";
            ?>
        </div>
        <?php
        echo $mbytes . " MB / " . $tamanoMax . " MB";
        ?>
    </div>
<?php
}
?>