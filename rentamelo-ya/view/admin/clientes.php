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

 <title>clientes</title>
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
 <h1><center>Formulario de clientes</center></h1>
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
 <tr style="background-color: rgba(191, 191, 191, 0.54);"><td colspan="4"><a href="createcliente.php" class="btn btn-primary" style="width: 100%;">Crear</a></td></tr>
 <table class="table table-bordered">
 
 <thead >
 <tr>
 <th class="text-center">#</th>
 <th class="text-center">Nombre</th>
 <th class="text-center">Apellido</th>
 <th class="text-center">Operaciones</th>
 </tr>
 </thead>
 <tbody>
 
 <?php
 include '../../model/conexion.php';
 $pdocn = Database::connect();
 $sql = ('SELECT * FROM clientes ORDER BY id_cliente DESC');
 foreach ($pdocn->query($sql) as $row) {
 echo '<tr>
 <td class="textcenter">'.$row["id_cliente"].'</td>
 <td class="textcenter">'.$row["nombre"].'</td>
 <td class="textcenter">'.$row["apellido"].'</td>
 <td class="text-center">
 <a href="readcliente.php?id='.$row["id_cliente"].'" class="btn btn-default">Obtener</a>
 <a href="updatecliente.php?id='.$row["id_cliente"].'" class="btn btn-success">Modificar</a>
 <a href="eliminarcliente.php?id='.$row["id_cliente"].'" class="btn btn-danger">Eliminar</a>
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
