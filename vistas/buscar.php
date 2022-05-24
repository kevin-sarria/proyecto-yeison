<?php
// consulta para realizar la busqueda en la base de datos, de la  solicitada por el usuario en la barra de busqueda
//incluimos la conexión 
//include '../class/conexion.php';
if(!isset($_POST['buscar'])){

    $_POST['buscar']= "";

    $buscar = $_POST['buscar'];

    if($buscar == "") {
        echo '<p class="mensaje">Da click en buscar para que aparezcan datos</p>';
    }
}

$conexion = Conex::conectar();

$buscar = $_POST['buscar'];
//esta es la consula que se realiza 
$SQL_READ="SELECT tbl_productos.CEDULA,tbl_productos.NOMBRE,tbl_productos.CARGO,tbl_productos.SALDO,tbl_productos.CESANTIA,tbl_productos.PNAVIDAD,tbl_productos.fecha 
FROM tbl_productos 
WHERE CEDULA LIKE '$buscar'";

$sql_query = mysqli_query($conexion, $SQL_READ);