//Seleccionamos el formularia de ciudades
let formCities = document.querySelector('#formCities');
//agregamos el encabezado para poder realizar el envio de datos a php
let myHeadersCities = new Headers({"Content-Type" : "application/json"});

//creamos el evento al boton para enviar los datos 
document.querySelector('#btnCities').addEventListener('click', async (e) => {

    e.preventDefault();
    //guardamos los datos del formualario
    let data = Object.fromEntries(new FormData(formCities).entries());
    //creamos la cofiguracion que se le va a pasar al fetch
    //enviar los datos a php
    let config = {
        method : "POST",
        header : myHeadersCities,
        body : JSON.stringify(data)
    }
    //se realiza el fetch y se transform la respuest en texto
    let respuesta = await (await fetch("scripts/cities/insertCities.php", config)).text();
    alert("Los datos fueron enviados correctamente"); 
});