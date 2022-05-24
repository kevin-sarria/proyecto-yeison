

<?php
//con este codigo realizamos la importación de la información a lojada en un Excel y subirla a la base de datos
include('vistas/dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $CEDULA = "";
                if(isset($Row[0])) {
                    $CEDULA = mysqli_real_escape_string($con,$Row[0]);
                }
                
                $NOMBRE = "";
                if(isset($Row[1])) {
                    $NOMBRE = mysqli_real_escape_string($con,$Row[1]);
                }
				
                $CARGO = "";
                if(isset($Row[2])) {
                    $CARGO = mysqli_real_escape_string($con,$Row[2]);
                }
				
                $SALDO = "";
                if(isset($Row[3])) {
                    $SALDO = mysqli_real_escape_string($con,$Row[3]);
                }

                $CESANTIA = "";
                if(isset($Row[4])) {
                    $CESANTIA = mysqli_real_escape_string($con,$Row[4]);
                }

                $PRIMA = "";
                if(isset($Row[5])) {
                    $PRIMA = mysqli_real_escape_string($con,$Row[5]);
                }
                
                $fecha = "";
                if(isset($Row[6])) {
                    $fecha = mysqli_real_escape_string($con,$Row[6]);
                }
                if (!empty($CEDULA) || !empty($NOMBRE) || !empty($CARGO) || !empty($SALDO) || !empty($CESANTIA) || !empty($PRIMA) || !empty($fecha)) {
                    $query = "insert into tbl_productos(CEDULA,NOMBRE,CARGO,SALDO,CESANTIA,PNAVIDAD,fecha) values('".$CEDULA."','".$NOMBRE."','".$CARGO."','".$SALDO."','".$CESANTIA."','".$PRIMA."','".$fecha."')";
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
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>

<body>
<?php
session_start();

            if(!isset($_SESSION["login"])) {

                header("location:index.php");
            }
            ?>
<header> 
  <!-- barra de navegación fija -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="vistas/cierre.php">Cerrar Sesión<span class="sr-only">(current)</span></a> </li>
        <li class="nav-item active"> <a class="nav-link" href="controladores/c-buscar2.php">historial<span class="sr-only">(current)</span></a> </li>
      </ul>
    </div>
  </nav>
</header>

<!-- Contenido de la página de inicio -->

<div class="container">
  <h3 class="mt-5">Importar archivo de Excel a la base de datos</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
    
    <form action="vistas/eliminar.php">
            
        limpiar base de datos<button type="submit" id="submit" name="eliminar"
                    class="btn-submit">eliminar</button>
        </form>
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar Registros</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
        
    
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fila de aletas --> 

  
</div>
<!-- Fin contenedor -->


 <script src="./assets/jquery-1.12.4-jquery.min.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="./dist/js/bootstrap.min.js"></script>
</body>
</html>