<?php

//este codigo realiza la exportación de la información alojada en una base de datos y la descarga en formato Excel
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$buscar = isset( $_GET['id']) ? $_GET['id'] : "";
include("class/conexion.php");
$conexion = Conex::conectar();
$consulta = "SELECT tbl_productos.CEDULA,tbl_productos.NOMBRE,tbl_productos.CARGO,tbl_productos.SALDO,tbl_productos.CESANTIA,tbl_productos.PNAVIDAD,tbl_productos.fecha  FROM tbl_productos WHERE tbl_productos.fecha like '%$buscar%'";

$resultado = $conexion->query($consulta);   
$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("registro");

$hojaActiva->getColumnDimension('A')->setWidth(40);
$hojaActiva->setCellValue('A1','CEDULA');
$hojaActiva->getColumnDimension('B')->setWidth(40);
$hojaActiva->setCellValue('B1','NOMBRE');
$hojaActiva->getColumnDimension('C')->setWidth(40);
$hojaActiva->setCellValue('C1','CARGO');
$hojaActiva->getColumnDimension('D')->setWidth(40);
$hojaActiva->setCellValue('D1','SALDO');
$hojaActiva->getColumnDimension('E')->setWidth(40);
$hojaActiva->setCellValue('E1','CESANTIA');
$hojaActiva->getColumnDimension('F')->setWidth(45);
$hojaActiva->setCellValue('F1','PRIMA DE NAVIDAD');
$hojaActiva->getColumnDimension('G')->setWidth(45);
$hojaActiva->setCellValue('G1','AÑO');


$fila = 2;

while($row= $resultado->fetch_assoc()) {

    $hojaActiva->setCellValue('A'.$fila, $row['CEDULA']);
    $hojaActiva->setCellValue('B'.$fila, $row['NOMBRE']);
    $hojaActiva->setCellValue('C'.$fila, $row['CARGO']);
    $hojaActiva->setCellValue('D'.$fila, $row['SALDO']);
    $hojaActiva->setCellValue('E'.$fila, $row['CESANTIA']);
    $hojaActiva->setCellValue('F'.$fila, $row['PNAVIDAD']);
    $hojaActiva->setCellValue('G'.$fila, $row['fecha']);
    
    
    $fila++;
}
/* Aquí habrá un código donde creas una hoja de cálculo */

// redirigir la salida al navegador del cliente
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="myfile.xlsx"');
header('Cache-Control: max-age=0');

$writer =IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>