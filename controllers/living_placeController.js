// Seleccionamos el formulario de personas
let formLiving_place = document.querySelector('#formLiving_place');
//Declaramos la cabezera para el envio de los datos a php
let myHeadersLiving_place = new Headers({"Content-Type" : "application/json"});

//Creamos el evento al boton para el envio de los datos
document.querySelector('#btnLiving_place').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del formulario
    let data = Object.fromEntries(new FormData(formLiving_place).entries());
    console.log(data);
    //creamos el metodo para el envio de los datos 
    let config = {
        method : "POST",
        headers : myHeadersLiving_place,
        body : JSON.stringify(data)
    }
    //se realiza el fetch y se trasforma la respuesta a tipo texto 
    let respuesta = await (await fetch("scripts/living_place/insertLiving_place.php", config)).text();
    alert("Los datos fueron enviados correctamente");

});