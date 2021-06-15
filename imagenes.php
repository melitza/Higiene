<html>
	<head>
		<title>Imagenes</title>
		 <?php
    /* se incluye la clase BD la cual contiene las funciones para el funcionamiento del prototipo */
    include ('class/BD.php');

    
    /*Se nombra una variable para crear un nuevo objeto*/
    $nue_obj= new BD;
    /* trae la función estilos de bootstrap de la clase */
    echo $nue_obj->estilos("bootstrap"); 
     echo $nue_obj->encabezado(); //Encabezado de la página-->

    echo $nue_obj->Verificado();

    ?>
	</head>
		<body>

				<div class="container">
					<div class="row">
					    
					      
			  		

<center>
				<img src="img/1.jpg" width="300" height="150">
				<img src="img/2.jpg" width="300" height="150">
				<img src="img/2.png" width="300" height="150"><br><br>
				<img src="img/3.jpg" width="300" height="150">
				<img src="img/4.jpg" width="300" height="150">
				<img src="img/5.jpg" width="300" height="150"><br><br>
				<img src="img/6.jpg" width="300" height="150"><br><br>

</div>
				</div>










		</body>

</html>