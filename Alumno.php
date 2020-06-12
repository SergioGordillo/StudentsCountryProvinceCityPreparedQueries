<?php

class Alumno implements JsonSerializable {
    
    //Atributos de la clase
     private $NIF;
     private $Nombre;
     private $Apellido1;
     private $Apellido2;
     private $Edad;
     private $Pais;
     private $Provincia;
     private $Localidad;

    //Creo los getters y setters. Por cómo voy a hacer el programa, no necesito constructor.
	 public function __GET($propiedad)
	 {
		 return $this->$propiedad;
	 }
	 public function __SET($propiedad,$valor)
	 {
		 $this->$propiedad=$valor;
     }
     
     public function jsonSerialize()
	 {
		 return array(
			 "NIF" => $this->NIF,
			 "Nombre" => $this->Nombre,
			 "Apellido1" => $this->Apellido1,
             "Apellido2" => $this->Apellido2,
             "Edad" => $this->Edad,
             "Pais" => $this->Pais,
             "Provincia" => $this->Provincia,
             "Localidad" => $this->Localidad
		 );
	 }
		
}

?>