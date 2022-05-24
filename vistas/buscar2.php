<?php
// consulta para vizualiar y descargar la información buscada por el administrador  
include '../class/conexion.php';
if(!isset($_POST['buscar'])){

    $_POST['buscar']= "";

    $buscar = $_POST['buscar'];
}

$conexion = Conex::conectar();

$buscar = $_POST['buscar'];

$SQL_READ="SELECT tbl_productos.CEDULA,tbl_productos.NOMBRE,tbl_productos.CARGO,tbl_productos.SALDO,tbl_productos.CESANTIA,tbl_productos.PNAVIDAD,tbl_productos.fecha FROM tbl_productos WHERE tbl_productos.fecha like '%$buscar%'";
$sql_query = mysqli_query($conexion, $SQL_READ);