<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
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
		
		
		if(empty($placa)){
			$errMSG = "ingresa placa.";
		}
		
		else if(empty($marca)){
			$errMSG = "ingresa marca.";
		}
		else if(empty($modelo)){
			$errMSG = "ingresa modelo.";
		}else if(empty($Kilometraje)){
			$errMSG = "ingresa Kilometraje.";
		}else if(empty($num_pasajeros)){
			$errMSG = "ingresa numero de pasajeros.";
		}else if(empty($precio_alquiler)){
			$errMSG = "ingresa precio de alquiler.";
		}else if(empty($tipo)){
			$errMSG = "ingresa tipo de auto.";
		}else if(empty($id_proveedor)){
			$errMSG = "ingresa id proveedor.";
		}else if(empty($id_estadovehiculo)){
			$errMSG = "ingresa id estado vehiculo.";
		}else if(empty($id_agencia)){
			$errMSG = "ingresa id agencia.";
		}
		else if(empty($imgFile)){
			$errMSG = "Selecciona una imagen.";
		}
		else
		{
			$upload_dir = '../user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$carPic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$carPic);
				}
				else{
					$errMSG = "Lo siento tu archivo es muy grande.";
				}
			}
			else{
				$errMSG = "Solo Formato JPG, JPEG, PNG & GIF disponible.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO automoviles ( placa,
			marca,modelo, 
			Kilometraje,num_pasajeros,
			precio_alquiler,tipo,id_proveedor,id_estadovehiculo,
			id_agencia, carPic)
			VALUES( :placa, :marca,:modelo, 
			:Kilometraje,:num_pasajeros,:precio_alquiler,
			:tipo,:id_proveedor,:id_estadovehiculo,:id_agencia, :upic)');
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
	
	
			if($stmt->execute())
			{
				$successMSG = "nuevo registro insertado";
				header("refresh:5;autos.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error....";
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
    	<h1 class="h2">Agregar nuevo auto. /<a class="btn btn-default" href="autos.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Automoviles </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
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
	 <tr>
    	<td><label class="control-label">Carro Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar
        </button>
        </td>
    </tr>
    
    </table>
    
</form>




    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>