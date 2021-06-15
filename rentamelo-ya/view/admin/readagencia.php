<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:readagencia.php");
}
?>
<?php include 'partials/menu.php';?>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Obtener información de agencia</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<br>
<br>
<br>
<div class="content">
 <div class="row">
 <div class="col-md-12">
 <div class="row">
 <div class="col-md-12">
 <h1><center>Informaci&oacute;n de agencia</center></h1>
 </div>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-offset-2 col-md-8">
 <div class="row">
 <div class="col-md-offset-2 col-md-8">
 <a href="agencias.php" class="btn btn-default">Back</a>
 </div>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-md-offset-2 col-md-8">
 <table class="table table-bordered" >
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
if (!empty($_GET)) {
//echo $_GET['id'];
include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM agencias where id_agencia = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
 <tr>
 <td class="text-center">'.$data["id_agencia"].'</td>
 
 <td class="text-center">'.$data["nombre"].'</td>

 <td class="text-center">'.$data["telefono"].'</td>
 <td class="text-center">'.$data["direccion"].'</td>

 </tr>
';
}
else{
 echo "nada ha venido";
}
?>
 </tbody>
 </table>
 </div>
 </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'partials/footer.php';?>