<?php

$conexion = mysqli_connect("localhost", "root", "", "cd_wonderland", 3306);

if (!$conexion) {
    die(mysqli_connect_error());
}