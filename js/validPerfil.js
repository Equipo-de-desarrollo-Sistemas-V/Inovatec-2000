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

let bandPas = false
let bandPas1 = false
let bandPas2 = false

let bandTar = true
let bandMesTar = true
let bandAnTar = true
let bandNumTar = true


/*Detecta cuando el boton de contrase;a fue presionado*/
let boton3 = document.getElementById("boton3");
boton3.addEventListener("click", (e) => {
    if (bandPas==false){
        password.style.border = "3px solid red";
    }else if(bandPas1==false){
        newPassword.style.border = "3px solid red";
    }else{
        validarContra();
    }
});


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
    passw:/^[a-zA-Z0-9üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]{8,255}$/

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
    validarDatos();
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
    validarDatos();

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
    validarDatos();
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
    validarDatos();
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
    validarDatos();
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
    validarDireccion();
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
    validarDireccion();
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
    validarDireccion();
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
    validarDireccion();
})

/* Input de la constrasenia*/
formulario.password.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

    if (valorInput==""){
        password.style.border = "3px solid red";
        bandPas = false
	}else{
        password.removeAttribute("style");
        bandPas = true
    }
    //validarContra();
})

/* Input de la nueva constrasenia*/
formulario.newPassword.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.newPassword.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
    // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.passw.test(valorInput)) {
        newPassword.style.border = "3px solid red";
        bandPas1 = false
	}else{
        newPassword.removeAttribute("style");
        bandPas1 = true
    }
    validarPassword2();
    validarContra();
})

/* Input de la confirmacion de la constrasenia*/
formulario.confirmPassword.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.confirmPassword.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    //.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    validarPassword2();
})

// verifica que la contrasenia y su confirmacion coincidan
const validarPassword2 = () =>{
    const inputPass1 = document.getElementById('newPassword');
    const inputPass2 = document.getElementById('confirmPassword');

    if (inputPass1.value !== inputPass2.value){
        confirmPassword.style.border = "3px solid red";
        bandPas2 = false
    }else{
        confirmPassword.removeAttribute("style");
        bandPas2 = true
    }
    validarContra();
}





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
    validarBanco();
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
    validarBanco();
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
    validarBanco();
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
    validarBanco();
})

function validarDatos(){
    const boton1 = document.getElementById('boton1');
    if(bandNombre == true && bandAP == true && bandAM == true && bandEmail == true && bandTel == true){
        boton1.disabled=false;
    }
    else{
        boton1.disabled=true;
    }
}

function validarDireccion(){
    const boton2 = document.getElementById('boton2');
    if(bandCalle == true && bandNum == true && bandCol == true && bandCP == true){
            boton2.disabled=false;
    }
    else{
        boton2.disabled=true;
    }
}

function validarContra(){
    const boton3 = document.getElementById('boton3');
    if(bandPas == true && bandPas1 == true && bandPas2 == true){
            boton3.disabled=false;
    }
    else{
        boton3.disabled=true;
    }
}

function validarBanco(){
    const boton4 = document.getElementById('boton4');
    if(bandTar == true && bandMesTar == true && bandAnTar == true && bandNumTar == true){
            boton4.disabled=false;
    }
    else{
        boton4.disabled=true;
    }
}

