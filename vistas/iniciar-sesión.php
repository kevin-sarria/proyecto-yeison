<body>
  <a href="../index.php"><button>volver</button></a>
  <div class="aa">
    <!--realizamos un formulario el cual nos sirve para comprobar la información ingresada con la que se encuentra alojada a la base de datos-->
    <form action="../controladores/c-autenticacion.php" method="POST">
      
      <label for="email">Correo</label>
      <input type="email" name="usuario" id="email" required>

      <label for="password">Contraseña</label>
      <input type="password" name="clave" id="password" required minlength="5" maxlength="8" title="error"><br>

      <input type="submit" value="Aceptar">

    </form>
  </div>
</body>

</html>
<!--finalizamos linia de codigo-->