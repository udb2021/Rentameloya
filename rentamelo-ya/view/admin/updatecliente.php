<?php include 'partials/head.php';?>

<?php include 'partials/menu.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Actualizar información del cliente</title>
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
<a href="clientes.php" class="btn btn-default">Back</a>
</div>
</div>
</div>
</div>
 <div class="row">
 <div class="col-md-offset-2 col-md-8">
 <form action="updatecliente.php" method="POST">
<?php
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
 include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM clientes where id_cliente = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
<div>
 <label for="-">ID</label>
 <input type="text" value="'.$data["id_cliente"].'" readonly="readonly" placeholder="nombre_usuario" class="form-control"  name="id_usuario">
 </div>
 <div>
 <label for="-">Nombre Usuario</label>
 <input type="text" value="'.$data["nombre_usuario"].'" placeholder="nombre_usuario" class="form-control"  name="nombre_usuario">
 </div>
 <div>
 <label for="-">Nombres</label>
 <input type="text" value="'.$data["nombre"].'" placeholder="nombre " class="form-control"  name="nombre">
 </div>
 <div>
 <label for="-">Apellidos</label>
 <input type="text" value="'.$data["apellido"].'" placeholder="apellido" class="form-control" name="apellido">
 </div>
   <div>
 <label for="-">Dui</label>
 <input type="text" value="'.$data["dui"].'" placeholder="dui" class="form-control" name="dui">
 </div>
  <div>
 <label for="-">Direccion</label>
 <input type="text" value="'.$data["direccion"].'" placeholder="direccion" class="form-control" name="direccion">
 </div>
   <div>
 <label for="-">Pais</label>
 <input type="text" value="'.$data["pais"].'" placeholder="pais" class="form-control" name="pais">
 </div>
  <div>
 <label for="-">Email</label>
 <input type="text" value="'.$data["email"].'" placeholder="email" class="form-control" name="email">
 </div>
   <div>
 <label for="-">Telefono</label>
 <input type="text" value="'.$data["telefono"].'" placeholder="telefono" class="form-control" name="telefono">
 </div>
  <div>
 <label for="-">Contraseña</label>
 <input type="text" value="'.$data["clave"].'" class="form-control readonly="readonly" name="clave" disabled="true">
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

 $id = trim($_POST['id_usuario']);
 $nombre_usuario = trim($_POST['nombre_usuario']);
 $nombre = trim($_POST['nombre']);
 $apellido = trim($_POST['apellido']);
 $dui = trim($_POST['dui']);
 $direccion = trim($_POST['direccion']);
 $pais = trim($_POST['pais']);
 $email = trim($_POST['email']);
 $telefono = trim($_POST['telefono']);

  $cnu = Database::connect();
 $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $cnu->prepare("UPDATE clientes SET nombre_usuario = ?, nombre= ?, apellido = ?, dui = ?, direccion = ?, pais = ?, email = ?, telefono = ? WHERE id_cliente = ?");
 $query->execute(array($nombre_usuario, $nombre, $apellido, $dui, $direccion, $pais,  $email, $telefono, $id));
 Database::disconnect();
header("Location: clientes.php");
}
?>
<?php include 'partials/footer.php';?>