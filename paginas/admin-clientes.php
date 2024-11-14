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
            <a href="../páginas/main.html" class="h5 p-2 mb-0">CD WONDERLAND</a>
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
            <nav id="sidebar" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky mt-4">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="../páginas/generos.html" class="nav-link">ARTISTAS Y GÉNEROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../páginas/ediciones-especiales.html" class="nav-link">DISCOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../páginas/cuenta.php" class="nav-link">PEDIDOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../páginas/artistas.html" class="nav-link">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a href="../páginas/admin-main.php" class="nav-link active" aria-current="page">ADMINISTRADORES</a>
                        </li>
                        <li class="nav-item">
                            <a href="../páginas/nosotros.html" class="nav-link">REPORTES</a>
                        </li>
                    </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <h3 class="m-3 text-center fw-bold">Clientes</h3>
                <table class="table table-bordered border-dark w-75">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/database.php';
                        $sql = $conexion->query("SELECT * FROM usuario WHERE id_Rol = 1");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr class="text-center">
                                <td><?= $datos->id_Usuario ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->apellido ?></td>
                                <td><?= $datos->email ?></td>
                                <td><?= $datos->telefono ?></td>
                                <td>
                                    <a href="../páginas/modificar-usuario.php?id=<?= $datos->id_Usuario ?>" class="btn btn-warning btn-sm" name="editar">Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="registro">Eliminar</button>
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