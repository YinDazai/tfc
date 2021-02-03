<?php
include_once("function.php");

$nombreUsu = $_SESSION["usuario"];
$nom = $_POST["eliminar"];

$delete = "DELETE FROM favoritos WHERE nombreUsuario = '$nombreUsu' AND nombre = '$nom'";

if ($conn->query($delete)  === TRUE) {

    echo "Eliminado correctamente.";
} else {

    echo "Error: " . $delete . "<br>" . $conn->error;
}