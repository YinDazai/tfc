<?php
header("Access-Control-Allow-Origin: *");
session_start();
include_once("conexion.php");

if (isset($_POST['registrarse'])) {

    registrarse($conn);
} else if (isset($_POST["inicioSesion"])) {

    inicioSesion($conn);
} else if (isset($_POST["cerrarSesion"])) {

    cerrarSesion();
} else if (isset($_POST["nombre"])) {

    $nom = $_POST["nombre"];
    if (isset($_SESSION["usuario"])) {

        guardar($conn, $nom);
    } else {

        echo "Por favor, inicie sesión para poder seguir.";
    }
} else if (isset($_POST["revisar"])) {

    $nom = $_POST["revisar"];
    $nombreUsu = $_SESSION["usuario"];

    //revisar si ya está
    $select = "SELECT * FROM favoritos WHERE nombreUsuario = '$nombreUsu' AND nombre = '$nom'";
    $result_check = $conn->query($select);

    if ($result_check->num_rows != 0) {

        echo "true";
    } else {

        echo "also";
    }
}

function registrarse($conn)
{
    if ($_POST['contra'] !== $_POST['contraConf']) {

        echo 'Las contraseñas deben coincidir.';
        header("Location: ../login.php");
    } else {

        $nombre = ($_POST['nombre']);
        $apellido = ($_POST['apellido']);
        $email = ($_POST['email']);
        $usuario = ($_POST['nombreUsuario']);
        $contra = ($_POST['contra']);

        $insertUsuario = "INSERT INTO usuarios (id_usuario, nombre, apellido, nombre_usuario, email, contra) 
        VALUES (0,'$nombre','$apellido','$usuario','$email','$contra')";

        $sql_check = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario';";

        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows != 0) {

            echo 'El usuario ya existe.';
        } else {

            if ($conn->query($insertUsuario)) {

                echo 'Tu usuario ha sido registrado correctamente ' . $usuario;
                $_SESSION["usuario"] = $_POST['nombreUsuario'];
                header("Location: ../index.php");
            } else {

                echo "Error: " . $insertUsuario . "<br>" . $conn->error;
            }
        }
    }
}
function inicioSesion($conn)
{
    $usuario = $_POST['nombreUsuario'];
    $contra = $_POST['contra'];

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contra = '$contra';";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {

        echo "Revisa los datos introducidos";
    } else {

        echo "Acabas de iniciar sesion " . $usuario;
        $_SESSION["usuario"] = $_POST['nombreUsuario'];
        header("Location: ../index.php");
    }
}
function cerrarSesion()
{
    unset($_SESSION["usuario"]);
    header("Location: ../index.php");
}
function guardar($conn, $nom)
{
    $nombreUsu = $_SESSION["usuario"];

    //revisar si ya está
    $select = "SELECT * FROM favoritos WHERE nombreUsuario = '$nombreUsu' AND nombre = '$nom'";
    $result_check = $conn->query($select);

    if ($result_check->num_rows < 1) {

        $insert = "INSERT INTO favoritos (id, nombreUsuario, nombre)
        VALUES (0, '$nombreUsu', '$nom')";

        //EJECUTAR EL INSERT
        if ($conn->query($insert) === TRUE) {

            echo "New record created successfully";
        } else {

            echo "Error: " . $insert . "<br>" . $conn->error;
        }
    } else {

        $delete = "DELETE FROM favoritos WHERE nombreUsuario = '$nombreUsu' AND nombre = '$nom'";

        if ($conn->query($delete)  === TRUE) {

            echo "Dejado de seguir.";
        } else {

            echo "Error: " . $delete . "<br>" . $conn->error;
        }
    }
}
