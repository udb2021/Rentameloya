<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 1) {
        header("location:../view/admin/index.php");
    }
} else {
    header("location:autos.php");
}
?>
<?php include 'partials/menu.php';?>
<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT carPic FROM automoviles WHERE id_coche =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../user_images/".$imgRow['carPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM automoviles WHERE id_coche =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: autos.php");
	}

?>
 <title>autos</title>
 <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
</head>
<body>
<div class="container">
<br>
<br>
	<div class="page-header">
    	<h1 class="h2">Catalogo de Automoviles. / </h1> 
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT id_coche, placa, marca,modelo, carPic,Kilometraje,num_pasajeros,precio_alquiler,tipo,id_proveedor,id_estadovehiculo,id_agencia FROM automoviles ORDER BY id_coche DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $marca."&nbsp;/&nbsp;".$modelo; ?></p>
				<img src="../user_images/<?php echo $row['carPic']; ?>" class="img-rounded" width="250px" height="250px" />
				<p class="page-header">
				<span>
				
				
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php include 'partials/footer.php';?>
