<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Admin extends Conexion
  {
 
   
	public function loginadmin($user, $clave)
    {


      # Nos conectamos a la base de datos
      parent::conectar();

      /*
        Lo segundo que debemos hacer es filtrar la informacion que el usuario
        ingresa, recuerda nunca debes confiar en los datos que el usuario
        envia, asi que teniendo eso en cuenta usaremos unos metodos de la clase conexion
        que ayudaran a realizar los filtros necesarios
      */

      // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);
    


      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
     $consulta = 'select id_usuario, nombre, apellido, email, id_tipousuario, id_agencia from usuarios where nombre_usuario="'.$user.'" and clave= MD5("'.$clave.'")';
    
     /*   $consulta = 'select  nombre, apellido,  id_tipousuario from clientes where nombre_usuario="'.$user.'" and clave= MD5("'.$clave.'")';*/
	

	 /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){

      
        /*
          Realizamos la misma consulta de la linea 55 pero esta ves transformaremos el resultado en un arreglo,
          ten mucho cuidado con usar el metodo consultaArreglo ya que devuelve un arreglo de la primera fila encontrada
          es decir, como nosotros solo validamos a un usuario no hay problema pero esta funcion no funciona si
          vas a listar a los usuarios, espero que me entiendan xd
        */

        $user = parent::consultaArreglo($consulta);

        /*
          Bien espero ser un poco claro en esta parte, la variable user
          en la linea 69 pasa a ser un arreglo con los campos consultados en la linea
          48, entonces para acceder a los datos utilizamos $user[nombre_del_campo] Ok?
          bueno hagamos el ejercicio.
        */

        /*
          Inicializamos la sessión | Recuerda con las variables de sesión
          podemos acceder a la informacion desde cualquiera pagina siempre y cuando
          exista una sesión y ademas utilicemos el codigo de la linea 84
        */

        session_start();

        /*
          Las variables de sesion son muy faciles de usar, es como
          declarar una variable, lo unico diferente es que obligatoria mente
          debes usar $_SESSION[] y .... el nombre de la variable ya no sera asi
          $miVariable sino entre comillas dentro del arreglo de sesion, haber me
          dejo explicar, $_SESSION['miVariable'], recuerda que como declares la variable
          en este archivo asi mismo lo llamaras en los demas.
        */

      /*  $_SESSION['id_usuario']     = $user['id_usuario'];*/
    
		  $_SESSION['nombre'] = $user['nombre'];
		
	  $_SESSION['id_tipousuario']  = $user['id_tipousuario'];
	  	 /* $_SESSION['id_agencia']  = $user['id_agencia'];*/


        /*
          Que porqué almacenamos cargo? es encillo en nuestros proyectos
          pueden existir archivos que solo puede ver un usuario con el cargo de
          administrador y no un usuario estandar, asi que la variable global de
          sesion nos ayudara a verificar el cargo del usuario que ha iniciado sesion
          Ok?
        */

        /*
          Recuerda:
          cargo con valor: 1 es: Administrador
          cargo con valor: 2 es: usuario estandar
          puedes agregar cuantos cargos desees, en este ejemplo solo uso 2
        */

        // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
        if($_SESSION['id_tipousuario'] == 1){
          echo 'view/admin/index.php';
        }else if($_SESSION['id_tipousuario'] == 2){
          echo 'view/agente/index.php';
        }else if($_SESSION['id_tipousuario'] == 3){
          echo 'view/contador/index.php';
        }else if($_SESSION['id_tipousuario'] == 4){
          echo 'view/cliente/index.php';
        }

        // u.u finalizamos aqui 

      }else {
     
		    // El usuario y la clave son incorrectos
        echo 'error_3';
		  
	  }


      # Cerramos la conexion
      parent::cerrar();
    }

	
	
    public function registroUsuario($user, $name, $lastname, $dui,  $direccion, $pais,   $email, $telefono,  $clave)
    {
      parent::conectar();
      $user  = parent::filtrar($user);
      $name  = parent::filtrar($name);
	  $lastname  = parent::filtrar($lastname);
	  $dui  = parent::filtrar($dui);
	  $direccion  = parent::filtrar($direccion);
	  $pais  = parent::filtrar($pais);
      $email = parent::filtrar($email);
	  $telefono  = parent::filtrar($telefono);
      $clave = parent::filtrar($clave);


      // validar que el correo no exita
      $verificarusuario = parent::verificarRegistros('select id_cliente from clientes where nombre_usuario="'.$user.'" ');


      if($verificarusuario > 0){
        echo 'error_3';
      }else{

	  parent::query('insert into clientes(nombre_usuario, nombre, apellido, dui, direccion, pais, email,  telefono, clave, id_tipousuario )
	  values("'.$user.'","'.$name.'","'.$lastname.'","'.$dui.'","'.$direccion.'","'.$pais.'","'.$email.'","'.$telefono.'", MD5("'.$clave.'"), 4)');

        session_start();

        $_SESSION['nombre'] = $name;
        $_SESSION['id_tipousuario']  = 4;
		

        echo 'view/cliente/index.php';

      }

      parent::cerrar();
    }

  }


?>
