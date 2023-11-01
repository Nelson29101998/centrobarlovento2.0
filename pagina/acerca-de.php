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

    <title>Acerca De</title>

    <?php
    //! Favicon
    $direccion = "../";
    include_once $direccion . "ajuste/favicon.php";
    ?>

    <style>
        #disenoLetra,
        label,
        p {
            font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
        }

        body {
            background-color: #2689F9;
        }

        #letraJusticia {
            text-align: justify;
            margin: 0 auto;
            width: 73em;
        }

        .navbar-nav {
            flex-direction: row;
        }

        .carousel {
            width: 50%;
            height: 50%;
            margin: 0 auto;
        }

        @media (max-width: 600px) {
            .carousel {
                width: 100%;
                height: 100%;
                margin: 0 auto;
            }
        }

        .carousel-indicators {
            width: auto;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include_once "../espacioHTML/techo.html";
        ?>

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark ">
            <div class="container-fluid">
                <button onclick="volverPag()" type="button" class="btn btn-primary navbar-btn">
                    <i class="fa-solid fa-house"></i> Inicio
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menus" aria-controls="menus" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="menus">
                <div class="p-2">
                    <button onclick="location.href='registrar/admst.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fa-solid fa-user-tie"></i> Administrador
                    </button>
                </div>
                <div class="p-2">
                    <button onclick="location.href='registrar/profesor.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fas fa-chalkboard-user"></i> Profesor
                    </button>
                </div>
                <div class="p-2">
                    <button onclick="location.href='registrar/usuario.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fa-solid fa-user"></i> Estudiante
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <div class="container">
        <div class="animate__animated animate__flipInX animate__delay-1s">
            <div class="text-center">
                <h1 id="disenoLetra" class="text-white">
                    ¡Bienvenidos a la Portada Administrativa del Centro Barlovento!
                </h1>
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid">
            <table class="text-light" id="letraJusticia">
                <tbody>
                    <tr>
                        <td>
                            <label>
                                Mi nombre es Nelson Mouat Vergara y te doy la bienvenida a esta plataforma web,
                                como
                                parte del <strong class="font-weight-bold">Proyecto de Mejora</strong> para
                                obtener el
                                <strong class="font-weight-bold">Título de Ingeniero en Informática</strong> en
                                el
                                Instituto IACC, Chile.
                            </label>
                            <br>
                            <label>
                                Esta plataforma administrativa está dirigida a la gestión de las listas de
                                estudiantes,
                                sus horarios y el control de asistencias.
                            </label>
                            <br>
                            <label>
                                El desarrollo de este proyecto beneficia al área administrativa del Centro
                                Barlovento y
                                en especial a la gestión de docencia.
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>

            <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../image/fotos/foto1.jpg" class="d-block w-100" alt="foto1">
                    </div>
                    <div class="carousel-item">
                        <img src="../image/fotos/foto2.jpg" class="d-block w-100" alt="foto2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <br>
            <div class="text-center text-light">
                <label>Muchas Gracias</label>
                <br>
                <strong class="font-weight-bold">Nelson Mouat Vergara</strong>
                <br>
                <label>nelsonmouatvergara@gmail.com</label>
                <br>
                <label>Agosto de 2022</label>
            </div>
        </div>
    </main>

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