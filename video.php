<!-- 
	* Melitza Mondragón 
-->

<html ng-app="acumuladorApp"><!--Aquí inicia el ng-app-->
	<head>
		<title>Videos</title>

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

<center>

		<div ng-controller="acumuladorAppCtrl"><!--Importante el controlador aquí-->
				<div class='container' >

						
				  		<div class='row'>
				  			<center><?php  echo $nue_obj->encabezado(); ?> </center><!--Encabezado de la página-->

				  		</div>     
				</div>
		
		<video src="video/1.mp4" width="540" height="380" controls></video>
		<video src="video/2.mp4" width="540" height="380" controls></video>
</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/flat-ui.min.js"></script>

    <script src="js/application.js"></script>
<script src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->

	</body>
</html>


