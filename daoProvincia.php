<?php

require_once("Pais.php"); 
require_once("Provincia.php");
require_once("classConexion.php");

class daoProvincia extends Conexion { //Esta clase hereda de Conexión.
	
              
               public $Provincias=array();    //Array de objetos Provincias
               

			   public function Listar($IdPais) { //Función para listar las provincias

					$this->Provincias=array(); //Hay que vaciar el array de objetos Provincias
   
					$consulta="select * from provincias WHERE IdPais=:IdPais";

					$param=array(
						":IdPais"=>$IdPais
					); //Creo un array para pasarle parámetros
					
					$this->Consulta($consulta,$param); //Ejecuto la consulta
							
					foreach ($this->datos as $fila)  //Recorro el array de la consulta
					{
							
						$provincia = new Provincia();  //Creo un nuevo objeto
												//Le seteo las variables, y así me ahorro el constructor   
						$provincia->__SET("Id",$fila["Id"]);
						$provincia->__SET("IdPro",$fila["IdPro"]);
						$provincia->__SET("IdPais",$fila["IdPais"]);
						$provincia->__SET("Nombre",$fila["Nombre"]);
						
						$this->Provincias[]=$provincia; //Meto la prueba en el array de Provincias
	
					}
						 
					
			}

		}
?>