<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:createusuario.php");
}
?>
<?php include 'partials/menu.php';?>

<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Ingresar nuevo usuario</title>
 <link rel="stylesheet" href="css/bootstrap.min.css" />
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
 <h1><center>Crear un nuevo usuario</center></h1>
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
 <div class="col-md-offset-3 col-md-6">
 <form action="createusuario.php" method="POST">
 <div class="form-group">
 <label for="nombre_usuario">Nombre Usuario</label>
 <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre_usuario" id="nombre_usuario" />
 </div>
 <div class="form-group">
 <label for="nombre">Nombre</label>
 <input type="text" class="form-control" placeholder="Nombre " name="nombre" id="nombre" />
 </div>
 <div class="form-group">
 <label for="apellido">Apellido</label>
 <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido" />
 </div>
  <div class="form-group">
 <label for="email">Email</label>
 <input type="text" class="form-control" placeholder="Email" name="email" id="email" />
 </div>
  <div class="form-group">
 <label for="password">Contraseña</label>
 <input type="password" class="form-control" id="clave"
placeholder="password" name="clave" id="clave" />
 </div>
 <div class="form-group">
 <label for="">Tipo usuario: </label>
 <select name="id_tipousuario">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM tipousuario");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_tipousuario" value="'.$valores[id_tipousuario].'">'.$valores[tipousuario].'</option>';
		}
        ?>
      </select>
 </div>
<div class="form-group">
 <label for="">Agencia: </label>
 <select name="id_agencia">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM agencias");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_agencia" value="'.$valores[id_agencia].'">'.$valores[nombre].'</option>';
		}
        ?>
      </select>
 </div>

 <button type="submit" class="btn btn-success">Enviar</button>
 </form>
 </div>
 </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php
 include '../../model/conexion.php';
if (!empty($_POST)) {
	
 $nombre_usuario = trim($_POST['nombre_usuario']);
 $nombre = trim($_POST['nombre']);
 $apellido = trim($_POST['apellido']);
 $email = trim($_POST['email']);
 $clave = md5(trim($_POST['clave']));
 $id_tipousuario = trim($_POST['id_tipousuario']);
 $id_agencia = trim($_POST['id_agencia']);
 $cn = Database::connect();
 $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("INSERT INTO usuarios (nombre_usuario, nombre, apellido, email, clave, id_tipousuario, id_agencia) VALUES(?, ?, ?, ?, ?, ?, ?)");
 $query->execute(array($nombre_usuario, $nombre, $apellido, $email, $clave, $id_tipousuario, $id_agencia));
 Database::disconnect();

}
?>
<?php include 'partials/footer.php';?>