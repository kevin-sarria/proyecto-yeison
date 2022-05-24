<?php
//Realizamos la conexión a la base de datos
 class Conex

 {
	 static function conectar()
 { 
	 return mysqli_connect('localhost', 'root', '', 'hospital');
 } 

 } 

?>