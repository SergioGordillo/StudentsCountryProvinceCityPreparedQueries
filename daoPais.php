<?php

require_once("Pais.php");
require_once("classConexion.php");

class daoPais extends Conexion { //Esta clase hereda de Conexión.
	
              
               public $Paises=array();    //Array de objetos Paises
               

			   public function Listar() { //Función para listar los países

				$this->Paises=array(); //Hay que vaciar el array de objetos Paises
   
				   $consulta="select * from paises";

				   $param=array(); //Creo un array para pasarle parámetros
				
				   $this->Consulta($consulta,$param); //Ejecuto la consulta
						 
				   foreach ($this->datos as $fila)  //Recorro el array de la consulta
				   {
						
					   $pais = new Pais();  //Creo un nuevo objeto
											  //Le seteo las variables, y así me ahorro el constructor   
					   $pais->__SET("Id",$fila["Id"]);
					   $pais->__SET("Nombre",$fila["Nombre"]);
					  
					   $this->Paises[]=$pais; //Meto la prueba en el array de Paises
   
				}
						 
					
			}

		}
?>