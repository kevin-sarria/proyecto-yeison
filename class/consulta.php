<?php
//Realiza la consulta a la tabla usuarios para verificar si la información ingresada coincide con la que se encuentra en la base de datos para así mismo permitir o no permitir iniciar sesión.
include('conexion.php');

class consulta extends Conex
{
   


    static function autenticacion( $usuario, $clave1 )
        {   
             
                     
            $clave1 =($clave1); 
            $conexion=self::conectar();
        
            //Esta clase es del modelo.
            $sql  = " SELECT id ";
            $sql .= " FROM usuario ";
            $sql .= " WHERE correo = '$usuario' ";
            $sql .= " AND clave = '$clave1' ";
            $sql;

            $resultado = $conexion->query( $sql );

            return $resultado;
        }

        
}


