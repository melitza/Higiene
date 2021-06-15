<?php 
include ('class/Inspector.php');/* se incluye la clase verificador. */

	class Graficos extends Inspector
	{
			/**
			*esta función contiene el link de la libreria de bootstrap. 
			*@return 		caracteres 		retorna estilos de bootstrap.
			*/
			function estilos($carpeta=null)
			{
				$salida="";
				$salida=" <link rel='stylesheet'  href='css/bootstrap/css/bootstrap.min.css'>
				<script src='css/bootstrap/js/bootstrap.min.js'></script>
				<script src='css/bootstrap/js/jquerymin.js'></script>
				<script src='css/bootstrap/js/bootstrap.min.js'></script>";
						 
				return $salida;		 
			}

			/**
			*esta función contiene el encabezado de la página. 
			*@return 		caracteres 		retorna el encabezado.
			*/
			function encabezado()
			{
				$salida="";
				$salida .= "<link href='css/bootstrap.min.css' rel='stylesheet'>";
				$salida .= "<link href='css/flat-ui.css' rel='stylesheet'>";
				$salida .= "<div class='container'>";
				$salida .= "<br>";
				$salida .= "<img class='img img-responsive' src='img/olap.png'>";
				$salida .= "<nav class='navbar navbar-default' role='navigation'>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='navbar-collapse-3'>
          <ul class='nav navbar-nav'>
          	<li><a href='index.php'>Pagina principal<span class='navbar-unread'>1</span></a></li>
          	<!--li><a href='ahorcado.php'>juegos<span class='navbar-unread'>3</span></a></li-->
            <li><a href='imagenes.php'>imagenes<span class='navbar-unread'>2</span></a></li>
            <li><a href='video.php'>videos<span class='navbar-unread'>4</span></a></li>


			<ul class='nav navbar-nav navbar-right'>			
		      <li class='dropdown'>
              <a class='dropdown-toggle' data-toggle='dropdown'>Juegos<b class='caret'></b></a>
              <ul class='dropdown-menu'>
                <li class='divider'></li>
                <li><a href='ahorcado.php'>Adivinar</a></li>
                <li><a href='cartas.php'>Parejas</a></li>
              </ul>
			</li>
          </ul>







            
        </ul>  
		<ul class='nav navbar-nav navbar-right'>			
		      <li class='dropdown'>
              <a class='dropdown-toggle' data-toggle='dropdown'><b class='caret'></b></a>
              <ul class='dropdown-menu'>
                <li class='divider'></li>
                <!--li><a href='ayuda.php'>ayuda</a></li-->
                <li><a href='desktop.php'>Salir</a></li>
              </ul>
					


            </li>
          </ul>
				 
				  
				 
				  </div>
				</nav>";
				$salida .="</div>";

				return $salida;
			}
			/**
			*esta función nos permite dirijirnos al index. 
			*@return 		caracteres 		icono de inicio.
			*/
			function inicio()
			{
				$salida="";
				$salida="<a href='index.php'><img src='img/retroceso.png' align='right' class='img img-responsive'></a>";
				return $salida;
			}

	}
?>
