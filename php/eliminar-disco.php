<?php
include 'database.php';

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT portadaURL FROM disco WHERE id_Disco = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $disco = mysqli_fetch_assoc($resultado);
        $ruta = $disco['portadaURL'];

        if (file_exists($ruta)) {
            unlink($ruta);
        }

        $queryEliminar = "DELETE FROM disco WHERE id_Disco = $id";
        $ejecutar = mysqli_query($conexion, $queryEliminar);

        if ($ejecutar) {
            echo '<script>window.location.href = "../paginas/admin-discos.php";</script>';
        } else {
            echo mysqli_error($conexion);
        }
    } else {
        echo '<div class="text-danger">El disco no existe.</div>';
    }
}