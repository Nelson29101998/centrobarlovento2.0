<style>
    .colorGalleta {
        color: #E6CEA0;
        background-color: #19315F;
        border: 0px;
        border-radius: 10px;
    }
</style>
<?php
$verServer = $_SERVER['SERVER_NAME'];
if ($verServer == 'barlovento.herokuapp.com') {
    $sacar = "/";
} else {
    $sacar = "/centroBarlovento/";
}
//setcookie("Bienvenido", "hi", time() + (86400 * 30), "/");
if (count($_COOKIE) > 0 || !empty($_COOKIE['verVentana'])) {
    echo '<script>console.log("Cookies sopotadas")</script>';
} else {
    echo '<script>console.log("Cookies no sopotadas")</script>';
    if ($_SERVER["REQUEST_URI"] !== $sacar . "/" || $_SERVER["REQUEST_URI"] !== $sacar . "index.php") {
        setcookie('PHPSESSID', '', time() - 3600, '/');
?>
        <div class="modal fade" id="ventanaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tituloVentana"><i class="fas fa-cookie colorGalleta"></i> Avisar Cookies</h5>
                    </div>
                    <div class="modal-body">
                        <p>Utilizamos cookies para optimizar nuestro sitio web y nuestro servicio.</p>
                        <a class="learn-more" href="pagina/politica-cookies.php">Leer más <i class="fa fa-angle-right ml-2"></i></a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="noGracias()">
                            No, Gracias
                        </button>
                        <button type="button" class="btn btn-primary" onclick="cerrarVentanaOk()">
                            <i class="fas fa-cookie-bite colorGalleta"></i> Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            var myModal = new bootstrap.Modal(document.getElementById("ventanaModal"));
            document.onreadystatechange = function() {
                setTimeout(() => {
                    myModal.show();
                }, 1700);
            }

            function cerrarVentanaOk() {
                var now = new Date();
                var time = now.getTime();
                var expireTime = time + 30000 * 36000; //* (30000) es 30 dias y (36000) es un dias.
                now.setTime(expireTime);
                document.cookie = "verVentana=Aceptar; expires=" + now.toUTCString() + "; path=/";
                myModal.hide();
            }

            function noGracias() {
                myModal.hide();
            }
        </script>
<?php
    }
}
?>