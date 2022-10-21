/* Declara una variable global */
let bNom = true
let bAP = true
let bAM = true
let bRFC = true
let bEmail = true

const expresiones = {
    nombre:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    apeMa:/^[a-zA-ZÁ-ý\s0-9"-]{0,20}$/,
    rfc:/^[A-Z0-9]{13}$/,
    email:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/
}


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

    if (!expresiones.apeMa.test(valorInput)) {
        apMaterno.style.border = "3px solid red";
        bAM = false
	}else{
        apMaterno.removeAttribute("style");
        bAM = true
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

/* Input del correo*/
formulario.usuario.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.usuario.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.email.test(valorInput)) {
        usuario.style.border = "3px solid red";
        bEmail = false
	}else{
        usuario.removeAttribute("style");
        bEmail = true
    }
    validar();
})


function validar(){
    const guardar = document.getElementById('guardar');
    if(bNom== true && bAP == true && bAM == true && bRFC == true && bEmail == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}