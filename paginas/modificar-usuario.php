<?php
include '../php/database.php';
$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM usuario WHERE id_Usuario = $id");
?>

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
    <div class="header sticky-top">
        <div class="container-fluid text-white" id="headerTop">
            <div class="d-flex align-items-center justify-content-center">
                <h5 class="fw-bold me-2 mb-0">CD WONDERLAND</h5>
                <img class="logo" src="../images/wave-sound.png">
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <p class="fst-italic mb-0">Administración</p>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="card shadow w-50 mt-5">
            <div class="card-body m-2">
                <form class="row mt-4" method="POST" action="../php/modificar.php">
                    <input type="hidden" name="id" value="<?= $_GET['id']?>">
                    <?php
                    while ($datos = $sql->fetch_object()) { ?>
                        <div class="col-6">
                            <input type="text" name="nombre" value="<?= $datos->nombre ?>" class="form-control form-control-sm" placeholder="Nombre">
                        </div>
                        <div class="col-6">
                            <input type="text" name="apellido" value="<?= $datos->apellido ?>" class="form-control form-control-sm" placeholder="Apellido">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="email" name="email" value="<?= $datos->email ?>" class="form-control form-control-sm" placeholder="Email">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="text" name="telefono" value="<?= $datos->telefono ?>" class="form-control form-control-sm" placeholder="Teléfono">
                        </div>
                    <?php } ?>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-sm" name="editar">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>