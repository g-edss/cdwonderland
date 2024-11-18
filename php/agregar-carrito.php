<?php
session_start();

include 'database.php';

if (isset($_SESSION['id_usuario'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = intval($_POST['id_usuario']);
        $id_disco = intval($_POST['id_disco']);
        $cantidad = intval($_POST['cantidad']);

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $_SESSION['carrito'][$id_disco] = $cantidad;

        $query = "INSERT INTO carrito(id_Usuario, id_Disco, cantidad) VALUES ('$id_usuario','$id_disco', '$cantidad')";
        $ejecutar = mysqli_query($conexion, $query);

        if ($ejecutar) {
            echo '<script>
            alert("¡Agregado al carrito!");
                window.history.back();
            </script>
        ';
        }
    }
} else {
    echo '<script>
            alert("Debes iniciar sesión para agregar productos.");
            window.history.back();
        </script>
        ';
    session_destroy();
    die();
}
