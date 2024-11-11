<?php

$conexion = mysqli_connect("localhost", "root", "", "cd_wonderland");

if ($conexion) {
    echo 'Conexión establecida';
} else {
    echo 'Conexión NO establecida';
}