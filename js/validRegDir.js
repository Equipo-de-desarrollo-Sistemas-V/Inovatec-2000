/* Declara una variable global */
let bandCalle = false
let bandNum = false
let bandCol = false
let bandEst = false
let bandCP = false

/*Detecta cuando el boton fue presionado*/
let botonSig = document.getElementById("siguiente");
botonSig.addEventListener("click", (e) => {
    if (bandCalle==false){
        calle.style.border = "3px solid red";
    }else if(bandNum==false){
        numero.style.border = "3px solid red";
    }else if(bandCol==false){
        colonia.style.border = "3px solid red";
    }else if(bandCP==false){
        codigoPostal.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý\s]{2,20}$/,
    numero:/^[0-9]{1,10}$/,
    cp:/^[0-9]{5}$/
}

/* Input calle */
formulario.calle.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.calle.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.cadenas.test(valorInput)) {
        calle.style.border = "3px solid red";
        bandCalle = false
	}else{
        calle.removeAttribute("style");
        bandCalle = true
    }
    validar(bandCalle);
})

/* Input numero */
formulario.numero.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.numero.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')

    if (!expresiones.numero.test(valorInput)) {
        numero.style.border = "3px solid red";
        bandNum = false
	}else{
        numero.removeAttribute("style");
        bandNum = true
    }
    validar(bandNum);
})

/* Input colonia */
formulario.colonia.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.colonia.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.cadenas.test(valorInput)) {
        colonia.style.border = "3px solid red";
        bandCol = false
	}else{
        colonia.removeAttribute("style");
        bandCol = true
    }
    validar(bandCol);
})

/* Input CP */
formulario.codigoPostal.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.codigoPostal.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
	// Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.cp.test(valorInput)) {
        codigoPostal.style.border = "3px solid red";
        bandCP = false
	}else{
        codigoPostal.removeAttribute("style");
        bandCP = true
    }
    validar(bandCP);
})

function validar(bandera){
    const siguiente = document.getElementById('siguiente');
    if(bandera == true){
        siguiente.disabled=false;
    }
    else{
        siguiente.disabled=true;
    }

}