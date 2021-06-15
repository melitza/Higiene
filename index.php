<!-- 
	* Melitza Mondragón 
-->

<html ng-app="acumuladorApp"><!--Aquí inicia el ng-app-->
	<head>
		<title>Higiene</title>

    

		<?php
			include ('class/BD.php');//Aquí se incluye la clase BD	
			$nue_obj = new BD;//Se nombra la variable
			//echo $nue_obj -> estilo("bootstrap");//Trae la función estilos de bootstrap
			echo $nue_obj -> Verificado();
			?>

    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">



		<link rel="stylesheet" type="text/css" href="css">
		<script src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
		
	</head>
	<body>
		<div class="container">

<div class="row">

		<div ng-controller="acumuladorAppCtrl"><!--Importante el controlador aquí-->
				<div class='container' >

						
				  		<div class='row'>
				  			<?php  echo $nue_obj->encabezado(); ?> <!--Encabezado de la página-->

				  		</div>
					  	
						


						
						      
						        <div class="row demo-tiles">
						              <div class="col">
						                <div class="tile">
						                  <!--h3 class="tile-title">Web Oriented</h3-->
						                  <p>La higiene y el autocuidado es un acto que generalmente es aut&oacute;nomo en
								                cada uno de los individuos para mantenerse limpios y libres de impurezas, 
								                Juega un papel importante que contribuye a una mejor calidad de vida y un 
								                desarrollo plenamente saludable acompañado de 5 pilares de la salud 
								                (buena alimentaci&oacute;n, realizar ejercicios, descansar las horas 
								                necesarias, mantener una buena higiene personal, evitar malos h&aacute;bitos), 
								                vitales para el crecimiento de los estudiantes.</p>
						                </div>
						              </div>

						              <div class="col">
						                <div class="tile">
						                  <h3 class="tile-title">Bienvenidos a un mundo libre de microbios y malos h&aacute;bitos, 
						                  	an&iacute;mate a jugar y a aprender por medio de nuestros juegos. Recuerda lavarte 
						                  	las manos cada dos horas, bañarte todos los d&iacute;as, cepillarte los dientes despu&eacute;s 
						                  	de cada comida y mantener tu cuerpo aseado; no olvides siempre ser cordial y hacer 
						                  	uso de tus buenos modales.</h3>
						                  
						                </div>
						              </div>       
						        </div> <!-- /tiles -->  
						      


</div>
</div>



















	        
					        <script src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->
								
						
		



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/flat-ui.min.js"></script>

    <script src="js/application.js"></script>


	</body>
</html>


