<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'registro-genero') {
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $imagen = $_FILES['imagen-genero']['name'];

        if (empty($nombre) || empty($imagen)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $verificar_genero = mysqli_query($conexion, "SELECT * FROM genero WHERE nombre= '$nombre'");

            if (mysqli_num_rows($verificar_genero) > 0) {
                echo '<div class="text-center text-secondary"><p>El género ya existe.</p></div>';
            } else {
                $carpeta = '../images/generos/';
                $ruta = $carpeta . basename($imagen);

                $verificar_ruta = mysqli_query($conexion, "SELECT * FROM genero WHERE imagenUrl = '$ruta'");

                if (mysqli_num_rows($verificar_ruta) > 0) {
                    echo '<div class="text-center text-secondary"><p>La imagen ya está asignada.</p></div>';
                } else {
                    if (move_uploaded_file($_FILES['imagen-genero']['tmp_name'], $ruta)) {

                        $query = "INSERT INTO genero (nombre, imagenUrl) VALUES ('$nombre', '$ruta')";
                        $ejecutar = mysqli_query($conexion, $query);

                        if ($ejecutar) {
                            echo '<div class="text-center text-success"><p>Nuevo género registrado.</p></div>';
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
