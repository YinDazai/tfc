<?php
include_once("php/function.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- uikit -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit-icons.min.js"></script>
    <!--css-->
    <link rel="stylesheet" type="text/css" href="styles/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/modulosCss/barra.css">
    <link rel="stylesheet" type="text/css" href="styles/modulosCss/slider.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <!-- js -->
    <script src="js/slider.js"></script>
    <title>Document</title>
</head>

<body>

    <header>
        <nav id="barraNav">

            <div class="contenedorNav">
                <div id="enlaces" class="botonesEnlace">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="busquedaAvanzada.php">Busqueda avanzada</a></li>
                    </ul>
                </div>

                <div id="barraBusqueda">
                    <form method="GET" id="formBusqueda" name="busqueda">
                        <ul>
                            <li><input type="text" id="inputBusqueda" name="textBusqueda" /></li>
                            <li><input type="button" name="submit" id="botonBusqueda" value="enviar"></li>
                        </ul>
                    </form>
                </div>

                <div id="login">
                    <div id="contenedorLogin" class="botonesEnlace">
                        <ul><?php if (isset($_SESSION["usuario"])) {

                                echo "<li><a href='login.php'>" . $_SESSION["usuario"] . "</a></li>";
                            } else {

                                echo '<li><a href="login.php">Login</a></li>';
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!--dias de la semana-->
    <section id="sliderDiaSemana">

        <div id="diaSemana" class="mx-auto" style="width: 660px;">
            <h2>Estrenos de la semana</h2>
            <ul class="list-group list-group-horizontal">
                <li class="dia list-group-item">Lunes</li>
                <li class="dia list-group-item">Martes</li>
                <li class="dia list-group-item">Miércoles</li>
                <li class="dia list-group-item">Jueves</li>
                <li class="dia list-group-item">Viernes</li>
                <li class="dia list-group-item">Sábado</li>
                <li class="dia list-group-item">Domingo</li>
            </ul>
        </div>

        <div uk-slider id="slider">

            <div class="uk-position-relative">

                <div class="uk-slider-container uk-light">

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m" id="listItem"></ul>
                    li
                </div>

                <div class="uk-hidden@s uk-light">
                    <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

                <div class="uk-visible@s">
                    <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

            </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>

    </section>

    <!--estrenos de la temporada-->
    <section id="tableTemporada">

        <div id="temporadas" class="mx-auto" style="width: 660px;">
            <h2>Estrenos de la Temporada</h2>
            <ul class="list-group list-group-horizontal">
                <li class="temp list-group-item">Invierno</li>
                <li class="temp list-group-item">Primavera</li>
                <li class="temp list-group-item">Verano</li>
                <li class="temp list-group-item">Otoño</li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="tipo list-group-item">Anime</li>
                <li class="tipo list-group-item">ONA</li>
                <li class="tipo list-group-item" hidden>OVA</li>
                <li class="tipo list-group-item">Película</li>
                <li class="tipo list-group-item">Especial</li>
            </ul>
        </div>

        <div id="contenedorTemp">

            <div id="gridTemp" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m uk-child-width-1-6@m" uk-grid>

            </div>

            <ul id="pagin" class="list-group list-group-horizontal">

            </ul>
        </div>

    </section>

    <!--top de siempre-->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>