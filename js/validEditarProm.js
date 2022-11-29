/* Declara una variable global */
let bDes = true


/*Detecta cuando el boton fue presionado*/
let botonGuardar = document.getElementById("guardar");
botonGuardar.addEventListener("click", (e) => {

    if (bDes==false){
        descProd.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    descuento:/^[0-9]{1,3}$/
}

/* Input Descuento */
formulario.descProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.descProd.value = valorInput
    //.replace(/[0-9]/g, '')
    // Eliminar letras
	.replace(/\D/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();
    if (!expresiones.descuento.test(valorInput)) {
        descProd.style.border = "3px solid red";
        bDes = false
	}else{
        descProd.removeAttribute("style");
        bDes = true
    }
    validar(bDes);
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