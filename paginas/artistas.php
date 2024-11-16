<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/general.css">
    <title>Artistas - CD Wonderland</title>
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
                            <a href="../paginas/artistas.php" class="nav-link active" aria-current="page">ARTISTAS</a>
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

    <div class="container-fluid secciones">
        <h1 class="mt-5 m-4 fw-bold">¡Artistas!</h1>
        <div class="row align-items-center">
            <?php
            include '../php/database.php';
            $sql = $conexion->query("SELECT * FROM artista");
            while ($info = $sql->fetch_object()) { ?>
                <div class="col-lg-4 col-md-6 col gx-5 gy-4">
                    <div class="card shadow" id="animacion">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-around mx-3">
                                <a href="../paginas/disco.php?id=<?= $info->id_Artista ?>">
                                    <img alt="<?= $info->nombre ?>" src="<?= $info->imagenURL ?>" class="portada">
                                </a>
                                <a href="../paginas/disco.php?id=<?= $info->id_Artista ?>" class="h4 text-center text-dark text-capitalize"><?= $info->nombre ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
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