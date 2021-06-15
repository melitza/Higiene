<!-- 
  * Melitza Mondragón 
-->

<html ng-app="acumuladorApp"><!--Aquí inicia el ng-app-->
  <head>
    <title>Cartas</title>

    <meta charset="UTF-8">
    <title>Parejas</title>
    <link rel="stylesheet" href="estilo/main.css">
    

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



    <!--link rel="stylesheet" type="text/css" href="css"-->
    <script src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
    <script src="js/cartas.js"></script>
  </head>
  <body>


<center>




    <div ng-controller="acumuladorAppCtrl"><!--Importante el controlador aquí-->
        <div class='container' >

              <div class='row'>
                <center><?php  echo $nue_obj->encabezado(); ?> </center><!--Encabezado de la página-->
              </div>
              <div class='row'></div>
                <script src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->
            </div>
              
        
    
                              <h3>Selecciona numero de cartas:</h3>


                              <select id="seleccion" name="lista">
                                        <option value="4" selected="selected">4</option>
                                        <option value="8">8</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>

                                      </select>

                                  <div id="cajonDeSastre"></div>


                                  <br><br>
                                  <button type="button" class="btn btn-secondary"> <a href="cartas.php">Jugar de nuevo</a></button>
                                  
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/flat-ui.min.js"></script>

    <script src="js/application.js"></script>


  </body>
</html>