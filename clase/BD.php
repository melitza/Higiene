<?php
	/**
	 * 
	 *Esta clase contiene todas la funciones  
	*/
	include('Graficos.php');/* se incluye el archivo Graficos.php el cual contiene la clase graficos.*/

	class BD extends Graficos
	{

		public $Connection; //variable publica


		/**
		*esta funcion es el constructor.						
		*/
		/*function BD ()
		{
			$this->Connection=$this->create_connection();
			//echo "nacio la clase BD";
		}*/
		
		/**
		*esta funcion se encarga de crear la Connection con el server.			
		*@return    la Connection a la base de datos.
		*/
		
		 /*function create_connection ()
		 {
		 	include('config.php');
		 	return mysqli_connect($server,$user,$key,$bd);
		 }*/
		 




		/**
		*esta función sirve para mostrar el formulario el cual contiene un select que trae los datos de una tabla
		*@param 	texto  		parametro de entrada que contiene $nombre_lista
		*@param 	texto 		parametro de entrada que contiene tabla
		*@param 	texto 		parametro de entrada que contiene campo_llave_primaria
		*@param 	texto 		parametro de entrada que contiene $campos_a_mostrar
		*/

		function bring_list_information( $nombre_lista, $tabla, $campo_llave_primaria, $Field_a_show ) 
		{//Esta función sirve para mostrar el formulario el cual contiene un select que trae los datos de una tabla
			include( "config.php" );//Aquí se hace conexión con la bd 
			$exit = "";

			//Se seleccionan todos los campos de una tabla
			$sql = "SELECT * FROM  $tabla "; 
			if( $sn_diagnostico == "n" ) echo "";
			

			$Connection = mysqli_connect( $server, $user, $key, $bd );
			$result = $Connection->query( $sql );
					           
			$exit.="<label for='exampleInputEmail1'><h5>SINTOMAS:</h5></label>";//*****************Titulo*********************
			$exit.="<select ng-model='id_sintomas' ng-change='cargar_datos_php()' id='datos' multiple size='8' class='form-control' name='$nombre_lista' >";//Sintomas
			$accountant=0;
					
			while ($row = mysqli_fetch_assoc($result)) 
				
			{ 
				$accountant ++;
				
	    		if ($row != '..' && $row !='.' && $row !='')
	    		{
		         	$exit.= "<option value='$row[$campo_llave_primaria]' >" . $accountant . " - ". $row[$Field_a_show]."</option>"; //Los datos que contiene la tabla se muestran en un select.

	        	}
	      
			}
			$exit.="</select>";//cierra la etiqueta 
				
			return $exit;//retorna toda la variable $exit 
		}


		/**
		*esta funcion se encarga realizar la consulta en una tabla.
		*
		*@param 		texto 			Es el nombre de la tabla.
		*@param 		texto 			campo key.
		*@param 		texto 			campo a buscar.	
		*@return 		caracteres 		retorna la consulta.
		*/
		
		Function consultation($valores)
		{//funcion consultar se encarga realizar la consulta en una tabla.
			include( "config.php" );
    	
	        /*Esta conexión se realiza para la prueba con angularjs*/
	        header("Access-Control-Allow-Origin: *");
	        header("Content-Type: application/json; charset=UTF-8");
	        
	        $conn = new mysqli( $server, $user, $key, $bd );
	    
	        //Se busca principalmente por alias.

	     	$sql = "SELECT tb_enfermedades.enfermedad , COUNT(tb_resultados.id_enfermedades) as sintomas , (SELECT COUNT(tb_resultados.id_enfermedades) total FROM tb_resultados where tb_enfermedades.id_enfermedades = tb_resultados.id_enfermedades GROUP BY id_enfermedades) as total FROM tb_resultados , tb_enfermedades WHERE tb_resultados.id_enfermedades = tb_enfermedades.id_enfermedades AND tb_resultados.id_signos in($valores) GROUP BY tb_resultados.id_enfermedades";
	        //LA tabla que se cree debe tener aquí requerida, y abajo los campos pedidos.
	       
	        $result = $this->Connection->query( $sql );	
	        
	        $outp = "";
	       
	        
	        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
	        {
	            //Mucho cuidado, hay una gran probabilidad de fallo con cualquier elemento que falte en esta sintaxis.
	            if ($outp != "") {$outp .= ",";}

	            $outp .= '{"Enfermedad":"'.$rs["enfermedad"].'",';//Este campo debe estar en la tabla de MySQL.
	            //$outp .= '"a":"'.$sql.'",';//ver el sql.
	            $outp .= '"sintomas":"'.$rs["sintomas"].'",';//Este campo debe estar en la tabla de MySQL.
	            $outp .= '"total":"'.$rs["total"].'"}';//Este campo debe estar en la tabla de MySQL.
	        }
	        
	        $outp ='{"records":['.$outp.']}';
	       	$conn->close();
	        
	        return $outp;	
		}


		function Bring_information( $tabla, $Primary_key_index = null, $condition = null, $Field_a_show = null )//sintomas
	{
		include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
		//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

		$exit = "";

		//Si al llamar la función no se ingresa el campo dos o segundo parámetro, se usará como llave primaria el 
		//primer elemento del recorset o vector que retorna la selección del sql.
		if( $Primary_key_index == null ) $Primary_key_index = 0;

		if( $Field_a_show == null ) $Field_a_show = "*";

		//------------SQL Se traen datos----------------------------------------------------
		$sql = "SELECT $Field_a_show FROM  $tabla ";
		if( $condition != null ) $sql .= " WHERE ".$condition;

		//if( $sn_pruebas == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";

		$Connection = mysqli_connect( $server, $user, $key, $bd );
		$result = $Connection->query( $sql );	

		$exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";

		while( $fila = mysqli_fetch_array( $result ) )
		{
			$exit .= "<tr>";

				for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
				$exit .= "<td>".$fila[ $i ]."</td>"; //Este es el dato impreso
					
				//El borrado de un dato se hará por llave primaria. Debería ser el primer campo de la tabla.
				if( $Primary_key_index != -1 )
				$exit .= "<td><a href='tb_sintomas.php?id=".$fila[ 0 ]."&tabla=".$tabla."'>Eliminar</a></td>";
			$exit .= "<td><a href='act_sintoma.php?id=".$fila[ 0 ]."&sintoma=".$fila[ 1 ]."'>Actualizar</a></td>";

			$exit .= "</tr>";
		}

		$exit .= "</table>";

		return $exit;	
	}


	function Bring_information1( $tabla, $Primary_key_index = null, $condition = null, $Fields_to_show = null )//enfermedades
	{
		include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
		//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

		$exit = "";

		//Si al llamar la función no se ingresa el campo dos o segundo parámetro, se usará como llave primaria el 
		//primer elemento del recorset o vector que retorna la selección del sql.
		if( $Primary_key_index == null ) $Primary_key_index = 0;

		if( $Fields_to_show == null ) $Fields_to_show = "*";

		//------------SQL Se traen datos----------------------------------------------------
		$sql = "SELECT $Fields_to_show FROM  $tabla ";
		if( $condition != null ) $sql .= " WHERE ".$condition;

		//if( $sn_pruebas == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";

		$Connection = mysqli_connect( $server, $user, $key, $bd );
		$result = $Connection->query( $sql );	

		$exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";

		while( $fila = mysqli_fetch_array( $result ) )
		{
			$exit .= "<tr>";

				for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
				$exit .= "<td>".$fila[ $i ]."</td>"; //Este es el dato impreso
					
				//El borrado de un dato se hará por llave primaria. Debería ser el primer campo de la tabla.
				if( $Primary_key_index != -1 )
				$exit .= "<td><a href='tb_enfermedades.php?id=".$fila[ 0 ]."&tabla=".$tabla."'>Eliminar</a></td>";//Boton de eliminar enfermedades
				$exit .= "<td><a href='act_enfermedad.php?id=".$fila[ 0 ]."&enfermedad=".$fila[ 1 ]."'>Actualizar</a></td>";

			$exit .= "</tr>";
		}

		$exit .= "</table>";

		return $exit;	
	}

	/**************************************************************************************************************************************/
	function Bring_manual_information( $tabla, $Primary_key_index = null, $condition = null, $Fields_to_show = null )
	{
		include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
		//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

		$exit = "";

		//Si al llamar la función no se ingresa el campo dos o segundo parámetro, se usará como llave primaria el 
		//primer elemento del recorset o vector que retorna la selección del sql.
		if( $Primary_key_index == null ) $Primary_key_index = 0;

		if( $Fields_to_show == null ) $Fields_to_show = "*";

		//------------SQL Se traen datos----------------------------------------------------
		$sql = "SELECT $Fields_to_show FROM  $tabla ";
		if( $condition != null ) $sql .= " WHERE ".$condition;

		$Connection = mysqli_connect( $server, $user, $key, $bd );
		$result = $Connection->query( $sql );	

		$exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";

		while( $fila = mysqli_fetch_array( $result ) )
		{
			$exit .= "<tr>";

				for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
				$exit .= "<td>".$fila[ $i ]."</td>"; //Este es el dato impreso
					
				//El borrado de un dato se hará por llave primaria. Debería ser el primer campo de la tabla.
				if( $Primary_key_index != -1 )
				$exit .= "<td><a href='tb_manual.php?id=".$fila[ 0 ]."&tabla=".$tabla."'>Eliminar</a></td>";
			$exit .= "<td><a href='act_manual.php?id=".$fila[ 0 ]."&id_manual&definicion&titulo=".$fila[ 1 ]."'>Actualizar</a></td>";

			$exit .= "</tr>";
		}

		$exit .= "</table>";

		return $exit;	
	}



		/*Esta función nos permite realizar una busqueda del manual técnico del software.*/
		function search()
		{
		    //COnexión a la base de datos.
	        include( "config.php" ); 
	        
	        /*Esta conexión se realiza para la prueba con angularjs*/
	        header("Access-Control-Allow-Origin: *");
	        header("Content-Type: application/json; charset=UTF-8");
	        
	        $conn = new mysqli( $server, $user, $key, $bd );
	        
	        //Se busca principalmente por alias.
	        
	        $consultation = explode(",", utf8_decode($_GET['busqueda']));
	        //echo $consultation;
	        
			$sql  = " SELECT * FROM tb_manuales  WHERE ";
		    for ($i=0; $i < count($consultation); $i ++) { 
		        	
	        	$sql .= " titulo LIKE '%".$consultation[$i]."%'";
	        	$sql .= " OR definicion LIKE '%".$consultation[$i]."%'";
	        	$sql .= " OR claves LIKE '%".$consultation[$i]."%'";
	        	if ($i < (count($consultation)-1)) $sql.=" or ";
	        	
	        }
	        
	        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
	        $result = $conn->query( $sql );
	        
	        $outp = "";
	        
	        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
	        {
	            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
	            if ($outp != "") {$outp .= ",";}
	            
	            $outp .= '{"Titulo":"'.utf8_decode($rs["titulo"]).'",';  // <-- La tabla MySQL debe tener este campo.
	            $outp .= '"Id_manual":"'.utf8_decode($rs["id_manual"]).'",';// <-- La tabla MySQL debe tener este campo.
	            $outp .= '"Descripcion":"'.utf8_decode($rs["definicion"]).'",';// <-- La tabla MySQL debe tener este campo.
	            $outp .= '"Imagen":"'.$rs["url"].'"}';// <-- La tabla MySQL debe tener este campo.
	        }
	        
	        $outp ='{"records":['.$outp.']}';
	        $conn->close();
	        
	        echo($outp);

		    
		     
		}

		
		
		function Save_information( $tabla, $campos, $datos )
		{
			include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
			//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

			$exit = "";

			//------------SQL para ingresar datos----------------------------------------------------
			$sql = "INSERT INTO  $tabla ( $campos ) VALUES( $datos )";

			echo $sql;

			$Connection = mysqli_connect( $server, $user, $key, $bd );
			$result = $Connection->query( $sql );

			//Si se han afectado filas, entonces se procederá a informar.
			if( $Connection->affected_rows > 0 )
			{

				//echo(alert('Se ha guardado')); 
				//header('location:index.php?');
				print "<meta http-equiv=Refresh content=\"2 ; url=http://localhost/FIGUEROA/diagnostico_V4/www/index.php\">"; //sintomas
				//$exit = "Los datos se han guardado correctamente.";			 

			}else{
				print "<meta http-equiv=Refresh content=\"2 ; url=http://localhost/FIGUEROA/diagnostico_V4/www/index.php\">"; //enfermedades
				}

			
		}


		

		function relations( $nombre_lista, $tabla, $Primary_key_field, $Field_to_show )//******************************
	{
		include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
		//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

		$exit = "";

		//------------SQL Se traen datos----------------------------------------------------
		$sql = "SELECT * FROM  $tabla ";
		
		

		$Connection = mysqli_connect( $server, $user, $key, $bd );
		$result = $Connection->query( $sql );	

		$exit .= "<SELECT NAME='$nombre_lista' class='form-control'>";
		$exit .= "<OPTION VALUE='-1'>Seleccionar</OPTION>";

		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$exit .= "<OPTION VALUE='".$row[ $Primary_key_field ]."'>".$row[ $Field_to_show ]."</OPTION>";
		}

		$exit .= "</SELECT>";

		return $exit;	
	}

	function messager() 
	{


		include( "config.php" ); 

		$sql= "SELECT * FROM tb_mensaje t1, tb_usuario t2 WHERE t1.correo_rec='pep@gmail.com' AND t1.correo_emi=t2.correo";
					//echo $sql;

					$connection= mysqli_connect ('localhost', 'root', '', 'bd_diagnostico');
					$result= $connection->query($sql);
					$exit ='';
					$exit .= "<table class='table table-striped table-bordered table-hover table-condensed'>";
					$exit .='<tr>';
					$exit .='<th>receptor</th>';
					$exit .='<th>mensaje</th>';
					$exit .='</tr>';
		//echo $sql;
						while( $row = mysqli_fetch_assoc($result))
						{


							$exit .= "<tr>";

								
								$exit .= "<td>".$row[ 'nombre' ]."</td>"; //Dato de impreso
								$exit .= "<td>".$row[ 'mensaje' ]."</td>"; //Dato de impreso
								
								$exit .= "</tr>";
								

							
							 
						}
						$exit  .="</table>";
						return $exit;
			
	}
 
 }
 ?>
