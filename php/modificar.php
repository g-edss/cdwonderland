<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST["id"];
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefono = $_POST['telefono'];

    $query = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono' WHERE id_Usuario= $id";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '<script>window.location.href = "../paginas/admin-main.php";</script>';
    } else {
        echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo. Error: ' . mysqli_error($conexion) . '</p></div>';
    }
}
