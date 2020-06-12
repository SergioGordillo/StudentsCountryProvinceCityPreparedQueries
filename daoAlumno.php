<?php

require_once("Alumno.php");
require_once("classConexion.php");

class daoAlumno extends Conexion { //Esta clase hereda de Conexión.
	
              
               public $Pruebas=array();    //Array de objetos Alumnos
               

	           public function Insertar($alumno) //Función que me permite insertar alumno
	           {  //Por un lado hago la consulta y por otro lado le paso los parámetros, que me los coge vía GET del objeto alumno que recibe como parámetro
			      $consulta="insert into alumnos values (:NIF, 
	                            			              :Nombre,
                                                          :Apellido1,
                                                          :Apellido2,
                                                          :Edad,
                                                          :Pais,
                                                          :Provincia,
														  :Localidad)";
												

                  $param=array(":NIF"=>$alumno->__GET("NIF"),
				               ":Nombre"=>$alumno->__GET("Nombre"),
				               ":Apellido1"=>$alumno->__GET("Apellido1"),
                               ":Apellido2"=>$alumno->__GET("Apellido2"),
                               ":Edad"=>$alumno->__GET("Edad"),
                               ":Pais"=>$alumno->__GET("Pais"),
                               ":Provincia"=>$alumno->__GET("Provincia"),
                               ":Localidad"=>$alumno->__GET("Localidad"),
							   );     								
										

                  $this->ConsultaSimple($consulta,$param); //Ejecuto la consulta
				  
				 		   
               }			  
}

?>