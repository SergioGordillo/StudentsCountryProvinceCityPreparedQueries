<?php

    $datosRecibidos=json_decode($_POST['datos']); //Decodifico la cadena de JSON y lo convierto en un array de PHP

    require "daoProvincia.php";
    require "daoLocalidad.php";

    if($datosRecibidos->metodo=="provincias"){ //Los datos recibidos son los que recibo de JSON
        $daoProvincia=new DaoProvincia("tarea6"); //Hago la conexión
        $daoProvincia->Listar($datosRecibidos->IdPais);  //Listo con DaoProvincia, accediendo a daoPais
        $datosDevolver=$daoProvincia->Provincias; //Devuelvo el array que he rellenado 

    } else if ($datosRecibidos->metodo="localidades") {
        
        $daoLocalidad=new DaoLocalidad("tarea6");
        $daoLocalidad->Listar($datosRecibidos->IdPais, $datosRecibidos->IdProvincia);
        $datosDevolver=$daoLocalidad->Localidades;

    }

    echo json_encode($datosDevolver); //Vuelvo a codificar los datos que devuelvo en JSON 
?>