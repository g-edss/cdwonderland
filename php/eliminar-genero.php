<?php
include 'database.php';

if (!empty($_GET["id_genero"])) {
    $id = $_GET["id_genero"];

    $query = "SELECT imagenUrl FROM genero WHERE id_Genero = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $genero = mysqli_fetch_assoc($resultado);
        $ruta = $genero['imagenUrl'];

        if (file_exists($ruta)) {
            unlink($ruta);
        }

        $queryEliminar = "DELETE FROM genero WHERE id_Genero = $id";
        $ejecutar = mysqli_query($conexion, $queryEliminar);

        if ($ejecutar) {
            echo '<script>window.location.href = "../paginas/admin-ayg.php";</script>';
        } else {
            echo mysqli_error($conexion);
        }
    } else {
        echo '<div class="text-danger">El género no existe.</div>';
    }
}