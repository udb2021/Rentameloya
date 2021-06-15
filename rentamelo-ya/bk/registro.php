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

  </head>
  <body>

    

    <!-- Formulario Login -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
		
          <!-- Margen superior (css personalizado )-->
          <div class="spacing-1"></div>
<a href="index.php" class="btn btn-default">Back</a>
          <form id="formulario_registro">
            <!-- Estructura del formulario -->
            <fieldset>

              <legend class="center">Registro</legend>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="user">Nombre usuario</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="user" placeholder="Ingresa tu nombre de usuario">
              </div>

              <!-- Div espaciador -->
              <div class="spacing-2"></div>
			    <!-- Caja de texto para usuario -->
              <label class="sr-only" for="nombre">Nombres</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-book	"></i></div>
                <input type="text" class="form-control" name="name" placeholder="Ingresa tus nombres">
              </div>
			  
               <!-- Div espaciador -->
              <div class="spacing-2"></div>
			    <!-- Caja de texto para usuario -->
              <label class="sr-only" for="apellido">Apellidos</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-book	"></i></div>
                <input type="text" class="form-control" name="lastname" placeholder="Ingresa tus apellidos">
              </div>
                
				
				
				 <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="dui">Dui</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope	"></i></div>
                <input type="text" class="form-control" name="dui" placeholder="Ingresa tu dui">
              </div>
             <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="direccion">Direccion</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope	"></i></div>
                <input type="text" class="form-control" name="direccion" placeholder="Ingresa tu direccion">
              </div>
             <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="pais">Pais</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope	"></i></div>
                <input type="text" class="form-control" name="pais" placeholder="Ingresa tu pais">
              </div>
            
			   <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="email">Email</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope	"></i></div>
                <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
              </div>
             <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="telefono">Telefono</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope	"></i></div>
                <input type="text" class="form-control" name="telefono" placeholder="Ingresa tu telefono">
              </div>
            
			 
              <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para la clave-->
              <label class="sr-only" for="clave">Contraseña</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" autocomplete="off" class="form-control" name="clave" placeholder="Ingresa tu clave">
              </div>

              <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para la clave-->
              <label class="sr-only" for="clave">Verificar contraseña</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" autocomplete="off" class="form-control" name="clave2" placeholder="Verificar contraseña">
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
                  <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Registrate</button>
                </div>
              </div>

            </fieldset>
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
  </body>
</html>
