
<?php

    // Iniciamos la sesión para saber si el usuario esta logueado o no.
    session_start();

    // Importamos la conexión
    include( "class/conexion.php" );

    // Importamos la cabecera
    include('./vistas/header.php');
    
    // Importamos la tabla del historial
    include( "vistas/v-historial.php" ); 

    // Importamos el footer
    include('./vistas/footer.php');
?>