<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-general.css">

    <title>Cd Wonderland - Admin</title>
</head>

<body class="h-100">
    <header class="navbar navbar-dark sticky-top bg-small">
        <div class="ms-4 mt-2 d-flex align-items-center justify-content-center" id="brand">
            <a href="../paginas/main.html" class="h5 p-2 mb-0">CD WONDERLAND</a>
            <img class="logo" src="../images/wave-sound.png">
        </div>
        <div class=" bg w-100 d-block d-md-none">fgfhgfhg</div>
        <button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class=" col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky mt-4">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="../paginas/admin-ayg.php" class="nav-link active" aria-current="page">ARTISTAS Y GÉNEROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-discos.php" class="nav-link">DISCOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-pedidos.php" class="nav-link">PEDIDOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-clientes.php" class="nav-link">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-main.php" class="nav-link">ADMINISTRADORES</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-reportes.php" class="nav-link">REPORTES</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <h2 class="mt-1 mb-3 text-center fw-bold">Artistas</h2>
                <div class="container d-flex justify-content-center">
                    <div class="card shadow w-75 mt-2">
                        <div class="card-body m-2">
                            <h4 class="text-center m-2">Añadir Artista</h4>
                            <?php
                            include "../php/database.php";
                            include "../php/registro-artistas.php";
                            ?>
                            <form class="row mt-4" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" value="registro-artista">
                                <div class="col-6">
                                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Nombre">
                                </div>
                                <div class="col-6">
                                    <input type="file" class="form-control form-control-sm" name="imagen-artista">
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-sm" name="registro-artista">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include '../php/database.php';
                include '../php/eliminar-artista.php';
                ?>
                <table class="table table-bordered border-dark w-75">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/database.php';
                        $sql = $conexion->query("SELECT * FROM artista");
                        while ($datosArtista = $sql->fetch_object()) { ?>
                            <tr class="text-center bg-white">
                                <td><?= $datosArtista->id_Artista ?></td>
                                <td><?= $datosArtista->nombre ?></td>
                                <td>
                                    <img src="<?= $datosArtista->imagenURL ?>" alt="<?= $datosArtista->nombre ?>" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="../paginas/artista-modificar.php?id=<?= $datosArtista->id_Artista ?>" class="btn btn-warning btn-sm" name="editar">Editar</a>
                                    <a href="../paginas/admin-ayg.php?id=<?= $datosArtista->id_Artista ?>" class="btn btn-danger btn-sm" name="registro">Eliminar</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <h2 class="mt-1 mb-3 text-center fw-bold">Géneros</h2>
                <div class="container d-flex justify-content-center">
                    <div class="card shadow w-75 mt-2">
                        <div class="card-body m-2">
                            <h4 class="text-center m-2">Añadir Género</h4>
                            <?php
                            include "../php/database.php";
                            include "../php/registro-genero.php";
                            ?>
                            <form class="row mt-4" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" value="registro-genero">
                                <div class="col-6">
                                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Nombre">
                                </div>
                                <div class="col-6">
                                    <input type="file" class="form-control form-control-sm" name="imagen-genero">
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-sm" name="registro-genero">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include '../php/database.php';
                include '../php/eliminar-genero.php';
                ?>
                <table class="table table-bordered border-dark w-75">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/database.php';
                        $sqlGenero = $conexion->query("SELECT * FROM genero");
                        while ($datosGenero = $sqlGenero->fetch_object()) { ?>
                            <tr class="text-center bg-white">
                                <td><?= $datosGenero->id_Genero ?></td>
                                <td><?= $datosGenero->nombre ?></td>
                                <td>
                                    <img src="<?= $datosGenero->imagenUrl ?>" alt="<?= $datosGenero->nombre ?>" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="../paginas/genero-modificar.php?id_genero=<?= $datosGenero->id_Genero ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="../paginas/admin-ayg.php?id_genero=<?= $datosGenero->id_Genero ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>