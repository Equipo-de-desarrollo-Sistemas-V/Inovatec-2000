/* Declara una variable global */
let bIdP = false
let bIdS = false
let bExis = false
let bStock = false

/*Detecta cuando el boton fue presionado*/
let botonRegresar = document.getElementById("guardar");
botonRegresar.addEventListener("click", (e) => {

    if (bIdP==false){
        idProv.style.border = "3px solid red";
    }else if(bIdS==false){
        empresa.style.border = "3px solid red";
    }else if(bExis==false){
        existentes.style.border = "3px solid red";
    }else if(bStock==false){
        stock.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    numero:/^[0-9]{1,100}$/
}

/* Select de Id Producto*/
formulario.idProv.addEventListener('change', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        idProv.style.border = "3px solid red";
        bIdP = false
    }else{
        idProv.removeAttribute("style");
        bIdP = true
    }
})

/* Select de Id Sucursal*/
formulario.empresa.addEventListener('change', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        empresa.style.border = "3px solid red";
        bIdS = false
    }else{
        empresa.removeAttribute("style");
        bIdS = true
    }
})

/* Input de existentes */
formulario.existentes.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.existentes.value = valorInput
    .replace(/[^0-9]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        existentes.style.border = "3px solid red";
        bExis = false
	}else{
        existentes.removeAttribute("style");
        bExis = true
    }
    validar(bExis);
})

/* Input stcok minimo*/
formulario.stock.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.stock.value = valorInput
    .replace(/[^0-9.]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        stock.style.border = "3px solid red";
        bStock = false
	}else{
        stock.removeAttribute("style");
        bStock = true
    }
    validar(bStock);
})


function validar(bandera){
    const guardar = document.getElementById('guardar');
    if(bandera == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}