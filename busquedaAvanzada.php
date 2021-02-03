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

    <section id="containerBusqueda">

        <!--    genre-->
        <div id="tablaGenero">
            <table id="genero">
                <thead>
                    <tr>
                        <td id="selectorAnime">anime</td>
                        <td id="selectorManga">manga</td>
                    </tr>
                </thead>
                <tr>
                    <td><input type="checkbox" class="genero">Acción</td>
                    <td><input type="checkbox" class="genero">Aventura</td>
                    <td><input type="checkbox" class="genero">Coches</td>
                    <td><input type="checkbox" class="genero">Comedia</td>
                    <td><input type="checkbox" class="genero">Demencia</td>
                    <td><input type="checkbox" class="genero">Demonios</td>
                    <td><input type="checkbox" class="genero">Misterio</td>
                    <td><input type="checkbox" class="genero">Drama</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="genero" hidden>Ecchi</td>
                    <td><input type="checkbox" class="genero">Fantasía</td>
                    <td><input type="checkbox" class="genero">Juegos</td>
                    <td><input type="checkbox" class="genero" hidden>Hentai</td>
                    <td><input type="checkbox" class="genero">Historia</td>
                    <td><input type="checkbox" class="genero">Horror</td>
                    <td><input type="checkbox" class="genero">Infantíl</td>
                    <td><input type="checkbox" class="genero">Magia</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="genero">Artes marciales</td>
                    <td><input type="checkbox" class="genero">Mecha</td>
                    <td><input type="checkbox" class="genero">Música</td>
                    <td><input type="checkbox" class="genero">Parodia</td>
                    <td><input type="checkbox" class="genero">Samurai</td>
                    <td><input type="checkbox" class="genero">Romance</td>
                    <td><input type="checkbox" class="genero">Escuela</td>
                    <td><input type="checkbox" class="genero">Ciencia ficción</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="genero">Shoujo</td>
                    <td><input type="checkbox" class="genero">Shoujo Ai</td>
                    <td><input type="checkbox" class="genero">Shounen</td>
                    <td><input type="checkbox" class="genero">Shounen Ai</td>
                    <td><input type="checkbox" class="genero">Espacio</td>
                    <td><input type="checkbox" class="genero">Deportes</td>
                    <td><input type="checkbox" class="genero">Super poderes</td>
                    <td><input type="checkbox" class="genero">Vampiros</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="genero">Yaoi</td>
                    <td><input type="checkbox" class="genero">Yuri</td>
                    <td><input type="checkbox" class="genero">Harem</td>
                    <td><input type="checkbox" class="genero">Slice of life</td>
                    <td><input type="checkbox" class="genero">Sobrenatural</td>
                    <td><input type="checkbox" class="genero">Militar</td>
                    <td><input type="checkbox" class="genero">Policiaco</td>
                    <td><input type="checkbox" class="genero">Psicológico</td>
                </tr>
                <tr id="generosDiferentes">
                    <td><input type="checkbox" class="genero">Thriller</td>
                    <td><input type="checkbox" class="genero">Seinen</td>
                    <td><input type="checkbox" class="genero">Josei</td>
                </tr>
            </table>
        </div>

        <div id="tablaOpcionales">
            <table id="opciones">
                <!--            order by-->
                <h3>Por favor, solo elija un checkbox por categoría en lo siguiente.</h3>
                <th>
                    <tr>
                        <td>Organizar por:</td>
                    </tr>
                </th>
                <tr>
                    <td><input type="checkbox" class="organizacion">Titulo</td>
                    <td><input type="checkbox" class="organizacion">Fecha de Inicio</td>
                    <td><input type="checkbox" class="organizacion">Fecha de final</td>
                    <td><input type="checkbox" class="organizacion">Puntuación</td>
                    <td><input type="checkbox" class="organizacion">Tipo</td>
                    <td><input type="checkbox" class="organizacion">Miembros</td>
                    <td><input type="checkbox" class="organizacion">Id</td>
                    <td class="orderDiferentes"><input type="checkbox" class="organizacion">Episodio</td>
                </tr>
                <tr>
                    <td class="orderDiferentes"><input type="checkbox" class="organizacion orderDiferentes">Rating</td>
                </tr>
                <!--            tipo-->
                <th>
                    <tr>
                        <td>Tipo</td>
                    </tr>
                </th>
                <tr>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">TV</td>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">OVA</td>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">Película</td>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">Especial</td>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">ONA</td>
                    <td class="tipoDiferente"><input type="checkbox" class="tipo">Música</td>
                </tr>
                <!--            status-->
                <th>
                    <tr>
                        <td>Estado</td>
                    </tr>
                </th>
                <tr>
                    <td class="estadoDiferente"><input type="checkbox" class="estado">En emisión</td>
                    <td class="estadoDiferente"><input type="checkbox" class="estado">Terminado</td>
                    <td class="estadoDiferente"><input type="checkbox" class="estado">Por emitir</td>
                </tr>
                <!--            sort-->
                <th>
                    <tr>
                        <td>Ordenar</td>
                    </tr>
                </th>
                <tr>
                    <td><input type="checkbox" class="sort">Ascendentemente</td>
                    <td><input type="checkbox" class="sort">Descendentemente</td>
                </tr>
                <!--    rated-->
                <th>
                    <tr class="clasi">
                        <td>Clasificación</td>
                    </tr>
                </th>
                <tr class="clasi">
                    <td><input type="checkbox" class="rated">G</td>
                    <td><input type="checkbox" class="rated">PG</td>
                    <td><input type="checkbox" class="rated">PG - 13</td>
                    <td><input type="checkbox" class="rated">R</td>
                    <td><input type="checkbox" class="rated">R+</td>
                    <td><input type="checkbox" class="rated">Rx</td>
                </tr>
                <!--            boton buscar-->
                <th>
                    <tr>
                        <td><input type="button" id="botoBusquedaAvanzada" value="Buscar"></td>
                    </tr>
                </th>
            </table>
        </div>

    </section>

    <section>

        <div id="contenedorResultadosBusqueda">

            <div id="gridTempResultados" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m" uk-grid>

            </div>

            <ul id="paginResultados">

            </ul>
        </div>

        <div id="contenedorTemp">

            <div id="gridTemp" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m uk-child-width-1-6@m" uk-grid>

            </div>

            <ul id="pagin">

            </ul>
        </div>
    </section>

</body>

</html>