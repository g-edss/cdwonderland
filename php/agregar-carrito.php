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
            echo '
                <div class="alert alert-success d-flex align-items-center mx-auto mt-4" style="max-width: fit-content;" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <div>Agregado al carrito!</div>
                </div>
            ';
        }
    }
        
}else{
    echo '<script>
            alert("Debes iniciar sesión para agregar productos.");
            window.history.back();
        </script>
        ';
    session_destroy();
    die();
}
