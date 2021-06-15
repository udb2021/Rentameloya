<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT placa,
			marca,modelo, 
			Kilometraje,num_pasajeros,
			precio_alquiler,tipo,id_proveedor,id_estadovehiculo,
			id_agencia, carPic FROM automoviles WHERE id_coche =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: autos.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$placa = $_POST['placa'];// user name
		$marca = $_POST['marca'];// user 
		$modelo = $_POST['modelo'];// user name
		$Kilometraje = $_POST['Kilometraje'];// user 
		$num_pasajeros = $_POST['num_pasajeros'];// user name
		$precio_alquiler = $_POST['precio_alquiler'];// user 
		$tipo = $_POST['tipo'];// user name
		$id_proveedor = $_POST['id_proveedor'];// user 
		$id_estadovehiculo = $_POST['id_estadovehiculo'];// user 
		$id_agencia = $_POST['id_agencia'];// user 
		
		
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$carPic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['carPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$carPic);
				}
				else
				{
					$errMSG = " La imagen debe ser menor de  5MB";
				}
			}
			else
			{
				$errMSG = "Solo Formato JPG, JPEG, PNG & GIF disponible.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$carPic = $edit_row['carPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE automoviles 
									     SET placa=:placa, 
										     marca=:marca, 
											 modelo=:modelo, 
											 Kilometraje=:Kilometraje, 
										     num_pasajeros=:num_pasajeros, 
										    precio_alquiler=:precio_alquiler,   
										    tipo=:tipo, 
										    id_proveedor=:id_proveedor,   
										    id_estadovehiculo=:id_estadovehiculo,  
										     id_agencia=:id_agencia, 
										     carPic=:upic 
								       WHERE id_coche=:uid');
									   
			$stmt->bindParam(':placa',$placa);
			$stmt->bindParam(':marca',$marca);
			$stmt->bindParam(':modelo',$modelo);
			$stmt->bindParam(':Kilometraje',$Kilometraje);
			$stmt->bindParam(':num_pasajeros',$num_pasajeros);
			$stmt->bindParam(':precio_alquiler',$precio_alquiler);
			$stmt->bindParam(':tipo',$tipo);
			$stmt->bindParam(':id_proveedor',$id_proveedor);
			$stmt->bindParam(':id_estadovehiculo',$id_estadovehiculo);
			$stmt->bindParam(':id_agencia',$id_agencia);
			$stmt->bindParam(':upic',$carPic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Exitosamente Actualizado ');
				window.location.href='autos.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Los datos no fueron actualizados !";
			}
		
		}
		
						
	}
	
?>
<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["id_tipousuario"] == 2) {
        header("location:../view/admin/index.php");
    }
} else {
    header("location:autos.php");
}
?>
<?php include 'partials/menu.php';?>
 <br><br>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">Editar Auto. / <a class="btn btn-default" href="autos.php"> Automoviles </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
 <tr>
    	<td><label class="control-label">Placa.</label></td>
        <td><input class="form-control" type="text" name="placa" 
		placeholder="Placa del auto" value="<?php echo $placa; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Marca.</label></td>
        <td><input class="form-control" type="text" 
		name="marca" placeholder="Marca del auto" 
		value="<?php echo $marca; ?>" /></td>
    </tr>
     <tr>
    	<td><label class="control-label">Modelo.</label></td>
        <td><input class="form-control" type="text" 
		name="modelo" placeholder="Modelo del auto" 
		value="<?php echo $modelo; ?>" /></td>
    </tr>
   
      <tr>
    	<td><label class="control-label">Kilometraje.</label></td>
        <td><input class="form-control" type="text" 
		name="Kilometraje" placeholder="Kilometraje del auto" 
		value="<?php echo $Kilometraje; ?>" /></td>
    </tr>
	  <tr>
    	<td><label class="control-label">Numero pasajeros.</label></td>
        <td><input class="form-control" type="text" 
		name="num_pasajeros" placeholder="Modelo del auto" 
		value="<?php echo $num_pasajeros; ?>" /></td>
    </tr>
	  <tr>
    	<td><label class="control-label">Precio Alquiler.</label></td>
        <td><input class="form-control" type="text" 
		name="precio_alquiler" placeholder="precio de alquiler" 
		value="<?php echo $precio_alquiler; ?>" /></td>
    </tr>
	  <tr>
    	<td><label class="control-label">Tipo.</label></td>
        <td><input class="form-control" type="text" 
		name="tipo" placeholder="Tipo del auto" 
		value="<?php echo $tipo; ?>" /></td>
    </tr>  <tr>
    	<td><label class="control-label">Proveedor.</label></td>
        <td>

		<select name="id_proveedor">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM proveedor_vehiculo");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_proveedor" value="'.$valores[id_proveedor].'">'.$valores[proveedor].'</option>';
		}
        ?>
      </select>
      </td>
    </tr>  <tr>
    	<td><label class="control-label">Estado vehiculo.</label></td>
        <td><select name="id_estadovehiculo">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM estado_vehiculo");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_estadovehiculo" value="'.$valores[id_estadovehiculo].'">'.$valores[estado_vehiculo].'</option>';
		}
        ?>
      </select></td>
    </tr>  <tr>
    	<td><label class="control-label">Agencia.</label></td>
        <td><select name="id_agencia">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = new mysqli('localhost', 'root', '', 'rent_a_car');
 		$query = $mysqli -> query ("SELECT * FROM agencias");
					
		while ($valores = mysqli_fetch_array($query)) {
						
  		echo '<option name="id_agencia" value="'.$valores[id_agencia].'">'.$valores[nombre].'</option>';
		}
        ?>
      </select></td>
    </tr>
    	<td><label class="control-label">Carro Img.</label></td>
        <td>
        	<p><img src="../user_images/<?php echo $carPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Actualizar
        </button>
        
        <a class="btn btn-default" href="autos.php"> <span class="glyphicon glyphicon-backward"></span> Cancelar </a>
        
        </td>
    </tr>
    
    </table>
    
</form>




</div>
</body>
</html>