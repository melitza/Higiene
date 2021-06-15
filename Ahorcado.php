<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Juegos</title>

<?php
      include ('class/BD.php');//Aquí se incluye la clase BD  
      $nue_obj = new BD;//Se nombra la variable
      //echo $nue_obj -> estilo("bootstrap");//Trae la función estilos de bootstrap
      echo $nue_obj -> Verificado();
      ?>
         
    <link rel="stylesheet" href="estilo-ahoracado.css">
  </head>
  <body>

<!--Aqui estamos incluyebdo el encabezado y las estenciones de js--> 

    <link rel="stylesheet" type="text/css" href="css">
    <script src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
    <script src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->

   <div class='row'>
      <center><?php  echo $nue_obj->encabezado(); ?> </center><!--Encabezado de la página-->
    </div>

      <center><h1>Vamos a jugar:</h1></center><br><br><br><br><br><br>


      <div class="main-container"><br><br><br>
        Adivina la palabra.
        <h2 class="titulo"></h2>
        <h2 id="msg-final"></h2>
        <h3 id="acierto"></h3>
        <div class="flex-row no-wrap">
          <h2 class="palabra" id="palabra"></h2>
          <picture>
            <img src="img/ahorcado_6.png" alt="" id="image6">
            <img src="img/ahorcado_5.png" alt="" id="image5">
            <img src="img/ahorcado_4.png" alt="" id="image4">
            <img src="img/ahorcado_3.png" alt="" id="image3">
            <img src="img/ahorcado_2.png" alt="" id="image2">
            <img src="img/ahorcado_1.png" alt="" id="image1">
            <img src="img/ahorcado_0.png" alt="" id="image0">
          </picture>
        </div>
        <div class="flex-row" id="turnos">
          <div class="col">
            <h3>Intentos restantes: <span id="intentos">6</span></h3>
          </div>
          <div class="col">
            <button onclick="inicio()" id="reset">Elegir otra palabra</button>
            <button onclick="pista()" id="pista">Dame una pista!</button>
            <span id="hueco-pista"></span>
          </div>
          </div>
        
        <div class="flex-row">
          <div class="col">
            <div class="flex-row" id="abcdario">
            </div>
          </div>
          <div class="col"></div>
        </div>

      </div>
    <script src="ahorcado.js"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/flat-ui.min.js"></script>

    <script src="js/application.js"></script>

  </body>
</html>