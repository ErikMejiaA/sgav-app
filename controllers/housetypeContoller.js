//seleccionamos el formulario
let formHousetype = document.querySelector('#formHousetype');
//realizamos la cabezera para poder enviar los datos 
let myheadersHousetype = new Headers({"Content-Type" : "application/json"});

//le damos un evento al boton para poder enviar los datos 
document.querySelector('#btnHousetype').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del formulario
    let data = Object.fromEntries(new FormData(formHousetype).entries());
    let config = {
        method : "POST",
        headers : myheadersHousetype,
        body : JSON.stringify(data)
    };
    //se realiza el fecth y se transforma la respuesta en texto
    let respuesta = await (await fetch("scripts/housetype/insertHousetype.php", config)).text();
    alert("Los datos fueron enviados correctamente");

});
