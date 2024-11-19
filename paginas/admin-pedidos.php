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
                            <a href="../paginas/admin-reportes.php" class="nav-link">REPORTES</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <h2 class="mt-1 mb-3 text-center fw-bold">Listas de Pedidos</h2>
                <table class="table table-bordered border-dark w-75">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Cliente</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Fecha de Entrega</th>
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Lista de Productos</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>