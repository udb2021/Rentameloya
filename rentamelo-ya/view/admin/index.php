<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/agente/index.php");
    }
} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php';?>
<div class="container">
	<div class="starter-template">
	<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="jumbotron">
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["nombre"]; ?></h1>
				<p>Panel de control | <span class="label label-info"><?php echo $_SESSION["id_tipousuario"] == 2 ? 'Agente' : 'Administrador'; ?></span></p>
				<p>
					  <a href="../../controller/cerrarSesion.php">
      <button type="button" style="color:black;" name="button">Cerrar sesion</button>
				</p>
			</div>
		</div>
	</div>
</div><!-- /.container -->
<?php include 'partials/footer.php';?>