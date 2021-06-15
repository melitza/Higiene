<?php
    /*
        *Melitza Mondragón 
    */

    class Inspector
    {//Esta función es el constructor
        
        function Verificado()
        {//Aquí se verificara si el archivo existe y se procedera a ir al sitio.

           if( file_exists( "instalador.php" ) == true )
            {
                header( "location: instalador.php" );            
            }


        }

        function mostrar_tablas( $conexion, $opcion = null )
        {//Muestra las tablas creadas.
            $salida = "<br><br> --- Tablas instaladas --- <br>";
            $resultado = $conexion->query( "SHOW TABLES" );
            $conteo = 0;

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                $salida .= $fila[ 0 ]."<br>";
                $conteo ++;
            }

            if( $opcion == 2 ) $salida = $conteo; 

            return $salida;
        }

        function borrar_archivo( $nombre_archivo )
        {//Borra un archivo del sistema.
            unlink( $nombre_archivo );
        }


        /****************************************************************************************************************/

        function verificar_existencia_objeto( $objeto, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
        {//Esta función se encarga de verificar si existe una restricción en el catálogo del sistema.
            $conteo = 0;

            $sql = " SELECT COUNT( * ) AS conteo FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = '$bd' AND CONSTRAINT_NAME = '$objeto'; ";
            if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
            $conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
            }

            return $conteo;
        }

        function verificar_existencia_tabla( $tabla, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
        {//Esta función es la encargada de verificar si existe una tabla en el catalogo del sistema.
            $conteo = 0;

            $sql = " SELECT COUNT( * ) AS conteo FROM information_schema.tables WHERE table_schema = '$bd' AND table_name = '$tabla' ";
            if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
            $conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
            }

            return $conteo;
        }
    }
?>