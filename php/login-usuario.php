<?php

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'login') {

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $apellido = htmlspecialchars(trim($_POST['apellido']));
        $contraseña = $_POST['contraseña'];

        if (empty($nombre) || empty($apellido) || empty($contraseña)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $hash = hash('md5', $contraseña);

            $validar_login = mysqli_query(
                $conexion,
                "SELECT * FROM usuario WHERE nombre = '$nombre' AND apellido = '$apellido' AND contraseña = '$hash' AND id_Rol = 2"
            );

            if (mysqli_num_rows($validar_login) > 0) {
                $_SESSION['nombre'] = $nombre;
                $_SESSION['apellido'] = $apellido;

                echo "<script>
                alert('Bienvenido, {$_SESSION['nombre']} {$_SESSION['apellido']}');
                    window.location = '../paginas/main.php';
                    </script>";
            } else {
                echo '<div class="text-center text-danger"><p>No se encontró el usuario, verifique los datos.</p></div>';
            }
        }
    }
}
?>
