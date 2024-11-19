<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/general.css">
    <title>Compra</title>
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
    </div>

    <div class="container mt-5 w-50">
        <h2 class="text-center fw-bold m-2">Ingresa tus Datos</h2>
        <?php
        include '../php/database.php';
        include '../php/login-usuario.php';
        ?>
        <form class="" method="POST">
            <div class="row g-3">
                <h5 class="fw-bold">Entrega y Contacto</h5>
                <div class="col-6">
                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Nombre">
                </div>
                <div class="col-6">
                    <input type="text" name="apellido" class="form-control form-control-sm" placeholder="Apellido">
                </div>
                <div class="col-12">
                    <input type="text" name="telefono" class="form-control form-control-sm" placeholder="Telefono">
                </div>
                <div class="col-6">
                    <input type="text" name="estado" class="form-control form-control-sm" placeholder="Estado">
                </div>
                <div class="col-6">
                    <input type="text" name="municipio" class="form-control form-control-sm" placeholder="Municipio">
                </div>
                <div class="col-12">
                    <input type="text" name="calleNum" class="form-control form-control-sm" placeholder="Calle y Número">
                </div>
            </div>
            <div class="row g-3 mt-5">
                <h5 class="fw-bold m-0">Método de pago</h5>
                <div class="col-6">
                    <input type="text" name="tarjeta" class="form-control form-control-sm" placeholder="Número de Tarjeta">
                </div>
                <div class="col-6">
                    <input type="text" name="codigo" class="form-control form-control-sm" placeholder="Código de Seguridad">
                </div>
                <div class="col-12">
                    <input type="date" name="vencimiento" class="form-control form-control-sm" placeholder="Vencimiento">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-sm " name="aceptar">Aceptar</button>
                </div>
                <div class="col-6">
                    <a href="../paginas/carrito.php" class="btn btn-sm " name="cancelar">Cancelar</a>
                </div>
        </form>
    </div>
    </div>

    <footer class="sticky-bottom text-white pt-3">
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