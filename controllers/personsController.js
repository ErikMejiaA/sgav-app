// Seleccionamos el formulario de personas
let formPersons = document.querySelector('#formPersons');
//Declaramos la cabezera para el envio de los datos a php
let myHeadersPersons = new Headers({"Content-Tipe" : "application/json"});

//Creamos el evento al boton para el envio de los datos
document.querySelector('#btnPersons').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del formulario
    let data = Object.fromEntries(new FormData(formPersons).entries());
    console.log(data);
    //creamos el metodo para el envio de los datos 
    let config = {
        method : "POST",
        headers : myHeadersPersons,
        body : JSON.stringify(data)
    }
    //se realiza el fetch y se trasforma la respuesta a tipo texto 
    let respuesta = await (await fetch("scripts/persons/insertPersons.php", config)).text();
    alert("Los datos fueron enviados correctamente");

});