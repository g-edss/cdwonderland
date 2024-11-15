<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'editar-genero') {
        $id = $_POST["id"];
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $imagen = $_FILES['imagen-genero']['name'];
        
        if (empty($nombre) || empty($imagen)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $carpeta = '../images/generos/';
            $ruta = $carpeta . basename($imagen);

            if (move_uploaded_file($_FILES['imagen-genero']['tmp_name'], $ruta)) {
                
                $query = "UPDATE genero SET nombre='$nombre', imagenURL='$ruta' WHERE id_Genero= $id";
                $ejecutar = mysqli_query($conexion, $query);

                if ($ejecutar) {
                    echo '<script>window.location.href = "../paginas/admin-ayg.php";</script>';
                } else {
                    echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo. Error: ' . mysqli_error($conexion) . '</p></div>';
                }
            } else {
                echo '<div class="text-center text-danger"><p>Error al subir la imagen.</p></div>';
            }
        }
    }
}
