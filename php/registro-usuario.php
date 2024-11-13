<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contraseña = $_POST['contraseña'];

    if (empty($nombre) || empty($apellido) || empty($contraseña)) {
        echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
    } else if (strlen($contraseña) < 8) {
        echo '<div class="text-center text-danger"><p>La contraseña debe tener 8 caracteres.</p></div>';
    } else {
        $hash = hash('md5', $contraseña);

        $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE email = '$email'");

        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre = '$nombre' AND apellido = '$apellido'");

        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<div class="text-center text-secondary"><p>El correo ya existe.</p></div>';
        } else if (mysqli_num_rows($verificar_usuario) > 0) {
            echo '<div class="text-center text-secondary"><p>El usuario ya existe.</p></div>';
        } else {
            $query = "INSERT INTO usuario (nombre, apellido, email, contraseña, id_Rol) VALUES ('$nombre', '$apellido', '$email', '$hash', 1)";

            $ejecutar = mysqli_query($conexion, $query);

            if ($ejecutar) {
                echo '<div class="text-center text-success"><p>Usuario registrado.</p></div>';
            } else {
                echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo.</p></div>';
            }
        }
    }
}
