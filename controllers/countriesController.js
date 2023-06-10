// seleccionamos el formulario de paises
let formCountries = document.querySelector('#formCountries'); 
//se escribe la cabezera para enviar los datos a php por fetch
let myHeadersCountries = new Headers({"Content-Type" : "application/json"});

//creamos el evento al boton para enviar los datos 
document.querySelector('#btnCountries').addEventListener('click', async (e) => {
    
    e.preventDefault();
    // obtenemos los datos del formulario
    let data = Object.fromEntries(new FormData(formCountries).entries());
    //creamos la cofiguracion que se le va a pasar al fetch
    //enviar los datos a php
    let config = {
        method : "POST",
        headers : myHeadersCountries,
        body : JSON.stringify(data)
    };
    //se reliza el fetch y se transforma la respuessta en texto
    let respuesta = await (await fetch("scripts/countries/insertCountries.php", config)).text(); 
    alert("Los datos fueron enviados correctamente");
});