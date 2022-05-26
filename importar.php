<?php
//con este codigo realizamos la importación de la información a lojada en un Excel y subirla a la base de datos
include('vistas/dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

session_start();

if (!isset($_SESSION['login'])) {
  header('location: ./');
}


if (isset($_POST["import"])) {

  $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if (in_array($_FILES["file"]["type"], $allowedFileType)) {

    $targetPath = 'subidas/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $Reader = new SpreadsheetReader($targetPath);

    $sheetCount = count($Reader->sheets());
    for ($i = 0; $i < $sheetCount; $i++) {

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row) {

        $CEDULA = "";
        if (isset($Row[0])) {
          $CEDULA = mysqli_real_escape_string($con, $Row[0]);
        }

        $NOMBRE = "";
        if (isset($Row[1])) {
          $NOMBRE = mysqli_real_escape_string($con, $Row[1]);
        }

        $CARGO = "";
        if (isset($Row[2])) {
          $CARGO = mysqli_real_escape_string($con, $Row[2]);
        }

        $SALDO = "";
        if (isset($Row[3])) {
          $SALDO = mysqli_real_escape_string($con, $Row[3]);
        }

        $CESANTIA = "";
        if (isset($Row[4])) {
          $CESANTIA = mysqli_real_escape_string($con, $Row[4]);
        }

        $PRIMA = "";
        if (isset($Row[5])) {
          $PRIMA = mysqli_real_escape_string($con, $Row[5]);
        }

        $fecha = "";
        if (isset($Row[6])) {
          $fecha = mysqli_real_escape_string($con, $Row[6]);
        }
        if (!empty($CEDULA) || !empty($NOMBRE) || !empty($CARGO) || !empty($SALDO) || !empty($CESANTIA) || !empty($PRIMA) || !empty($fecha)) {
          $query = "insert into tbl_productos(CEDULA,NOMBRE,CARGO,SALDO,CESANTIA,PNAVIDAD,fecha) values('" . $CEDULA . "','" . $NOMBRE . "','" . $CARGO . "','" . $SALDO . "','" . $CESANTIA . "','" . $PRIMA . "','" . $fecha . "')";
          $resultados = mysqli_query($con, $query);

          if (!empty($resultados)) {
            $type = "success";
            $message = "Excel importado correctamente";
          } else {
            $type = "error";
            $message = "Hubo un problema al importar registros";
          }
        }
      }
    }
  } else {
    $type = "error";
    $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}

include('./vistas/header.php');

?>

<!-- Contenido de la página de inicio -->

<section class="contenedor-formularios-admin">
  <form method="POST" class="formulario upload-DB" enctype="multipart/form-data">

    <h3>Importar archivo de Excel a la base de datos</h3>

    <label for="btn-subir">Elija el archivo Excel</label>

    <input type="file" name="file" id="btn-subir" accept=".xls,.xlsx">

    <input name="import" type="submit" value="Importar Registros">

  </form>


  <form method="POST" class="formulario clean-DB" action="">

    <label class="centrar-flex">Limpiar la base de datos</label>

    <input type="submit" value="Limpiar">

  </form>
</section>

<script src="/proyecto-yeison/js/importar.js"></script>

<?php include('./vistas/footer.php'); ?>