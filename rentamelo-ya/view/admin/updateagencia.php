<?php include 'partials/head.php';?>

<?php include 'partials/menu.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Actualizar información de agencia</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<div class="content">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-offset-2 col-md-8">
<br>
<br>
<br>
<h1><center>Actualizar</h1>
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
 <form action="updateagencia.php" method="POST">
<?php
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
 include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM agencias where id_agencia = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
<div>
<label for="-">-</label>
<input type="text" value="'.$data["id_agencia"].'" class="cod" 
readonly="readonly" name="id_agencia">
</div>

 <div>
 <label for="-"></label>
 <input type="text" value="'.$data["nombre"].'" placeholder="nombre " class="form-control"  name="nombre">
 </div>
 <div>
 <label for="-"></label>
 <input type="text" value="'.$data["direccion"].'" placeholder="direccion" class="form-control" name="direccion">
 </div>
  <div>
 <label for="-"></label>
 <input type="text" value="'.$data["telefono"].'" placeholder="telefono" class="form-control" name="telefono">
 </div>
  
 <br>
';
Database::disconnect();
}
?>
<div>
<input type="submit" class="btn btn-success" value="Actualizar">
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

 $id = trim($_POST['id_agencia']);
 
 $nombre = trim($_POST['nombre']);
 $direccion = trim($_POST['direccion']);
 $telefono = trim($_POST['telefono']);
 
  $cnu = Database::connect();
 $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $cnu->prepare("UPDATE agencias SET  nombre= ?, direccion = ?, telefono = ?  WHERE id_agencia = ?");
 $query->execute(array( $nombre, $direccion, $telefono, $id));
 Database::disconnect();
header("Location: agencias.php");
}
?>
<?php include 'partials/footer.php';?>