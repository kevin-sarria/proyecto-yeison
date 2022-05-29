<div class="centrar-flex">
      <!--inicia formulario-->
      <form method="POST" class="formulario">
            <!--ponemos un input para poner un cuadro de texto el cual nos cirvira para realizar la busqueda -->
            <input type="number" id="buscar" name="buscar" placeholder="Buscar Registro" />
            <!--cerramos input-->
            <!--envia la información que se encuentra en el input para realisar la consulta en la base de datos con lo que se quiere buscar-->
            <input type="submit" value="Buscar">
            <!--fin de formulario-->
      </form>
</div>

<div class="contenedor__tabla centrar-flex">
      <!--iniciamos la creacion de la tabla-->
      <table class="tabla">

            <?php

            //include "buscar.php";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {



                  $buscar = $_POST['buscar'];

                  if ($_POST['buscar'] == '') {

                  echo '<p class="mensaje">Por favor ingrese información</p>';
                  return;

                  } else  {
                        $conexion = Conex::conectar();

                        //esta es la consula que se realiza 
                        $SQL_READ="SELECT CEDULA, NOMBRE, CARGO, SALDO, CESANTIA, PNAVIDAD, fecha FROM tbl_productos WHERE CEDULA LIKE '$buscar';";

                        $resultado = mysqli_query($conexion, $SQL_READ);
                        
                        mysqli_fetch_assoc($resultado);


                        if ( !$resultado->num_rows ) {

                              echo '<p class="mensaje">No se han encontrado resultados</p>';
                              return;
      
                        } else {
                              echo "<thead>
                              <th>CEDULA</th>
                              <th>NOMBRE</th>
                              <th>CARGO</th>
                              <th>ASIGNACIÓN BASICA</th>
                              <th>CESANTIA</th>
                              <th>PRIMA DE NAVIDAD</th>
                              <th>AÑO</th>
                              </thead>";

                              foreach($resultado as $row):
                              ?>

                              <tr>
                              <td data-label="CEDULA:"><?php echo $row['CEDULA'] ?></td>
                              <td data-label="NOMBRE:"><?php echo $row['NOMBRE'] ?></td>
                              <td data-label="CARGO:"><?php echo $row['CARGO'] ?></td>
                              <td data-label="SALARIO:"><?php echo $row['SALDO'] ?></td>
                              <td data-label="CESANTIA:"><?php echo $row['CESANTIA'] ?></td>
                              <td data-label="PRIMA:"><?php echo $row['PNAVIDAD'] ?></td>
                              <td data-label="año:"><?php echo $row['fecha'] ?></td>
                              <?php endforeach; ?>
                        </tr>
                        <?php
                        }

                  }
                  
            } else {
                  echo '<p class="mensaje">Da click en buscar para que aparezcan datos</p>';
            }

            ?>
                  
      </table>
      <!--finalizamos la creacion de la tabla-->
</div>