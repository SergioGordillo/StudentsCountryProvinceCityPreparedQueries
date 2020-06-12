function init(){

    document.getElementById("Pais").addEventListener("change", function () { //Me cojes el elemento con id Pais, y cada vez que haya un cambio, me coges el valor de dicho elemento
        let Pais=document.getElementById("Pais").value; //Me cojes el valor del select
        getProvincias(Pais); //Llamo a GetProvincias pasándole como parámetro el valor del select
    })
    
    document.getElementById("Provincia").addEventListener("change", function () { //Me cojes el elemento con id Provincia, y cada vez que haya un cambio, me coges el valor de dicho elemento
        let Pais=document.getElementById("Pais").value; //Aquí cojo el value del select
        let Provincia=document.getElementById("Provincia").value;
        getLocalidades(Pais, Provincia); 
    })
    
    }
    
    
    function getProvincias(IdPais){
    
        if(IdPais!==-1){
             // creo el objeto que realizara la llamada
        let llamada = new XMLHttpRequest();
     
        // url del php a llamar
        let url = "load-data.php";
     
        // Creo los datos 
        let datos = {
            "metodo": "provincias", //Con esto le digo a qué método tengo que llamar
            "IdPais": IdPais
        };
     
        // Indico los parametros que voy a mandar
        let params = "datos=" + JSON.stringify(datos); //Con Stringify paso de formato JSON a JSON cadena, porque PHP no entiende JSON pero sí JSON en cadena
     
        
        // Funcion que se ejecutara al recibir la respuesta
        llamada.onreadystatechange = function () {
            // si todo esta bien
            if (this.readyState === 4 && this.status === 200) {
    
                console.log(this.responseText);
                let datos = JSON.parse(this.responseText); //Parseo 
    
                let selectProvincia = document.getElementById("Provincia"); //Cojo el select de la provincia
                selectProvincia.innerHTML=""; //Lo limpio antes que nada
                datos.forEach(Provincia => { //Recorro los datos recogidos de servidor y con API DOM relleno el select
    
                    let option = document.createElement("option");
                    option.setAttribute("value", Provincia.IdPro);
    
                    let textoProvincia = document.createTextNode(Provincia.Nombre);
                    option.appendChild(textoProvincia); //Le meto al option el nombre de la provincia 
    
                    selectProvincia.appendChild(option); //Meto la opción en el select de la provincia
    
                });
                
                getLocalidades(datos[0].IdPais, datos[0].IdPro); //Llamo al método getLocalidades y le paso los parámetros que necesita
    
            }
        }
        
        // Indico que es una peticion POST
        llamada.open("POST", url, true);
        // Esta linea es necesaria en una peticion POST
        llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        llamada.send(params); // Le paso los parametros
        }else{ //En caso de que no haya país seleccionado, limpio las provincias y las localidades
            document.getElementById("Provincia").innerHTML="";
            document.getElementById("Localidad").innerHTML="";
        }
    
       
    
    
    
    }
    
    function getLocalidades(IdPais, IdProvincia){
    
            // creo el objeto que realizara la llamada
        let llamada = new XMLHttpRequest();
     
        // url del php a llamar
        let url = "load-data.php";
     
        // Creo los datos 
        let datos = {
            "metodo": "localidades",
            "IdPais": IdPais,
            "IdProvincia": IdProvincia
        };
     
        // Indico los parametros que voy a mandar
        let params = "datos=" + JSON.stringify(datos);
     
        // Funcion que se ejecutara al recibir la respuesta
        llamada.onreadystatechange = function () {
            // si todo esta bien
            if (this.readyState === 4 && this.status === 200) {
     
                console.log(this.responseText);
                let datos = JSON.parse(this.responseText); //Los parseo igualmente para poder usarlos
    
                let selectLocalidades = document.getElementById("Localidad");
                selectLocalidades.innerHTML="";
                datos.forEach(Localidad => {
    
                    let option = document.createElement("option");
                    option.setAttribute("value", Localidad.IdLoc);
    
                    let textoLocalidad = document.createTextNode(Localidad.Nombre);
                    option.appendChild(textoLocalidad);
    
                    selectLocalidades.appendChild(option);
     
            });
    
        }
    }
     
        // Indico que es una peticion POST
        llamada.open("POST", url, true);
        // Esta linea es necesaria en una peticion POST
        llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        llamada.send(params); // Le paso los parametros
    
    
    
    }
    
    window.onload=init;