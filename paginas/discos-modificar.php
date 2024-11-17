<?php
include '../php/database.php';
$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM disco WHERE id_Disco = $id");
$disco = $sql->fetch_object();
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
                <form class="row mt-4" method="POST" action="../php/modificar-disco.php" enctype="multipart/form-data">
                    <input type="hidden" name="formulario" value="editar-disco">
                    <input type="hidden" name="id" value="<?= $disco->id_Disco ?>">
                    <class class="row m-1">
                        <div class="col-6">
                            <input type="text" name="titulo" value="<?= $disco->titulo ?>" class="form-control form-control-sm" placeholder="Título">
                        </div>
                        <div class="col-6">
                            <select name="tipo" class="form-control form-control-sm" required>
                                <?php
                                $tipos = $conexion->query("SELECT * FROM tipo_disco"); ?>
                                <?php
                                while ($tipo = $tipos->fetch_object()) {
                                    $selected = ($tipo->id_tipoDisco == $disco->id_tipoDisco) ? 'selected' : '';
                                    echo "<option value='{$tipo->id_tipoDisco}' {$selected}>{$tipo->tipo}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </class>
                    <div class="row m-1">
                        <div class="col-6">
                            <select name="genero" class="form-control form-control-sm" required>
                                <?php
                                $generos = $conexion->query("SELECT * FROM genero");
                                while ($genero = $generos->fetch_object()) {
                                    $selected = ($genero->id_Genero == $disco->id_Genero) ? 'selected' : '';
                                    echo "<option value='{$genero->id_Genero}' {$selected}>{$genero->nombre}</option>";
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
                                    $selected = ($artista->id_Artista == $disco->id_Artista) ? 'selected' : '';
                                    echo "<option value='{$artista->id_Artista}' {$selected}>{$artista->nombre}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <class class="row m-1">
                        <div class="col-12">
                            <input type="text" value="<?= $disco->descripcion ?>" name="descripcion" class="form-control form-control-sm" placeholder="Descripción">
                        </div>
                    </class>
                    <div class="row m-1">
                        <div class="col-6">
                            <input type="text" value="<?= $disco->precio ?>" name="precio" class="form-control form-control-sm" placeholder="Precio">
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control form-control-sm" name="portada-disco">
                        </div>
                        <div class="col-6 mt-2">
                            <img src="<?= $disco->portadaURL ?>" alt="Imagen Actual" style="max-width: 100px; max-height: 100px;">
                        </div>
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