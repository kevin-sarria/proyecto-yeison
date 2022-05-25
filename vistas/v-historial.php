<div class="centrar-flex">
      <!--inicia formulario-->
      <form action="" method="POST" class="formulario">
            <!--ponemos un input para poner un cuadro de texto el cual nos cirvira para realizar la busqueda -->
            <input type="text" id="buscar" name="buscar" placeholder="Buscar Registro" />
            <!--cerramos input-->
            <!--envia la información que se encuentra en el input para realisar la consulta en la base de datos con lo que se quiere buscar-->
            <button>Buscar</button>
            <!--fin de formulario-->
      </form>
</div>

<div class="contenedor__tabla centrar-flex">
      <!--iniciamos la creacion de la tabla-->
      <table class="tabla">

            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if ($_POST['buscar'] == '') {

                  echo '<p class="mensaje">Por favor ingrese información</p>';
                  return;

                  } else if ( !is_int($_POST['buscar']) ) {

                        echo '<p class="mensaje">Por favor ingrese información</p>';
                        return;

                  } else if (is_int((int)$_POST['buscar'])) {
                        echo "<thead>
                     <th>CEDULA</th>
                     <th>NOMBRE</th>
                     <th>CARGO</th>
                     <th>ASIGNACIÓN BASICA</th>
                     <th>CESANTIA</th>
                     <th>PRIMA DE NAVIDAD</th>
                     <th>AÑO</th>
                        </thead>";
                  
                        return;
                  }
            }

            ?>

            <!--se incluye la consulta e imprime en pantalla los datos buscados-->
            <?php
            include "buscar.php";
            while ($row = mysqli_fetch_array($sql_query)) {
            ?>
                  <tr>
                        <td data-label="CEDULA:"><?= $row['CEDULA'] ?></td>
                        <td data-label="NOMBRE:"><?= $row['NOMBRE'] ?></td>
                        <td data-label="CARGO:"><?= $row['CARGO'] ?></td>
                        <td data-label="SALARIO:"><?= $row['SALDO'] ?></td>
                        <td data-label="CESANTIA:"><?= $row['CESANTIA'] ?></td>
                        <td data-label="PRIMA:"><?= $row['PNAVIDAD'] ?></td>
                        <td data-label="año:"><?= $row['fecha'] ?></td>
                  <?php } ?>
      </table>
      <!--finalizamos la creacion de la tabla-->
</div>