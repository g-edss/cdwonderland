<?php
    include 'database.php';

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contraseña = $_POST['contraseña'];

    if(empty($nombre) || empty($apellido) || empty($contraseña)){
        echo '<div class="text-center text-danger"><p>Faltan campos por llenar.</p></div>';
    }else if (strlen($contraseña) < 8) {
        echo '<div class="text-center text-danger"><p>La contraseña debe tener 8 caracteres.</p></div>';
    }else{
        $hashContra = password_hash($contraseña, PASSWORD_DEFAULT);
        
        $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE email = '$email'");

        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre = '$nombre' AND apellido = '$apellido'");

        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<div class="text-center text-secondary"><p>El correo ya existe.</p></div>';
        }else if(mysqli_num_rows($verificar_usuario) > 0){
            echo '<div class="text-center text-secondary"><p>El usuario ya existe.</p></div>';
        }else{
            $query = "INSERT INTO usuario (nombre, apellido, email, contraseña, id_Rol) VALUES ('$nombre', '$apellido', '$email', '$hashContra', 2)";

            $ejecutar = mysqli_query($conexion, $query);

            if($ejecutar){
                echo '<div class="text-center text-success"><p>Usuario registrado! Por favor, inicie sesión.</p></div>';
            }else{
                echo '<div class="text-center text-danger"><p>Ocurrió un error, intente de nuevo.</p></div>';
            }
        }
    }
    mysqli_close($conexion);

