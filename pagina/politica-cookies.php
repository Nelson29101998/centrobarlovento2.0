<?php
include_once "../ajuste/config.php";
$verServer = $_SERVER['SERVER_NAME'];
if ($verServer == 'barlovento.herokuapp.com') {
    $sacar = "../../";
} else {
    $sacar = "../../centroBarlovento/";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../disenoMejor/bootstrap/css/bootstrap.min.css">
    <script src="../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../disenoMejor/fontawesome/css/all.min.css">
    <script script="../disenoMejor/fontawesome/js/all.min.js"></script>

    <link rel="stylesheet" href="../disenoMejor/MDBootstrap/css/mdb.min.css">
    <script rel="stylesheet" href="../disenoMejor/MDBootstrap/js/mdb.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Política de Cookies</title>

    <?php
    //! Favicon
    $direccion = "../";
    include_once $direccion . "ajuste/favicon.php";
    ?>

    <link rel="stylesheet" href="css/disenoPolitica.css?v=<?php echo $version; ?>">
</head>

<body>
    <br>
    <div class="container">
        <div class="text-center">
            <h1 id="disenoLetra" class="text-white">
                Política de Cookies
            </h1>
        </div>
    </div>
    <main style="font-size: 20px">
        <div class="container">
            <table class="text-light" id="letraJusticia">
                <tbody>
                    <tr>
                        <td>
                            <label>
                                La finalidad de la Política de Cookies es la de informar a los
                                usuarios sobre los procedimientos que se realizan para la recogida,
                                por medio de cookies y/o otras tecnologías de monitoreo, de informaciones
                                que se recaban al acceder al sitio web <?php echo "<a href='" . $sacar . "'>
                                <u>" . $verServer . "</u>
                                </a>"; ?>
                                (en adelante el <strong class="font-weight-bold">“Sitio”</strong>).
                            </label>
                            <br>
                            <ol>
                                <li>
                                    <strong class="font-weight-bold">
                                        Definición de Cookies
                                    </strong>
                                    <ol>
                                        <li>
                                            Las cookies son ficheros de textos pequeñas dimensiones que las
                                            páginas web visitadas por el usuario envían al dispositivo
                                            utilizado (por ejemplo computador, tablet, smartphone, notebook,
                                            etc.) donde son almacenadas para luego ser retransmitidas a las
                                            mismas páginas a las que el usuario accederá posteriormente.
                                            Las cookies pueden requerir con antelación el consentimiento
                                            del usuario.
                                        </li>
                                        <li>
                                            Las cookies permiten identificar el dispositivo en el que se
                                            encuentran almacenadas durante todo el período de validez o de
                                            registro. Durante la visita al Sitio, las informaciones relativas
                                            a los datos de navegación enviadas por el dispositivo del usuario,
                                            podrían quedar archivadas como “cookies” instaladas en el mismo.
                                        </li>
                                        <li>
                                            Las funciones de las cookies son varias y permiten una navegación
                                            más eficiente en el Sitio, pues recuerdan las preferencias del
                                            usuario y mejoran la experiencia de navegación. Además pueden
                                            contribuir a personalizar los avisos publicitarios que aparecen
                                            durante la navegación y las actividades de marketing dirigidas al
                                            usuario, asegurando que las mismas sean conforme a sus intereses y a
                                            sus preferencias.
                                        </li>
                                        <li>
                                            Es posible modificar la configuración de las cookies en todo momento.
                                            A continuación, se proporciona más información sobre las cookies
                                            utilizadas por el Sitio y cómo administrar la configuración de las
                                            mismas.
                                        </li>
                                        <li>
                                            Se aclara que cualquier Dato Personal proporcionado o recopilado
                                            mediante las operaciones realizadas en el Sitio Centro Barlovento
                                            será tratado por Centro Barlovento o por otra empresa debidamente
                                            autorizada por Centro Barlovento a tal efecto.
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <strong class="font-weight-bold">
                                        Finalidades y tipología de Cookies utilizadas
                                    </strong>
                                    <ol>
                                        <li>
                                            Cuando se accede al Sitio por medio de un navegador, podrían
                                            instalarse en el dispositivo del usuario, cookies cuya finalidad es
                                            la de reconocer el dispositivo utilizado, para garantizar la
                                            navegación del Sitio durante el período de validez de las cookies y
                                            recoger informaciones sobre los accesos al Sitio.
                                        </li>
                                        <li>
                                            Durante la navegación en el Sitio, el usuario puede recibir en su
                                            dispositivo cookies enviadas desde otros sitios o servidores
                                            diferentes (el adelante <strong class="font-weight-bold">
                                                “terceros”</strong>),
                                            en los que puede encontrar algunos elementos (tales como, imágenes,
                                            mapas, sonidos, links específicos y páginas de otros dominios) que
                                            se encuentran presentes en la página que está visitando. Entonces,
                                            las cookies bajo este perfil pueden ser:
                                            <ol>
                                                <li>
                                                    <strong class="font-weight-bold">Cookies propias</strong>,
                                                    enviadas directamente por Centro Barlovento al dispositivo
                                                    del usuario.
                                                </li>
                                                <li>
                                                    <strong class="font-weight-bold">Cookies de terceros</strong>,
                                                    provienen de terceros pero son enviadas por cuenta de Centro
                                                    Barlovento.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <strong class="font-weight-bold">
                                                Según la finalidad de utilización de las cookies, se pueden
                                                distinguir entre:
                                            </strong>
                                            <ol>
                                                <li>
                                                    <u>Cookies Técnicas:</u> Su uso es limitado estrictamente
                                                    a la transmisión de datos identificadores de sesión (números
                                                    aleatorios generados por el servidor), necesarios para
                                                    permitir una exploración segura y eficiente del Sitio; el
                                                    dispositivo del usuario no almacena ni memoriza los datos en
                                                    forma permanente, y se pierden al cerrar el navegador. La
                                                    finalidad de estas cookies es la seguridad y mejora del
                                                    servicio ofrecido. Su uso no requiere la obtención del
                                                    consentimiento del usuario.
                                                </li>
                                                <li>
                                                    <u>Cookies Analíticas:</u> Centro Barlovento utiliza cookies
                                                    de análisis con el objeto de analizar el número de usuarios
                                                    y las modalidades de uso del Sitio. Estas informaciones son
                                                    recogidas de forma agrupada. En este caso, son comparables a
                                                    las cookies técnicas y no requieren la obtención de
                                                    consentimiento del usuario, en caso contrario, se permite su
                                                    uso con la autorización previa del usuario (por ejemplo,
                                                    cookies analíticas de un tercero que las combina con otros
                                                    tratamientos).
                                                </li>
                                                <li>
                                                    <u>Cookies de Perfilamiento:</u> Esta tipología de cookies
                                                    tiene la finalidad de crear perfiles relacionados con el
                                                    usuario y de enviar mensajes publicitarios según las
                                                    preferencias manifestadas por el mismo durante la navegación
                                                    en la web o para mejorar su experiencia de navegación. Su
                                                    uso requiere la obtención del consentimiento del usuario.
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <strong class="font-weight-bold">
                                        Gestión de las Cookies por medio del Cookie Consent Management
                                    </strong>
                                    <ol>
                                        El usuario puede seleccionar sus preferencias de cookies a través de la
                                        cookie de banner de gestión de consentimiento. Posteriormente el usuario
                                        siempre podrá actualizar sus preferencias.
                                    </ol>
                                </li>
                                <li>
                                    <strong class="font-weight-bold">
                                        Gestión de las Cookies por medio de la Configuraicón del Navegador
                                    </strong>
                                    <ol>
                                        <li>
                                            Casi todos los navegadores de internet permiten verificar las
                                            cookies instaladas en su dispositivo, bloquear todas las cookies
                                            o recibir un aviso cada vez que se instala una nueva. Sin embargo,
                                            en algunos casos, si algunas cookies no se encuentran instaladas,
                                            puede resultar imposible utilizar algunas sesiones del Sitio.
                                        </li>
                                        <li>
                                            A continuación, se indican las diferentes modalidades que los
                                            principales navegadores ofrecen para permitir al usuario manifestar
                                            sus propias opciones con relación al uso de las cookies:
                                            <ul type="disc">
                                                <li>
                                                    Internet Explorer:
                                                    <a href="https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies#ie=ie-11" target="_blank">
                                                        <u>https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies#ie=ie-11</u>
                                                    </a>
                                                </li>
                                                <li>
                                                    Chrome:
                                                    <a href="https://support.google.com/chrome/answer/95647?hl=es" target="_blank">
                                                        <u>https://support.google.com/chrome/answer/95647?hl=es</u>
                                                    </a>
                                                </li>
                                                <li>
                                                    Firefox:
                                                    <a href="https://support.mozilla.org/es/kb/cookies-informacion-que-los-sitios-web-guardan-en-" target="_blank">
                                                        <u>https://support.mozilla.org/es/kb/cookies-informacion-que-los-sitios-web-guardan-en-</u>
                                                    </a>
                                                </li>
                                                <li>
                                                    Opera:
                                                    <a href="https://help.opera.com/en/latest/web-preferences/#cookies" target="_blank">
                                                        <u>https://help.opera.com/en/latest/web-preferences/#cookies</u>
                                                    </a>
                                                </li>
                                                <li>
                                                    Safari:
                                                    <a href="https://support.apple.com/es-es/HT201265" target="_blank">
                                                        <u>https://support.apple.com/es-es/HT201265</u>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Si se utiliza un dispositivo móvil, es necesario buscar en el manual
                                            de instrucciones, la sección dedicada a la gestión de las cookies.
                                        </li>
                                        <li>
                                            Para mayor información sobre cómo visualizar las cookies
                                            configuradas en su dispositivo, su gestión y cómo eliminarlas,
                                            visite a la
                                            <a href="https://allaboutcookies.org/es" target="_blank">
                                                <u>https://allaboutcookies.org/es</u>
                                            </a>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <br>
    <div class="text-center">
        <button onclick="volverPag()" type="button" class="btn btn-primary">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </div>

    <br>
    <?php
    include_once "../espacioHTML/footers.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function volverPag(event) {
            if ('referrer' in document) {
                window.location = document.referrer;
                /* OR */
                //location.replace(document.referrer);
            } else {
                window.history.back();
            }
        }
    </script>
</body>

</html>