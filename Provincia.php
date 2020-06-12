<?php

class Provincia implements JsonSerializable {
    
    //Atributos de la clase
     private $Id;
     private $IdPro;
     private $IdPais;
     private $Nombre;

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
			 "Id" => $this ->Id,
			 "IdPro" => $this->IdPro,
			 "IdPais" => $this->IdPais,
			 "Nombre" => $this->Nombre
		 );
	 }
		
}

?>