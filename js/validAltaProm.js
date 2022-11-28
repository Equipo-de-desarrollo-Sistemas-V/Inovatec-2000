/* Declara una variable global */
let bProd = false

/*Detecta cuando el boton fue presionado*/
let botonGuardar = document.getElementById("guardar");
botonGuardar.addEventListener("click", (e) => {

    if (bProd==false){
        idProducto.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    id:/^[a-zA-ZÁ-ý0-9-]{1,8}$/
}

/* Select de Prodcucto*/
formulario.idProducto.addEventListener('change', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        idProducto.style.border = "3px solid red";
        bProd = false
    }else{
        idProducto.removeAttribute("style");
        bProd = true
    }
})

/*Funcion que se encarga de habiliatar o deshabilitar el boton, segun el valor del parametro que reciba*/
function validar(bandera){
    const guardar = document.getElementById('guardar');
    if(bandera == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}