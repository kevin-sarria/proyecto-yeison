<?php
//La información es enviada desde el formulario y esta pasa hacer comprobada con el archivo incluido.  
    include( "../class/consulta.php" );
    
     //captura la información enviada 
    $usuario = $_POST[ 'usuario' ];
    $clave1 = $_POST[ 'clave' ];
    $r = consulta::autenticacion( $usuario, $clave1 );
    

 
    //Este condicional sirve para enviarnos al inicio si la información esta mal o dejarnos iniciar sesión si al momento de realizar la consulta la información es correcta 

    if (($r->num_rows) == 1)
    {
        session_start();

        $_SESSION["login"]=$_POST["usuario"]; 


        header( "location:../importar.php" );
        
      
    }
    else{
       
        header( "location:../vistas/iniciar-sesión.php" );







    }

    $files= $r->fetch_all(MYSQLI_ASSOC);
    
     die();

   
    
    //Imprimir si estamos autenticados o no.
   