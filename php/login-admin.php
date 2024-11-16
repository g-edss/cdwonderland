<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'login-admin') {

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $apellido = htmlspecialchars(trim($_POST['apellido']));
        $contraseña = $_POST['contraseña'];

        if (empty($nombre) || empty($apellido) || empty($contraseña)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $hash = hash('md5', $contraseña);

            $validar_login = mysqli_query(
                $conexion,
                "SELECT * FROM usuario WHERE nombre = '$nombre' AND apellido = '$apellido' AND contraseña = '$hash' AND id_Rol = 1"
            );

            if (mysqli_num_rows($validar_login) > 0) {
                echo '<script>
                    window.location.href = "../paginas/admin-main.php"
                    </script>';
            } else {
                echo '<div class="text-center text-danger"><p>No se encontró el usuario, verifique los datos.</p></div>';
            }
        }
    }
}
