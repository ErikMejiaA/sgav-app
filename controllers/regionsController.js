// seleccionamos el formularario de regiones 
let formRegions = document.querySelector('#formRegions');
//Escribimos el encabezado para enviar los datos a php por medio del fetch
let myHeadersRegions = new Headers({"Content-Type" : "application/json"});

//creamos el evento al boton para enviar los datos
document.querySelector('#btnRegions').addEventListener('click', async (e) => {
    
    e.preventDefault(); //para evitar el refres de la pagina
    //obtnemos los datos del formulario
    let data = Object.fromEntries(new FormData(formRegions).entries());
    //creamos el metodo para enviar los datos a php por medio del POST
    let config = {
        method : "POST",
        headers : myHeadersRegions,
        body : JSON.stringify(data)
    }
    // se realiza el fecth y se trasforma la respuesta en text
    let respuesta = await (await fetch("scripts/regions/insertRegions.php", config)).text();
    alert("Los datos fueron enviados correctamente");
});