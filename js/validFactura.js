/* Declara una variable global */
let banRazon = false
let banReg = false
let banUso = false
let bandDir = false
let bandNum = false
let bandCP = false
let bandEmail = false

/*Detecta cuando el boton fue presionado*/
let boton = document.getElementById("boton4");
boton.addEventListener("click", (e) => {
    if (banRazon==false){
        nombreDenominación.style.border = "3px solid red";
    }else if(banReg==false){
        regimenFiscal.style.border = "3px solid red";
    }else if(banUso==false){
        usoComprobante.style.border = "3px solid red";
    }else if(bandDir==false){
        direccion.style.border = "3px solid red";
    }else if(bandCP==false){
        codigoPostal.style.border = "3px solid red";
    }else if(bandEmail==false){
        email.style.border = "3px solid red";
    }else if(bandNum==false){
        telefono.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý0-9\s.,#]{2,20}$/,
    numero:/^[0-9]{10}$/,
    cp:/^[0-9]{5}$/,
    correo:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/
}

/* Input de razon social*/
formulario.nombreDenominación.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        nombreDenominación.style.border = "3px solid red";
        banRazon = false
    }else{
        nombreDenominación.removeAttribute("style");
        banRazon = true
    }
})

/* Input de regimen Fiscal*/
formulario.regimenFiscal.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        regimenFiscal.style.border = "3px solid red";
        banReg = false
    }else{
        regimenFiscal.removeAttribute("style");
        banReg = true
    }
})

/* Input de uso Comprobante*/
formulario.usoComprobante.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        usoComprobante.style.border = "3px solid red";
        banUso = false
    }else{
        usoComprobante.removeAttribute("style");
        banUso = true
    }
})

/* Input direccion */
formulario.direccion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.direccion.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@$%^&^*()_+\-=\[\]{};':"\\|<>\/?]/g, '')

    if (!expresiones.cadenas.test(valorInput)) {
        direccion.style.border = "3px solid red";
        bandDir = false
	}else{
        direccion.removeAttribute("style");
        bandDir = true
    }
    validar(bandDir);
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

/* Input telefono */
formulario.telefono.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.telefono.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')

    if (!expresiones.numero.test(valorInput)) {
        telefono.style.border = "3px solid red";
        bandNum = false
	}else{
        telefono.removeAttribute("style");
        bandNum = true
    }
    validar(bandNum);
})


function validar(bandera){
    const siguiente = document.getElementById('boton4');
    if(bandera == true){
        siguiente.disabled=false;
    }
    else{
        siguiente.disabled=true;
    }

}