<?php
include_once("php/function.php");
?>

<!DOCTYPE html>
<html lang="en">

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

    <section id="login">

        <?php if (!isset($_SESSION["usuario"])) { ?>

            <form method="POST" action="php/function.php">
                <div class="formulario">
                    <h3>Por favor, regístrese</h3>
                    <table>
                        <tr>
                            <td><label for="nombre"><b>Ingrese su nombre:</b></label></td>
                            <td><input type="text" name="nombre" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><label for="apellido"><b>Ingrese su apellido:</b></label></td>
                            <td><input type="text" name="apellido" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><label for="email"><b>Ingrese su correo:</b></label></td>
                            <td><input type="text" name="email" required maxlength="50"></td>
                        </tr>
                        <tr>
                            <td><label for="nombreUsuario"><b>Ingrese un nombre de usuario:</b></label></td>
                            <td><input type="text" name="nombreUsuario" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><label for="contra"><b>Ingrese su contraseña:</b></label></td>
                            <td><input type="text" name="contra" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><label for="contraConf"><b>Confirme la contraseña:</b></label></td>
                            <td><input type="text" name="contraConf" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="registrarse" value="Confirmar"></td>
                        </tr>
                        <tr>
                            <td class="alerta"><?php $contraError ?></td>
                        </tr>
                    </table>
                </div>
            </form>

            <form method="POST" action="php/function.php">
                <div class="formulario">
                    <h3>Inicie sesión</h3>
                    <table>
                        <tr>
                            <td><label for="nombreUsuario"><b>Ingrese un nombre de usuario:</b></label></td>
                            <td><input type="text" name="nombreUsuario" required maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><label for="contra"><b>Ingrese su contraseña:</b></label></td>
                            <td><input type="text" name="contra" required maxlength="20"></td>
                        </tr>
                        <td><input type="submit" name="inicioSesion" value="Confirmar"></td>
                        </tr>
                        <tr>
                            <td class="alerta"></td>
                        </tr>
                    </table>
                </div>
            </form>

        <?php } else { ?>

            <form method="POST" action="php/function.php">
                <table>
                    <tr>
                        <td><input type="submit" name="cerrarSesion" value="Cerrar sesión"></td>
                    </tr>
                </table>
            </form>
            <table>
                <th>
                    <tr>
                        <td>Nombre</td>
                        <td></td>
                    </tr>
                </th>
            </table>
            <table id="listaGuardados">
            </table>

        <?php } ?>

    </section>

</body>

</html>