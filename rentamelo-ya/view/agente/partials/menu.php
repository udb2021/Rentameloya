
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		   <a class="navbar-brand" href="#">Rentamelo ya!</a>
          
        </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li>
                        <a href="../agente/clientes.php">Clientes</a>
                    </li>
                    <li>
                        <a href="../agente/autos.php">Autom&oacute;viles</a>
                    </li>
					 
					
                    
    
                    <li>
					 <a href="../../controller/cerrarSesion.php">
                    Cerrar sesion</a>
                    </li>
                    
                   
                </ul>
           
			 
            <?php 

			if (!isset($_SESSION["nombre"])) {?>
            
            <li><a href="registro.php">Registro</a></li>
            <?php } else {   ?>
			
			<?php if ($_SESSION["id_tipousuario"] == 1) {?>
			  <li><a href="admin.php">Admin</a></li>
    
              <?php } ?>
             
            <?php 

}?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
