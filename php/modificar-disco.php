<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'editar-disco') {
        $id = $_POST["id"];

        $titulo = htmlspecialchars(trim($_POST['titulo']));
        $tipo= $_POST['tipo'];
        $genero= $_POST['genero'];
        $artista= $_POST['artista'];
        $descripcion= htmlspecialchars(trim($_POST['descripcion']));
        $precio= floatval($_POST['precio']);
        $portada = $_FILES['portada-disco']['name'];

        if (empty($titulo) || empty($tipo) || empty($genero) || empty($artista) || empty($descripcion) || empty($precio)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $carpeta = '../images/discos/';
            $ruta = $carpeta . basename($portada);

            if (move_uploaded_file($_FILES['portada-disco']['tmp_name'], $ruta)) {
                
                $query = "INSERT INTO disco(titulo, id_tipoDisco, id_Genero, id_Artista, descripcion, precio, portadaURL)
                VALUES ('$titulo', '$tipo', '$genero', '$artista', '$descripcion', '$precio', '$ruta')";
                $ejecutar = mysqli_query($conexion, $query);

                if ($ejecutar) {
                    echo '<div class="text-center text-success"><p>Disco registrado.</p></div>';
                } else {
                    echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo.</p></div>';
                }
            } else {
                echo '<div class="text-center text-danger"><p>Error al subir la portada.</p></div>';
            }
        }
    }
}
