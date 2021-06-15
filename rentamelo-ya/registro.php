<?php

 

  session_start();

  // isset verifica si existe una variable o eso creo xd
  if(isset($_SESSION['id_usuario'])){
    header('location: controller/redirec.php');
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="css/style.css">
    <!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<!--===============================================================================================-->

  </head>
  <body>

    

    <!-- Formulario Login -->
    <div class="limiter">
		
		<div class="container-login100">			
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/car.jpg" alt="IMG">
					<img src="images/car2.jpg" alt="IMG">
          <img src="images/car.jpg" alt="IMG">
					<img src="images/car2.jpg" alt="IMG">

				</div>
        

				<form id="formulario_registro" class="login100-form validate-form">
					<span class="login100-form-title">
						<img src="images/logo1.png" alt="IMG" height="100px">
						<img src="images/user.png" alt="IMG" height="100px"><br>
						Registro
					</span>

					<div class="wrap-input100 validate-input" data-validate = "El nombre usuario es requerido">
						<input name="user" class="input100" type="text" name="user" placeholder="Nombre de Usuario" id="user">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
            <i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Los nombres son requeridos">
						<input class="input100" type="text" name="name" id="clave" autocomplete="off" placeholder="Ingresa tus nombres">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
            <i class="glyphicon glyphicon-book	"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="lastname" id="clave" autocomplete="off" placeholder="Ingresa tus apellidos">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
            <i class="glyphicon glyphicon-book	"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="dui" id="clave" autocomplete="off" placeholder="Ingresa tu dui">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
            <i class="glyphicon glyphicon-envelope	"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="direccion" id="clave" autocomplete="off" placeholder="Ingresa tu dirección">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
            <i class="glyphicon glyphicon-envelope	"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="pais" id="clave" autocomplete="off" placeholder="Ingresa tu pais">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="email" id="clave" autocomplete="off" placeholder="Ingresa tu email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="text" name="telefono" id="clave" autocomplete="off" placeholder="Ingresa tu telefono">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="password" name="clave" id="clave" autocomplete="off" placeholder="Ingresa tu clave">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="password" name="clave2" id="clave" autocomplete="off" placeholder="Verificar contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

				<!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
        <div class="row" id="load" hidden="hidden">
        <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
          <img src="img/load.gif" width="100%" alt="">
        </div>
        <div class="col-xs-12 center text-accent">
          <span>Validando información...</span>
        </div>
      </div>
      <!-- Fin load -->

      <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <div class="spacing-2"></div>
          <button type="button"class="login100-form-btn" name="button" id="registro">Registrate</button>
        </div>
      </div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Ya posees una cuenta
						</span>
						<a class="txt2" href="index.php">
							Cuenta?
						</a>
            
					</div>
                

            <!-- Fin load -->
				</form>
			</div>
		</div>
	</div>

    <!-- / Final Formulario login -->

    <!-- Jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="js/operaciones.js"></script>
    <!--===============================================================================================-->	
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/tilt/tilt.jquery.min.js"></script>
		<script >
			$('.js-tilt').tilt({
				scale: 1.08
			})
		</script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>
  </body>
</html>
