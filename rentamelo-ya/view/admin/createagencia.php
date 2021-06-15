<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:createagencia.php");
}
?>
<?php include 'partials/menu.php';?>

<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Ingresar nuevo agencia</title>
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
 <h1><center>Crear un nuevo agencia</center></h1>
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
 <div class="col-md-offset-3 col-md-6">
 <form action="createagencia.php" method="POST">

 <div class="form-group">
 <label for="nombre">Nombre agencia </label>
 <input type="text" class="form-control" placeholder="Nombre " name="nombre" id="nombre" />
 </div>
 <div class="form-group">
 <label for="direccion">Direccion</label>
 <input type="text" class="form-control" placeholder="direccion" name="direccion" id="direccion" />
 </div>
<div class="form-group">
 <label for="">Telefono</label>
 <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" />
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
	

 $nombre = trim($_POST['nombre']);
 $direccion = trim($_POST['direccion']);
 $telefono = trim($_POST['telefono']);
 $cn = Database::connect();
 $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("INSERT INTO agencias ( nombre, direccion, telefono) VALUES(?, ?, ?)");
 $query->execute(array( $nombre, $direccion, $telefono));
 Database::disconnect();
  
}
?>
<?php include 'partials/footer.php';?>