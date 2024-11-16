<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'registro-artista') {

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $imagen = $_FILES['imagen-artista']['name'];

        if (empty($nombre) || empty($imagen)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $verificar_artista = mysqli_query($conexion, "SELECT * FROM artista WHERE nombre = '$nombre'");

            if (mysqli_num_rows($verificar_artista) > 0) {
                echo '<div class="text-center text-danger"><p>El artista ya existe.</p></div>';
            } else {
                $carpeta = '../images/artistas/';
                $ruta = $carpeta . basename($imagen);

                $verificar_ruta = mysqli_query($conexion, "SELECT * FROM artista WHERE imagenURL = '$ruta'");

                if (mysqli_num_rows($verificar_ruta) > 0) {
                    echo '<div class="text-center text-danger"><p>La imagen ya está asignada.</p></div>';
                } else {
                    if (move_uploaded_file($_FILES['imagen-artista']['tmp_name'], $ruta)) {

                        $query = "INSERT INTO artista (nombre, imagenURL) VALUES ('$nombre', '$ruta')";
                        $ejecutar = mysqli_query($conexion, $query);

                        if ($ejecutar) {
                            echo '<div class="text-center text-success"><p>Nuevo artista registrado.</p></div>';
                        } else {
                            echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo.</p></div>';
                        }
                    } else {
                        echo '<div class="text-center text-danger"><p>Error al subir la imagen.</p></div>';
                    }
                }
            }
        }
    }
}
