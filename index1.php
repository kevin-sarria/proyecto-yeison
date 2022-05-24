<!--iniciamos linia de codigo-->
<html>

<body>
<?php
session_start();

            if(!isset($_SESSION["login"])) {

                header("location:../index.php");
            }
            ?>
        
       <br>
       <!--inicia formulario-->
	<form action="" method="POST">
             
                  <div class="field" id="buscar">
                        <!--ponemos un input para poner un cuadro de texto el cual nos cirvira para realizar la busqueda -->
                        <input type="text" id="buscar" name= "buscar" placeholder="Buscar Registro"/>
                        <!--cerramos input-->
                  </div>
                  <!--envia la información que se encuentra en el input para realisar la consulta en la base de datos con lo que se quiere buscar-->
                  <button>buscar</button>
      </form> 
      <!--fin de formulario-->
       <div class="container">
            <div>
                  <!--iniciamos la creacion de la tabla-->
                   <table class="table">
                        <thead>
                              <th>CEDULA</th>
                              <th>NOMBRE</th>
                              <th>CARGO</th>
                              <th>ASICNACIÓN BASICA</th>
                              <th>CESANTIA</th>
                              <th>PRIMA DE NAVIDAD</th>
                              <th>AÑO</th>
                        </thead>
                        <!--se incluye la consulta e imprime en pantalla los datos buscados-->
                        <?php
                              include "vistas/buscar2.php";
                              
                              while($row= mysqli_fetch_array($sql_query)){?>
                              
                              <tr>
                              <td data-label="CEDULA:"><?=$row['CEDULA'] ?></td>
                              <td data-label="NOMBRE:"><?=$row['NOMBRE']?></td>
                              <td data-label="CARGO:"><?=$row['CARGO']?></td>
                              <td data-label="SALARIO:"><?=$row['SALDO']?></td>
                              <td data-label="CESANTIA:"><?=$row['CESANTIA']?></td>
                              <td data-label="PRIMA:"><?=$row['PNAVIDAD']?></td>
                              <td data-label="año:"><?=$row['fecha']?></td>
                              <?php 
                              
                         }?>
                        
                  </table>
                  <!--finalizamos la creacion de la tabla-->
                        
                  <div class = "bs">
                       <?php
                       //Este condicional lo utilizamos para descargar la información de pendiendo de la búsqueda realizada
                       if ($sql_query->num_rows) {
                             $di="../reporte.php?id=$buscar";                            
                             echo "<button onClick='window.open(". '"' . $di . '"'. ");'>DESCARGAR</button>";
                       }
                       ?>
                      
                  </div>                  
            </div> 
      </div> 


</body>
</html>
<!--finalizamos linia de codigo-->

