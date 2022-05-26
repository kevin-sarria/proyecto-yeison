<?php
  include('./header.php');
?>


<a href="../index.php" class="volver"><img src="/proyecto-yeison/img/volver.png" alt="Volver"></a>

<section class="centrar-flex">


  <div class="contenedor-formulario">
    <!--realizamos un formulario el cual nos sirve para comprobar la información ingresada con la que se encuentra alojada a la base de datos-->

    <h3 class="centrar-flex">Iniciar Sesión</h3>

    <form action="../controladores/c-autenticacion.php" method="POST" class="formulario">

      <label for="email">Correo</label>
      <input type="email" name="usuario" id="email" required>

      <label for="password">Contraseña</label>
      <input type="password" name="clave" id="password" required minlength="5" maxlength="8" title="error"><br>

      <input type="submit" value="Ingresar">

    </form>
  </div>

</section>

<?php
  include('./footer.php');
?>