<?php
// con este codigo le limpia la tabla tbl_productos de la base de datos 
include("../class/el-bd.php");
$eliminar=$_GET['eliminar'];

Eliminarambientes::Eliminar($eliminar);