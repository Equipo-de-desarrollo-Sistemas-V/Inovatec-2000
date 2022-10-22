/* Declara una variable global */
let bandNombre = true
let bandAP = true
let bandAM = true
let bandEmail = true
let bandTel = true
let bandCalle = true
let bandNum = true
let bandCol = true
let bandCP = true
let bandTar = true
let bandMesTar = true
let bandAnTar = true
let bandCcvTar = true
validar();

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    apMat:/^[a-zA-ZÁ-ý\s]{0,20}$/,
    usuario:/^[a-zA-ZÁ-ý0-9\s_@.]{3,20}$/,
    telefono:/^[0-9]{10}$/,
    correo:/^[a-zA-Z0-9.-_+]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]/,
    cadenasD:/^[a-zA-ZÁ-ý\s]{2,20}$/,
    numero:/^[0-9]{1,10}$/,
    cp:/^[0-9]{5}$/,
    cadenasT:/^[a-zA-ZÁ-ý\s]{3,100}$/,
    numT:/^[0-9]{16}$/,
    mesT:/^[0-9]{1,2}$/,
    ccvT:/^[0-9]{3}$/
}

/* Input nombre del cliente */
formulario.nombreCliente.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreCliente.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '');

    if (!expresiones.cadenas.test(valorInput)) {
        nombreCliente.style.border = "3px solid red";
        bandNombre = false
	}else{
        nombreCliente.removeAttribute("style");
        bandNombre = true
    }
    validar();
})

/* Input apellidoPaterno*/
formulario.apellidoPaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apellidoPaterno.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apellidos.test(valorInput)) {
        apellidoPaterno.style.border = "3px solid red";
        bandAP = false
	}else{
        apellidoPaterno.removeAttribute("style");
        bandAP = true
    }
    validar();

})

/* Input apellidoMaterno*/
formulario.apellidoMaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apellidoMaterno.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apMat.test(valorInput)) {
        apellidoMaterno.style.border = "3px solid red";
        bandAM = false
	}else{
        apellidoMaterno.removeAttribute("style");
        bandAM = true
    }
    validar();
})

/* Input email*/
formulario.correo.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.correo.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim(); 

    if (!expresiones.correo.test(valorInput)) {
        correo.style.border = "3px solid red";
        bandEmail = false
	}else{
        correo.removeAttribute("style");
        bandEmail = true
    }
    validar();
})

/* Input telefono*/
formulario.telefono.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.telefono.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
	// Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.telefono.test(valorInput)) {
        telefono.style.border = "3px solid red";
        bandTel = false
	}else{
        telefono.removeAttribute("style");
        bandTel = true
    }
    validar();
})


/* Input calle */
formulario.calle.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.calle.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.cadenasD.test(valorInput)) {
        calle.style.border = "3px solid red";
        bandCalle = false
	}else{
        calle.removeAttribute("style");
        bandCalle = true
    }
    validar();
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
    validar();
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
    validar();
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
    validar();
})

/* Input nombre del propietario de la tarjeta*/
formulario.nombreTarjeta.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreTarjeta.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')


    if (!expresiones.cadenasT.test(valorInput)) {
        nombreTarjeta.style.border = "3px solid red";
        bandTar  = false
	}else{
        nombreTarjeta.removeAttribute("style");
        bandTar  = true
    }
    validar();
})

/* Input numero de la tarjeta*/
formulario.numeroTarjeta.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.numeroTarjeta.value = valorInput
		// Eliminar espacios en blanco
		.replace(/\s/g, '')
		// Eliminar letras
		.replace(/\D/g, '')
		// Eliminar el ultimo espaciado
		.trim();
    if (!expresiones.numT.test(valorInput)) {
        numeroTarjeta.style.border = "3px solid red";
        bandNumTar  = false
	}else{
        numeroTarjeta.removeAttribute("style");
        bandNumTar  = true
    }
    validar();
})

/* Input mes*/
formulario.monthExpiracion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.monthExpiracion.value = valorInput
		// Eliminar espacios en blanco
		.replace(/\s/g, '')
		// Eliminar letras
		.replace(/\D/g, '')
		// Eliminar el ultimo espaciado
		.trim();
    if (!expresiones.mesT.test(valorInput)) {
        monthExpiracion.style.border = "3px solid red";
        bandMesTar  = false
	}else{
        monthExpiracion.removeAttribute("style");
        bandMesTar  = true
    }
    validar();
})

/* Input anio*/
formulario.yearExpiracion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.yearExpiracion.value = valorInput
		// Eliminar espacios en blanco
		.replace(/\s/g, '')
		// Eliminar letras
		.replace(/\D/g, '')
		// Eliminar el ultimo espaciado
		.trim();
    if (!expresiones.mesT.test(valorInput)) {
        yearExpiracion.style.border = "3px solid red";
        bandAnTar  = false
	}else{
        yearExpiracion.removeAttribute("style");
        bandAnTar  = true
    }
    validar();
})

/* Input ccv*/
formulario.ccv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.ccv.value = valorInput
		// Eliminar espacios en blanco
		.replace(/\s/g, '')
		// Eliminar letras
		.replace(/\D/g, '')
		// Eliminar el ultimo espaciado
		.trim();
    if (!expresiones.ccvT.test(valorInput)) {
        ccv.style.border = "3px solid red";
        bandCcvTar  = false
	}else{
        ccv.removeAttribute("style");
        bandCcvTar  = true
    }
    validar();
})


function validar(){
    const boton4 = document.getElementById('boton4');
    if(bandNombre == true && bandAP == true && bandAM == true && bandEmail == true && bandTel == true && bandCalle == true && bandNum == true
        && bandCol == true && bandCP == true && bandTar == true && bandMesTar == true && bandAnTar == true && bandCcvTar == true){
        boton4.disabled=false;
    }
    else{
        boton4.disabled=true;
    }
}