<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:agencias.php");
}
?>
<?php include 'partials/menu.php';?>

 <title>agencias</title>
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
 <h1><center>Formulario de agencias</center></h1>
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
 <th class="text-center">Nombre</th>
 <th class="text-center">Direccion</th>
  <th class="text-center">Telefono</th>
 
 </tr>
 </thead>
 <tbody>
 
 <?php
 include '../../model/conexion.php';
 $pdocn = Database::connect();
 $sql = ('SELECT * FROM agencias ORDER BY id_agencia DESC');
 foreach ($pdocn->query($sql) as $row) {
 echo '<tr>
 <td class="textcenter">'.$row["id_agencia"].'</td>
 <td class="textcenter">'.$row["nombre"].'</td>
 <td class="textcenter">'.$row["direccion"].'</td>
 <td class="textcenter">'.$row["telefono"].'</td>

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

