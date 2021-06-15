<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:createcliente.php");
}
?>
<?php include 'partials/menu.php';?>

<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Ingresar nuevo cliente</title>
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
 <h1><center>Crear un nuevo cliente</center></h1>
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
 <div class="col-md-offset-3 col-md-6">
 <form action="createcliente.php" method="POST">
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
 <label for="dui">Dui</label>
 <input type="text" class="form-control" placeholder="Dui" name="dui" id="dui" />
 </div>
  <div class="form-group">
 <label for="direccion">Direccion</label>
 <input type="text" class="form-control" placeholder="direccion" name="direccion" id="direccion" />
 </div>
   <div class="form-group">
 <label for="pais">Pais</label>
 <input type="text" class="form-control" placeholder="pais" name="pais" id="v" />
 </div>
   <div class="form-group">
 <label for="email">Email</label>
 <input type="text" class="form-control" placeholder="Email" name="email" id="email" />
 </div>
<div class="form-group">
 <label for="">Telefono</label>
 <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" />
 </div>
 
 <td><label class="control-label">Tipo usuario.</label></td>
        <td>

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
      </td>
	  
  <div class="form-group">
  <br>
 <label for="password">Contraseña</label>
 <input type="password" class="form-control" id="clave"
placeholder="password" name="clave" id="clave" />
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
 $dui = trim($_POST['dui']);
 $direccion = trim($_POST['direccion']);
 $pais = trim($_POST['pais']);
 $email = trim($_POST['email']);
 $telefono = trim($_POST['telefono']);
 $clave = md5(trim($_POST['clave']));

 $cn = Database::connect();
 $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("INSERT INTO clientes (nombre_usuario, nombre, apellido, dui, direccion, pais, email, telefono, clave) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $query->execute(array($nombre_usuario, $nombre, $apellido, $dui, $direccion, $pais, $email, $telefono, $clave));
 Database::disconnect();
  
}
?>
<?php include 'partials/footer.php';?>