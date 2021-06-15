<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:eliminaragencia.php");
}
?>
<?php include 'partials/menu.php';?>

<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Actualizar información de estado </title>
 <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script type="text/javascript"> 
function pregunta(){ 
    if (confirm('¿Estas seguro de eliminar este estado de vehiculo?')){ 
       document.formu.submit() 
    } 
} 
</script>
</head>
<body>
<div class="content">
 <div class="row">
 <div class="col-md-12">
 <div class="row">
  <div class="col-md-12">
  <br>
  <br>
  <br>
 <h1><center>Eliminar</center></h1>
 </div>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-offset-2 col-md-8">
 <div class="row">
 <div class="col-md-offset-2 col-md-8">
 <a href="estado_vehiculo.php" class="btn btn-default">Back</a>
 </div>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-md-offset-3 col-md-6">
 <form action="eliminarestadovehiculo.php" method="POST" name="formu">
<?php
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM estado_vehiculo where id_estadovehiculo= ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
 <div>
 <label for="-"></label>
 <input type="text" value="'.$data["id_estadovehiculo"].'" class="form-control" readonly="readonly" name="id_estadovehiculo">
 </div>
 <div>
 <label for="-"></label>
 <input type="text" value="'.$data["estado_vehiculo"].'" placeholder="estado_vehiculo" class="form-control" name="estado_vehiculo" readonly="readonly">
 </div>
 
<br>
';
Database::disconnect();
}
?>
 <div>
  <input type="button" class="btn btn-danger" value="Eliminar" onclick="pregunta()">
 </div>
 </form>
 </div>
 </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php
if (!empty($_POST)) {
 include '../../model/conexion.php';
 $id = trim($_POST['id_estadovehiculo']);
 $estado_vehiculo = trim($_POST['estado_vehiculo']);

 $cnu = Database::connect();
 $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $cnu->prepare("delete from estado_vehiculo where id_estadovehiculo = ?");
 $query->execute(array($id));
 Database::disconnect();
 header("Location: estado_vehiculo.php");
}
?>
<?php include 'partials/footer.php';?>
