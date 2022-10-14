/* Declara una variable global */
let bId = false
let bNom = false
let bAP = false
let bAM = false
let bRFC = false
let bEmail = false

const expresiones = {
    id:/^[a-zA-ZÁ-ý0-9-]{6,8}$/,
    nombre:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s0-9"-]{3,50}$/,
    rfc:/^[A-Z0-9]{13}$/,
    email:/^[a-zA-Z0-9.-_+]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]/
}

/* Input id del trabajador*/
formulario.idTrabajador.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idTrabajador.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idTrabajador.style.border = "3px solid red";
        bId = false
	}else{
        idTrabajador.removeAttribute("style");
        bId = true
    }
    validar();
})

/* Input del nombre del trabajador*/
formulario.nombreTabajador.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreTabajador.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.nombre.test(valorInput)) {
        nombreTabajador.style.border = "3px solid red";
        bNom = false
	}else{
        nombreTabajador.removeAttribute("style");
        bNom = true
    }
    validar();
})

/* Input del apellido paterno*/
formulario.apPaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apPaterno.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apellidos.test(valorInput)) {
        apPaterno.style.border = "3px solid red";
        bAP = false
	}else{
        apPaterno.removeAttribute("style");
        bAP = true
    }
    validar();
})

/* Input del apeliido materno*/
formulario.apMaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apMaterno.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apellidos.test(valorInput)) {
        apMaterno.style.border = "3px solid red";
        bAP = false
	}else{
        apMaterno.removeAttribute("style");
        bAP = true
    }
    validar();
})

/* Input del RFC*/
formulario.rfc.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfc.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfc.style.border = "3px solid red";
        bRFC = false
	}else{
        rfc.removeAttribute("style");
        bRFC = true
    }
    validar();
})

/* Input del RFC*/
formulario.rfc.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfc.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfc.style.border = "3px solid red";
        bRFC = false
	}else{
        rfc.removeAttribute("style");
        bRFC = true
    }
    validar();
})

/* Input del correo*//*
formulario.rfc.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfc.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.email.test(valorInput)) {
        rfc.style.border = "3px solid red";
        bRFC = false
	}else{
        rfc.removeAttribute("style");
        bRFC = true
    }
    validar();
})*/

/* Input de la constrasenia*/
formulario.rfc.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfc.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfc.style.border = "3px solid red";
        bRFC = false
	}else{
        rfc.removeAttribute("style");
        bRFC = true
    }
    validar();
})


function validar(){
    const guardar = document.getElementById('guardar');
    if(bId == true && bNom== true && bPrC == true && bPrV == true && bDes == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}