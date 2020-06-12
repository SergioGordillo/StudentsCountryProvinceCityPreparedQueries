<?php

require_once("Pais.php"); 
require_once("Provincia.php");
require_once("Localidad.php");
require_once("classConexion.php");

class daoLocalidad extends Conexion { //Esta clase hereda de Conexión.
	
              
               public $Localidades=array();    //Array de objetos Localidades

			   public function Listar($IdPais, $IdProvincia) { //Función para listar las localidades

				$this->Localidades=array(); //Hay que vaciar el array de objetos Localidades
   
				   $consulta="select * from localidades WHERE IdPais=:IdPais AND IdProvincia=:IdProvincia";

				   $param=array(
                    ":IdPais"=>$IdPais,
                    ":IdProvincia"=>$IdProvincia
                   ); //Creo un array para pasarle parámetros
				
				   $this->Consulta($consulta,$param); //Ejecuto la consulta
						 
				   foreach ($this->datos as $fila)  //Recorro el array de la consulta
				   {
						
					   $localidad = new Localidad();  //Creo un nuevo objeto
											  //Le seteo las variables, y así me ahorro el constructor   
					   $localidad->__SET("IdLoc",$fila["IdLoc"]);
                       $localidad->__SET("IdPais",$fila["IdPais"]);
                       $localidad->__SET("IdProvincia",$fila["IdProvincia"]);
                       $localidad->__SET("Nombre",$fila["Nombre"]);
					  
					   $this->Localidades[]=$localidad; //Meto la prueba en el array de Localidades
   
				}
						 
					
			}

		}
?>