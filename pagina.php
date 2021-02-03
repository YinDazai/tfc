<?php 
include_once("php/function.php");
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <!-- js -->
    <script src="js/slider.js"></script>
    <script src="js/busquedaAvanzada.js"></script>
    <script src="js/busqueda.js"></script>
    <script src="js/pagina.js"></script>
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

    <section id="respuesta">

        <div id="contenedorRespuesta">

            <div id="imgRespuesta">
                <img id="imagen" src="" alt="">
            </div>

            <div id="titleRespuesta" class="modelo">
                <h2 id="tituloRespuesta"></h2>
            </div>

            <div id="statusRespuesta" class="modelo">
                <div id="estadoRespuesta"></div>
            </div>

            <div id="rankRespuesta" class="modelo">
                <div id="rangoRespuesta"></div>
            </div>

            <div id="typeRespuesta" class="modelo">
                <div id="tipoRespuesta"></div>
            </div>

            <div id="episodioRespuesta" class="modelo">
                <div id="epiRespuesta"></div>
            </div>

            <div id="capitulosRespuesta" class="modelo">
                <div id="capRespuesta"></div>
            </div>

            <div id="scoreRespuesta" class="modelo">
                <div id="puntuacionRespuesta"></div>
            </div>

            <div id="genreRespuesta" class="modelo">
                <div id="generosRespuesta"></div>
            </div>

            <div id="studioRespuesta" class="modelo">
                <div id="estudioRespuesta"></div>
            </div>

            <div id="synopsisRespuesta" class="modelo">
                <div id="resumenRespuesta"></div>
            </div>

        </div>

        <!-- GUARDAR DESPUES -->
        <input type="button" name="guardar" id="botonGuardar" value="">
        <div id="alertaSeguir"></div>

    </section>

</body>

</html>