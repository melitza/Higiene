/**
    *
*/ 
 var acumuladorApp = angular.module( 'acumuladorApp', [] );
            
    acumuladorApp.controller( "acumuladorAppCtrl",
        
        [ "$scope", "$http", //Aquí se minificar, pero interfiere con lo de php, todas la variables tiene que ser minificadas.
         
            function( $scope, $http )
            {//Trae todas enfermedades según los signos y síntomas y despues los muestra en pantalla.
                
                $scope.cargar_datos_php = function()
                {
                        var lista= document.getElementById('datos');
                        console.log(lista.length );
                        var sintomas="";


                        for (var i = 0 ; i < lista.length ; i++) 
                        {
                            if (lista.item(i).selected ) {
                                if (sintomas == ""){ 
                                    sintomas +=lista.item(i).value;
                                }else{
                                    sintomas +="," +lista.item(i).value;
                                }
                            }
                        }
                        var cad2 = sintomas;
                        console.log(cad2);
                    
                        if( cad2.length > 0 )
                        {
                            console.log("Cadena" + cad2);
                            //Aquí se hace el llamado a un php con conexión a MySQL.
                            $http.get( 'llamado-php.php?cadena=' + cad2 ).success
                            (
                                
                                function( response ) 
                                { //Esta funcion se encarga de recibir la respuesta.
                                    console.log( response );
                                    $scope.campos = response.records;            
                                }
                            );   
                        }                    
                }

                $scope.buscar = function()
                {//Esta función sirve para traer en pantalla lo que se ha buscado.
                    var busqueda = $scope.text_busqueda;    
                    console.log(busqueda);
                    //Aquí se hace el llamado a un php con conexión a MySQL.
                     $http.get( 'llamado-php.php?busqueda=' + busqueda ).success
                    (
                        
                        function( response ) 
                        {//Esta funcion se encarga de recibir la respuesta.
                            console.log( response );
                            $scope.campos = response.records;            
                        }
                    );                                        
                }
            }
        ] //Si se minifica, se deben minificar todas las llamadas inyecciones, de lo contrario mejor no minifique nada.
    );
