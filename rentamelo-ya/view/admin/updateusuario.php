<?php include 'partials/head.php';?>

<?php include 'partials/menu.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Actualizar información del usuario </title>
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
<a href="usuarios.php" class="btn btn-default">Back</a>
</div>
</div>
</div>
</div>
 <div class="row">
 <div class="col-md-offset-2 col-md-8">
 <form action="updateusuario.php" method="POST">
<?php
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
 include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM usuarios where id_usuario = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
<div>
<label for="-">ID</label>
<input type="text" value="'.$data["id_usuario"].'" class="cod" 
readonly="readonly" name="id_usuario">
</div>
 <div>
 <label for="-">Nombre de Usuario</label>
 <input type="text" value="'.$data["nombre_usuario"].'" placeholder="nombre_usuario" class="form-control"  name="nombre_usuario">
 </div>
 <div>
 <label for="-">Nombre</label>
 <input type="text" value="'.$data["nombre"].'" placeholder="nombre " class="form-control"  name="nombre">
 </div>
 <div>
 <label for="-">Apellido</label>
 <input type="text" value="'.$data["apellido"].'" placeholder="apellido" class="form-control" name="apellido">
 </div>
  <div>
 <label for="-">Email</label>
 <input type="text" value="'.$data["email"].'" placeholder="email" class="form-control" name="email">
 </div>
  <div>';
 echo '<div class="form-group">';
 echo '<label for="">Tipo usuario:</label>';
 echo '<select name="id_tipousuario">';
       echo ' <option value="0">Seleccione:</option>';
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM tipousuario");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_tipousuario" value="'.$valores[id_tipousuario].'">'.$valores[tipousuario].'</option>';
		}
       
     echo '</select>
 </div>
 </div>
  <div>';
 echo '<div class="form-group">';
 echo '<label for="">Agencia:</label>';
 echo '<select name="id_agencia">';
       echo ' <option value="0">Seleccione:</option>';
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM agencias");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_agencia" value="'.$valores[id_agencia].'">'.$valores[nombre].'</option>';
		}
       
     echo '</select>
      </div>
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
 $email = trim($_POST['email']);
 $id_tipousuario = trim($_POST['id_tipousuario']);
 $id_agencia = trim($_POST['id_agencia']);
  $cnu = Database::connect();
 $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $cnu->prepare("UPDATE usuarios SET nombre_usuario = ?, nombre= ?, apellido = ?, email = ?, id_tipousuario = ?, id_agencia= ? WHERE id_usuario = ?");
 $query->execute(array($nombre_usuario, $nombre, $apellido, $email, $id_tipousuario, $id_agencia, $id));
 Database::disconnect();
header("Location: usuarios.php");
}
?>
<?php include 'partials/footer.php';?>