<?php
include 'database.php';

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT imagenURL FROM artista WHERE id_Artista = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $artista = mysqli_fetch_assoc($resultado);
        $rutaImagen = $artista['imagenURL'];

        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        $queryEliminar = "DELETE FROM artista WHERE id_Artista = $id";
        $ejecutar = mysqli_query($conexion, $queryEliminar);

        if ($ejecutar) {
            echo '<script>window.location.href = "../paginas/admin-ayg.php";</script>';
        } else {
            echo mysqli_error($conexion);
        }
    } else {
        echo '<div class="text-danger">El artista no existe.</div>';
    }
}