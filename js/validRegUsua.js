/* Declara una variable global */
let bandNombre = false
let bandAP = false
let bandAM = true
let bandEmail = false
let bandTel = false
let bandUsua = false

/*Detecta cuando el boton fue presionado*/
let botonSig = document.getElementById("siguiente");
botonSig.addEventListener("click", (e) => {

    if (bandNombre==false){
        nombreCliente.style.border = "3px solid red";
    }else if(bandAP==false){
        apellidoPaterno.style.border = "3px solid red";
    }else if(bandAM==false){
        apellidoMaterno.style.border = "3px solid red";
    }else if(bandEmail==false){
        email.style.border = "3px solid red";
    }else if(bandTel==false){
        Teléfono.removeAttribute("style");
    }else if(bandUsua==false){
        usuario.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    apMat:/^[a-zA-ZÁ-ý\s]{0,20}$/,
    usuario:/^[a-zA-ZÁ-ý0-9\s_@.]{3,20}$/,
    telefono:/^[0-9]{10}$/,
    correo:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/
}

/* Input nombre del cliente */
formulario.nombreCliente.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreCliente.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
    if (!expresiones.cadenas.test(valorInput)) {
        nombreCliente.style.border = "3px solid red";
        bandNombre = false
	}else{
        nombreCliente.removeAttribute("style");
        bandNombre = true
    }
    validar(bandNombre);
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
    validar(bandAP);

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
    validar(bandAM);
})

/* Input email*/
formulario.email.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.email.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim(); 

    if (!expresiones.correo.test(valorInput)) {
        email.style.border = "3px solid red";
        bandEmail = false
	}else{
        email.removeAttribute("style");
        bandEmail = true
    }
    validar(bandEmail);
})

/* Input telefono*/
formulario.Teléfono.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.Teléfono.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
	// Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.telefono.test(valorInput)) {
        Teléfono.style.border = "3px solid red";
        bandTel = false
	}else{
        Teléfono.removeAttribute("style");
        bandTel = true
    }
    validar(bandTel);
})

/* Input usuario*/
formulario.usuario.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.usuario.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()+\-~=\[\]{};':"\\|,<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim(); 

    if (!expresiones.usuario.test(valorInput)) {
        usuario.style.border = "3px solid red";
        bandUsua = false
	}else{
        usuario.removeAttribute("style");
        bandUsua = true
    }
    validar(bandUsua);
})


function validar(bandera){
    const siguiente = document.getElementById('siguiente');
    if(bandera == true ){
        siguiente.disabled=false;
    }
    else{
        siguiente.disabled=true;
    }

}