<?php
    include 'database.php';

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $contraseña = $_POST['contraseña'];

    $validar_login = mysqli_query($conexion,
    "SELECT * FROM usuario WHERE nombre = '$nombre' AND apellido = '$apellido' AND contraseña = '$contraseña'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../páginas/perfil.html");
    }else{
        echo '<div class="text-center text-danger"><p>El usuario no existe, verifique los datos.</p></div>';
    }
    mysqli_close($conexion);