<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>
            alert("Inicia sesión.");
            window.location = "../paginas/cuenta.php";
        </script>
        ';
    session_destroy();
    die();
}

include '../php/database.php';

$id_usuario = $_SESSION['id_usuario'];

$sql = $conexion->query("
        SELECT 
            disco.*, 
            carrito.*
        FROM 
            carrito 
        LEFT JOIN 
            disco ON disco.id_Disco = carrito.id_Disco
        WHERE carrito.id_Usuario = $id_usuario;
    ");
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/general.css">
    <title>Ediciones Especiales - CD Wonderland</title>
</head>

<body class="vh-100">
    <div class="header sticky-top">
        <div class="container-fluid text-white fw-bold" id="headerTop">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center justify-content-center flex-grow-1" style="margin-left: 125px;">
                    <a href="../paginas/main.php" class="h5 me-2 mb-0">CD WONDERLAND</a>
                    <img class="logo" src="../images/wave-sound.png">
                </div>
                <div class="d-flex align-items-center mx-2 mb-0">
                    <a href="../paginas/carrito.php" class="h6 me-2 mb-0">Mi Carrito</a>
                    <img class="logo" src="../images/shopping-cart.png">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler">
                    <span class="navbar-toggler-icon" id="#navbarToggler"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav justify-content-between w-100 px-5">
                        <li class="nav-item text-danger">
                            <a href="../paginas/artistas.php" class="nav-link">ARTISTAS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/generos.php" class="nav-link">GÉNEROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/ediciones-especiales.php" class="nav-link active" aria-current="page">EDICIONES ESPECIALES</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/cuenta.php" class="nav-link">CUENTA</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/nosotros.html" class="nav-link">NOSOTROS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid secciones">
        <h1 class="mt-5 m-4 fw-bold">Mi Carrito</h1>
        <div class="row align-items-center">
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <div class="col-lg-4 col-md-6 col gx-5 gy-4">
                    <div class="card shadow" id="animacion">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-around ">
                                <a href="../paginas/disco.php?id_disco=<?= $datos->id_Disco ?>">
                                    <img alt="<?= $datos->titulo ?>" src="<?= $datos->portadaURL ?>" class="portada">
                                </a>
                                <div class="flex-grow-1 mt-4">
                                    <a href="../paginas/disco.php?id_disco=<?= $datos->id_Disco ?>" class="h4 text-center text-dark"><?= $datos->titulo ?></a>
                                    <p class="mb-0 mt-3 fst-italic">$<?= $datos->precio ?></p>
                                    <p class="mb-0 mt-2"><b>Cantidad:</b> <?= $datos->cantidad ?></p>
                                </div>
                            </div>
                            <form action="../php/eliminar-carrito.php" method="POST" class="w-50">
                                <input type="hidden" name="id_disco" value="<?= $datos->id_Disco ?>">
                                <input type="hidden" name="id_usuario" value="<?= $datos->id_Usuario ?>">
                                <button type="submit" class="mt-4 btn btn-sm" name="eliminar">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-6 text-end"><a href="../paginas/main.php" class="mt-4 btn btn-sm">Seguir Comprando</a></div>
            <div class="col-6"><button type="submit" name="comprar" value="" class="mt-4 btn btn-sm">Comprar</button> </div>
        </div>
    </div>

    <footer class="sticky-bottom text-white pt-3">
        <div class="container justify-content-center text-center">
            <div class="row">
                <div class="col-lg-3 mb-lg-0 mb-2">
                    <span class="h5">¡Contáctanos!</span>
                </div>
                <div class="col-lg-6 d-flex justify-content-around mb-2">
                    <a href="https://wa.me/" target="_blank">
                        <img class="logo" src="../images/whatsapp.png" alt="icono de whatsapp y link">
                    </a>
                    <a href="https://www.instagram.com/edscorpse_/" target="_blank">
                        <img class="logo" src="../images/instagram.png" alt="icono de instagram y link">
                    </a>
                    <a href="https://www.facebook.com" target="_blank">
                        <img class="logo" src="../images/facebook.png" alt="icono de facebook y link">
                    </a>
                </div>
                <div class="col-lg-3 mb-2">
                    <span>cdwonderland@gmail.com</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>