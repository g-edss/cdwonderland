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
                            <a href="../paginas/admin-ayg.php" class="nav-link">ARTISTAS Y GÉNEROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="../paginas/admin-discos.php" class="nav-link active" aria-current="page">DISCOS</a>
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
                            <a href="../paginas/nosotros.html" class="nav-link">REPORTES</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <h2 class="mt-1 mb-3 text-center fw-bold">Discos</h2>
                <div class="container d-flex justify-content-center">
                    <div class="card shadow w-75 mt-2">
                        <div class="card-body m-2">
                            <h4 class="text-center m-2">Añadir Disco</h4>
                            <?php
                            include "../php/database.php";
                            include "../php/registro-disco.php";
                            ?>
                            <form class="row mt-4" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" value="registro-disco">
                                <class class="row m-1">
                                    <div class="col-6">
                                        <input type="text" name="titulo" class="form-control form-control-sm" placeholder="Título">
                                    </div>
                                    <div class="col-6">
                                        <select name="tipo" class="form-control form-control-sm" required>
                                            <option value="">Seleccione el tipo</option>
                                            <?php
                                            $tipos = $conexion->query("SELECT * FROM tipo_disco");
                                            while ($tipo = $tipos->fetch_object()) {
                                                echo "<option value='{$tipo->id_tipoDisco}'>{$tipo->tipo}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </class>
                                <div class="row m-1">
                                    <div class="col-6">
                                        <select name="genero" class="form-control form-control-sm" required>
                                            <option value="">Seleccione el género</option>
                                            <?php
                                            $generos = $conexion->query("SELECT * FROM genero");
                                            while ($genero = $generos->fetch_object()) {
                                                echo "<option value='{$genero->id_Genero}'>{$genero->nombre}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select name="artista" class="form-control form-control-sm" required>
                                            <option value="">Seleccione el artista</option>
                                            <?php
                                            $artistas = $conexion->query("SELECT * FROM artista");
                                            while ($artista = $artistas->fetch_object()) {
                                                echo "<option value='{$artista->id_Artista}'>{$artista->nombre}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <class class="row m-1">
                                    <div class="col-12">
                                        <input type="text" name="descripcion" class="form-control form-control-sm" placeholder="Descripción">
                                    </div>
                                </class>
                                <div class="row m-1">
                                    <div class="col-6">
                                        <input type="text" name="precio" class="form-control form-control-sm" placeholder="Precio">
                                    </div>
                                    <div class="col-6">
                                        <input type="file" class="form-control form-control-sm" name="portada-disco">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-sm" name="registro-disco">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include '../php/eliminar-disco.php';
                ?>
                <table class="table table-bordered border-dark" style="max-width:min-content;">
                    <thead>
                        <tr class="text-center text-medium">
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Género</th>
                            <th scope="col">Artista</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Portada</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/database.php';
                        $sql = $conexion->query("
                            SELECT 
                                disco.*, 
                                artista.nombre AS artista_nombre, 
                                tipo_disco.tipo AS tipo_nombre, 
                                genero.nombre AS genero_nombre 
                            FROM 
                                disco 
                            LEFT JOIN 
                                artista ON disco.id_Artista = artista.id_Artista 
                            LEFT JOIN 
                                tipo_disco ON disco.id_tipoDisco = tipo_disco.id_tipoDisco 
                            LEFT JOIN 
                                genero ON disco.id_Genero = genero.id_Genero
                        ");
                        while ($datosDisco = $sql->fetch_object()) { ?>
                            <tr class="text-center bg-white fs-6">
                                <td><?= $datosDisco->id_Disco ?></td>
                                <td><?= $datosDisco->titulo ?></td>
                                <td><?= $datosDisco->tipo_nombre ?></td>
                                <td><?= $datosDisco->genero_nombre ?></td>
                                <td><?= $datosDisco->artista_nombre ?></td>
                                <td scope=row class="text-truncate" style="max-width: 250px;"><?= $datosDisco->descripcion ?></td>
                                <td><?= $datosDisco->precio ?></td>
                                <td>
                                    <img src="<?= $datosDisco->portadaURL ?>" alt="<?= $datosDisco->titulo ?>" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="../paginas/discos-modificar.php?id=<?= $datosDisco->id_Disco ?>" class="btn btn-warning btn-sm mb-1" name="editar">Editar</a>
                                    <a href="../paginas/admin-discos.php?id=<?= $datosDisco->id_Disco ?>" class="btn btn-danger btn-sm" name="registro">Eliminar</a>
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