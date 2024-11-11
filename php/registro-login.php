<?php
require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contraseña = $_POST['contraseña'];

    if(empty($nombre) || empty($apellido) || empty($contraseña)){
        die('Por favor, ingrese todos los datos!');
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Correo no válido.');
    }

    if (strlen($contraseña) < 8) {
        die('La contraseña debe tener al menos 8 caracteres.');
    }

    $hashContra = password_hash($contraseña, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuario (nombre, apellido, email, contraseña, id_Rol)
                VALUES ('$nombre', '$apellido', '$email', '$contraseña', 2)";
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo "
        <script>
            $
        </script>
        "
    }
}

$conexion->close();