<?php

include '../php/database.php';

$id = $_GET["id"];

$sql = $conexion->query("
        SELECT 
            disco.*, 
            artista.nombre AS artista_nombre
        FROM 
            disco 
        LEFT JOIN 
            artista ON disco.id_Artista = artista.id_Artista
        WHERE id_Disco = $id;
    ");
$datosDisco = $sql->fetch_object();

$sql2 = $conexion->query("SELECT * FROM usuario");
$usuario = $sql2->fetch_object();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/general.css">
    <title><?= $datosDisco->titulo ?></title>
</head>

<body class="h-100">
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
                            <a href="../paginas/ediciones-especiales.php" class="nav-link">EDICIONES ESPECIALES</a>
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

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>

    <div class="container-lg">
        <div class="card m-5 p-3 shadow">
            <div class="card-body row">
                <div class="col-lg-4 img-container">
                    <img src="<?= $datosDisco->portadaURL ?>" alt="<?= $datosDisco->titulo ?>" class="img-fluid img-centro mw-lg-25">
                </div>
                <div class="card-content col-lg-8">
                    <h2 class="fw-bold mt-2 text-capitalize"><?= $datosDisco->titulo ?></h2>
                    <h5 class="text-muted fst-italic text-capitalize"><?= $datosDisco->artista_nombre ?></h5>
                    <h4>$<?= $datosDisco->precio ?></h4>
                    <p class="mt-2 float-start p-1">
                        <?= $datosDisco->descripcion ?>
                    </p>
                    <form action="../php/agregar-carrito.php" method="POST" class="w-50">
                        <select name="cantidad" class="form-control form-control-sm" required>
                            <option value="">Cantidad</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <input type="hidden" name="id_disco" value="<?= $datosDisco->id_Disco ?>">
                        <input type="hidden" name="precio" value="<?= $datosDisco->precio ?>">
                        <input type="hidden" name="id_usuario" value="<?= $usuario->id_Usuario ?>">
                        <button type="submit" class="mt-4 btn btn-sm" name="agregar">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="sticky-botom text-white pt-4">
        <div class="container justify-content-center text-center">
            <div class="row">
                <div class="col-lg-3 mb-lg-0 mb-2">
                    <span class="h5">!Contáctanos!</span>
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