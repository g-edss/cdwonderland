<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = intval($_POST['id_usuario']);
    $id_disco = intval($_POST['id_disco']);

    $query = "DELETE FROM carrito WHERE id_Disco = $id_disco AND id_Usuario = $id_usuario";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '<script>
        alert("Eliminado del carrito.");
            window.history.back();
            window.reload();
        </script>
    ';
    }
}