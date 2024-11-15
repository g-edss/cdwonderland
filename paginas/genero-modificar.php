<?php
include '../php/database.php';
$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM genero WHERE id_Genero = $id");
$genero = $sql->fetch_object();
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
            <form class="row mt-4" method="POST" action="../php/modificar-genero.php" enctype="multipart/form-data">
                    <input type="hidden" name="formulario" value="editar-genero">
                    <input type="hidden" name="id" value="<?= $genero->id_Genero ?>">
                    <div class="col-12">
                        <input type="text" name="nombre" value="<?= $genero->nombre ?>" class="form-control form-control-sm" placeholder="Nombre" required>
                    </div>
                    <div class="col-12 mt-2">
                        <input type="file" class="form-control form-control-sm" name="imagen-genero">
                    </div>
                    <div class="col-12 mt-2">
                        <img src="<?= $genero->imagenURL ?>" alt="Imagen Actual" style="max-width: 100px; max-height: 100px;">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-sm">Guardar Cambios</button>
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