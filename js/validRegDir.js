/* Declara una variable global */
let bandCalle = false
let bandNum = false
let bandCol = false
let bandMun = false
let bandEst = false
let bandCP = false

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý\s]{2,20}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    usuario:/^[a-zA-ZÁ-ý0-9\s_@.]{3,20}$/,
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
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.cadenas.test(valorInput)) {
        calle.style.border = "3px solid red";
        bandCalle = false
	}else{
        calle.removeAttribute("style");
        bandCalle = true
    }
    //validar();
})

/* Input numero */
formulario.numero.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.numero.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
	// Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        numero.style.border = "3px solid red";
        bandNum = false
	}else{
        numero.removeAttribute("style");
        bandNum = true
    }
    //validar();
})

/* Input colonia */
formulario.colonia.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.colonia.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.cadenas.test(valorInput)) {
        colonia.style.border = "3px solid red";
        bandCol = false
	}else{
        colonia.removeAttribute("style");
        bandCol = true
    }
    //validar();
})

/* Input numero */
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
    //validar();
})