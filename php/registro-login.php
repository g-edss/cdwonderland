<?php
require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contraseña = $_POST['contraseña'];

    if(empty($nombre) || empty($apellido) || empty($contraseña)){
        echo '<div class="alert text-center" role="alert"></div>';
        exit();
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<p>Correo no válido.</p>';
        exit();
    }

    if (strlen($contraseña) < 8) {
        echo '<p>La contraseña debe tener 8 caracteres.</p>';
        exit();
    }

    $hashContra = password_hash($contraseña, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuario (nombre, apellido, email, contraseña, id_Rol)
                VALUES ('$nombre', '$apellido', '$email', '$contraseña', 2)";
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '<p>Usuario registrado, puede iniciar sesión!</p>';
    }else{
        echo '<p>Intentelo de nuevo.</p>';
    }
}

mysqli_close($conexion);