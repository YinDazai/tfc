<?php
include_once("function.php");

$nombreUsu = $_SESSION["usuario"];

//revisar si ya está
$select = "SELECT nombre FROM favoritos WHERE nombreUsuario = '$nombreUsu'";
$result_check = $conn->query($select);

if ($result_check->num_rows > 0) {

    while ($row = $result_check->fetch_assoc()) {

        $resultado[] = $row["nombre"];
    }

    echo json_encode($resultado);
} else {

    echo "0 results";
}