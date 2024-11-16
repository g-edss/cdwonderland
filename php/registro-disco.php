<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];

    if ($formulario == 'registro-disco') {

        $titulo = htmlspecialchars(trim($_POST['titulo']));
        $tipo = $_POST['tipo'];
        $genero = $_POST['genero'];
        $artista = $_POST['artista'];
        $descripcion = htmlspecialchars(trim($_POST['descripcion']));
        $precio = floatval($_POST['precio']);
        $portada = $_FILES['portada-disco']['name'];

        if (empty($titulo) || empty($tipo) || empty($genero) || empty($artista) || empty($descripcion) || empty($precio)) {
            echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
        } else {

            $verificar_disco = mysqli_query($conexion, "SELECT * FROM disco WHERE titulo= '$titulo'");
            $verificar_desc = mysqli_query($conexion, "SELECT * FROM disco WHERE descripcion= '$descripcion'");

            if (mysqli_num_rows($verificar_disco) > 0) {
                echo '<div class="text-center text-danger"><p>El disco ya existe.</p></div>';
            } else if(mysqli_num_rows($verificar_desc) > 0){
                echo '<div class="text-center text-secondary"><p>La descripción ya existe.</p></div>';
            }else{
                
                $carpeta = '../images/discos/';
                $ruta = $carpeta . basename($portada);

                $verificar_ruta = mysqli_query($conexion, "SELECT * FROM disco WHERE portadaURL = '$ruta'");

                if (mysqli_num_rows($verificar_ruta) > 0) {
                    echo '<div class="text-center text-danger"><p>La imagen ya está asignada.</p></div>';
                }else{
                    if (move_uploaded_file($_FILES['portada-disco']['tmp_name'], $ruta)){

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
    }
}
