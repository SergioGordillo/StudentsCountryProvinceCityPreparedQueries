<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 6 DWES Preparación Junio 2020</title>
    <script src="main.js"></script>
    <!-- Sobre las tablas que se le facilitan deberá realizar un formulario de Inserción de alumnos empleando para ello una estructura de selects dependientes para los campos país, provincia y localidad.

Los campos DNI, Nombre, Apellidos y Edad se insertarán en campos tipo texto de la misma forma que se hizo en las tarea previa, pero para los campos País, Provincia y Localidad se deben emplear campos tipo select que implementen la dependencia de la siguiente forma:

Al cargar la página por primera vez en el select pais estarán cargados todos los paises de la tabla, los restantes select de provincia y localidad estarán vacios. Tras seleccionar un país la página automáticamente cargará en el select de la provincia, situado debajo del anterior, todas las provincias que correspondan a ese país, y al elegir la provincia debe hacer lo mismo con el select de las localidades, esto es lo que se denomina estructura de "selects dependientes".

Sino se empleara AJAX se ejecutaría una llamada síncrona (la habitual) y al seleccionar un país la página se recargaría, con lo que habría que guardar el contenido de los campos tipo texto para no perder su valor , pero con AJAX esto no es necesario, porque las llamadas se ejecutarán de forma asíncrona, y esto permite hacer consultas a BBDD y obtener valores sin tener que recargar la página en su totalidad.

Se pide, por tanto, usar AJAX para implementar un recarga de las provincias y localidades con llamadas asíncronas. -->
</head>
<body>

<?php

    require_once "classConexion.php";
    require_once "Alumno.php";
    require_once "Pais.php";
    require_once "Provincia.php";
    require_once "Localidad.php";
    require_once "daoPais.php"; 
    require_once "daoAlumno.php";

    //Pais sí se va a cargar con un método en el DAO
    //Provincia y Localidad se cargarán vía AJAX

    if(isset($_POST['insertarAlumno']) ){

        //Cojo los datos enviados vía POST

         $NIF=$_POST['Dni'];
         $Nombre=$_POST['Nombre'];;
         $Apellido1=$_POST['Apellido1'];;
         $Apellido2=$_POST['Apellido2'];;
         $Edad=$_POST['Edad'];;
         $Pais=$_POST['Pais'];;
         $Provincia=$_POST['Provincia'];;
         $Localidad=$_POST['Localidad'];;


        $daoAlumno=new daoAlumno("tarea6"); //Hago conexión con la BBDD

         $alumno = new Alumno(); //Creo un objeto alumno
         //Al no tener constructores, seteo los valores directamente
         $alumno->__SET("NIF",$NIF);
         $alumno->__SET("Nombre",$Nombre);
         $alumno->__SET("Apellido1",$Apellido1);
         $alumno->__SET("Apellido2",$Apellido2);
         $alumno->__SET("Edad",$Edad);
         $alumno->__SET("Pais",$Pais);
         $alumno->__SET("Provincia",$Provincia);
         $alumno->__SET("Localidad",$Localidad);

         $daoAlumno->Insertar($alumno); //Llamo a la función de daoAlumno para insertar el alumno
    }
    
   



?>

<form method="POST" name="formulario" action="<?php $_SERVER['PHP_SELF']?>">

        <label for="Dni">Escribe tu DNI</label>
        <input type="text" name="Dni" id="Dni">
        <br> <br>
        <label for="Nombre">Escribe tu Nombre</label>
        <input type="text" name="Nombre" id="Nombre">
        <br> <br>
        <label for="Apellido1">Escribe tu primer apellido</label>
        <input type="text" name="Apellido1" id="Apellido1">
        <br> <br>
        <label for="Apellido2">Escribe tu segundo apellido</label>
        <input type="text" name="Apellido2" id="Apellido2">
        <br> <br>
        <label for="Edad">Escribe tu edad</label>
        <input type="text" name="Edad" id="Edad">
        <br> <br>
        <label for="Pais">Selecciona país</label>
        <select name="Pais" id="Pais"> 
            <option value="-1"> Seleccione un país </option>
            <?php 
            $daoPais=new DaoPais("tarea6"); //Creo un objeto daoPais y le paso la BBDD como parámetro, así conecta
            $daoPais->Listar(); //llamo al método listar
            foreach ($daoPais->Paises as $key => $value) { //Dado que con listar lo que hago es rellenar el array de Paises, accedo a él y lo recorro ya con normalidad. Recorro el array que he rellenado con el DAO y lo muestro
                echo "<option value='" . $value->Id . "'>" . $value->Nombre . "</option>";
                }
        ?>    
        </select>
        <br> <br>
        <label for="Provincia">Seleccione provincia</label>
        <select name="Provincia" id="Provincia"> 
            <option value="-1"> Seleccione una provincia </option>
        </select>
        <br> <br>
        <label for="Localidad">Seleccione localidad</label>
        <select name="Localidad" id="Localidad"> 
            <option value="-1"> Seleccione una localidad </option>
        </select>
        <br> <br>

        <input type="submit" name="insertarAlumno" value="Insertar Alumno"/>








</form> 
    
</body>
</html>
