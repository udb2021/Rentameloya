<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:readusuario.php");
}
?>
<?php include 'partials/menu.php';?>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Obtener información del usuario</title>
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
 <h1><center>Informaci&oacute;n del Usuario</center></h1>
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
 <table class="table table-bordered" >
 <thead >
 <tr>
   <th class="text-center">User</th>
 <th class="text-center">Nombre</th>
 <th class="text-center">Apellido</th>
  <th class="text-center">Email</th>
    <th class="text-center">Tipo Usuario</th>
	 <th class="text-center">Agencia</th>
 </tr>
 </thead>
 <tbody>
<?php
if (!empty($_GET)) {
//echo $_GET['id'];
include '../../model/conexion.php';
$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT nombre_usuario, u.nombre, apellido, email, a.nombre as Agencia, t.tipousuario as Usuario FROM usuarios u INNER JOIN tipousuario t ON u.id_tipousuario = t.id_tipousuario INNER JOIN agencias a ON u.id_agencia = a.id_agencia where id_usuario = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);
echo '
 <tr>
  <td class="text-center">'.$data["nombre_usuario"].'</td>
 <td class="text-center">'.$data["nombre"].'</td>
 <td class="text-center">'.$data["apellido"].'</td>
 <td class="text-center">'.$data["email"].'</td>
 <td class="text-center">'.$data["Usuario"].'</td>
 <td class="text-center">'.$data["Agencia"].'</td>
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