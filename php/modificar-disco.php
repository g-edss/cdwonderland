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
                
                $query = "UPDATE disco SET titulo='$titulo', id_tipoDisco='$tipo', id_Genero='$genero', id_Artista='$artista', descripcion='$descripcion',
                precio='$precio', portadaURL='$ruta' WHERE id_Disco = '$id'";
                $ejecutar = mysqli_query($conexion, $query);

                if ($ejecutar) {
                    echo '<script>window.location.href = "../paginas/admin-discos.php";</script>';
                } else {
                    echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo. Error: ' . mysqli_error($conexion) . '</p></div>';
                }
            } else {
                echo '<div class="text-center text-danger"><p>Error al subir la imagen.</p></div>';
            }
        }
    }
}
