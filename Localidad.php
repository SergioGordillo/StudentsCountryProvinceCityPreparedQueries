<?php

class Localidad implements JsonSerializable {
    
    //Atributos de la clase
     private $IdLoc;
     private $IdPais;
     private $IdProvincia;
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
			 "IdLoc" => $this->IdLoc,
			 "IdPais" => $this->IdPais,
			 "IdProvincia" => $this->IdProvincia,
			 "Nombre" => $this->Nombre
		 );
	 }
		
}

?>