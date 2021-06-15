<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:clientes.php");
}
?>
<?php include 'partials/menu.php';?>

 <title>estado_vehiculo</title>
 <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
</head>
<body>

<div class="content">
 <div class="row">
 <div class="col-md-12">
 <div class="row">
 <div class="col-offset-2 col-md-12">
<br>
<br>
<br>
 <h1><center>Registro de estados de automoviles</center></h1>
 </div>
 
 </div>
 
 </div>
 </div>
 <div class="row">
 
 <div class="col-offset-2 col-md-8">
 
 <div class="row">
 
 <div class="col-md-offset-2 col-md-8">
 
 </div>
 </div> 
  </div>
 </div>
 <div class="row">
 
 <div class="col-md-offset-2 col-md-8">
 
 <table class="table table-bordered">
 
 <thead >
 <tr>
 <th class="text-center">#</th>
 <th class="text-center">Estado Vehiculo</th>

 </tr>
 </thead>
 <tbody>
 
 <?php
 include '../../model/conexion.php';
 $pdocn = Database::connect();
 $sql = ('SELECT * FROM estado_vehiculo ORDER BY id_estadovehiculo DESC');
 foreach ($pdocn->query($sql) as $row) {
 echo '<tr>
 <td class="textcenter">'.$row["id_estadovehiculo"].'</td>
 <td class="textcenter">'.$row["estado_vehiculo"].'</td>

 <td class="text-center">
 <a href="readestadovehiculo.php?id='.$row["id_estadovehiculo"].'" class="btn btn-default">Obtener</a>
 <a href="updateestadovehiculo.php?id='.$row["id_estadovehiculo"].'" class="btn btn-success">Modificar</a>
 <a href="eliminarestadovehiculo.php?id='.$row["id_estadovehiculo"].'" class="btn btn-danger">Eliminar</a>
 </td>
 </tr>';
 }
 ?>
     
 </tbody>
 </table>
 </div>
 </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php include 'partials/footer.php';?>
