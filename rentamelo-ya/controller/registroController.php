<?php

  $user  = $_POST['user'];
  $name   = $_POST['name'];
  $lastname   = $_POST['lastname'];
  $dui   = $_POST['dui'];  
  $direccion   = $_POST['direccion'];
  $pais   = $_POST['pais'];
  $email  = $_POST['email'];
  $telefono   = $_POST['lastname'];
  $clave  = $_POST['clave'];
  $clave2 = $_POST['clave2'];

  if(empty($user) ||empty($name) ||empty($lastname) ||empty($dui)  ||empty($direccion) ||empty($pais)||empty($email)  ||empty($telefono)|| empty($clave) || empty($clave2) )
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{

    if($clave == $clave2){

      
        # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario($user, $name, $lastname, $dui,  $direccion, $pais,  $email, $telefono, $clave);


     


    }else{
      echo 'error_2';
    }

  }




?>
