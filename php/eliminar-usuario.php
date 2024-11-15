<?php
include 'database.php';

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM usuario WHERE id_Usuario = $id";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '<script>window.location.href = "../paginas/admin-clientes.php";</script>';
    } else {
        echo mysqli_error($conexion);
    }
}
