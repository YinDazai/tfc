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

    <div id="contenedorSelectorBusqueda">
        <table>
            <tr>
                <td class="selectorBusqueda">Anime</td>
                <td class="selectorBusqueda">Manga</td>
            </tr>
        </table>
    </div>

    <div id="contenedorTemp">

        <div id="gridTemp" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m uk-child-width-1-6@m" uk-grid>

        </div>

        <ul id="pagin">

        </ul>
    </div>

</body>

</html>