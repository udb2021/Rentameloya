<?php

  # Leemos las variables enviadas mediante Ajax
  $user = $_POST['user_php'];
  $clave = $_POST['clave_php'];

  # Verificamos que los campos no esten vacios, el chiste de este if es que si almenos una variable (o campo) esta vacio mostrara error_1
  if(empty($user) || empty($clave)){

    # mostramos la respuesta de php (echo)
    echo 'error_1';

  }else{


    # Incluimos la clase admin
    require_once('../model/admin.php');

    # Creamos un objeto de la clase  admin
	
    $admin = new Admin();

    # Llamamos al metodo login para validar los datos en la base de datos
    $admin -> loginadmin($user, $clave);
	
	//}else{
		//echo "Hola";
	//}
    /*}else{
      echo 'error_2';
    }*/

  }


?>
