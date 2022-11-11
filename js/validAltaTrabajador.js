/* Declara una variable global */
let bId = false
let bNom = false
let bAP = false
let bAM = true
let bRFC = false
let bEmail = false
let bandPas1 = false
let bandPas2 = false

/*Detecta cuando el boton fue presionado*/
let botonRegresar = document.getElementById("guardar");
botonRegresar.addEventListener("click", (e) => {

    if (bId==false){
        idTrabajador.style.border = "3px solid red";
    }else if(bNom==false){
        nombreTabajador.style.border = "3px solid red";
    }else if(bAP==false){
        apPaterno.style.border = "3px solid red";
    }else if(bAM==false){
        apMaterno.style.border = "3px solid red";
    }else if(bRFC==false){
        rfc.style.border = "3px solid red";
    }else if(bEmail==false){
        correoE.style.border = "3px solid red";
    }else if(bandPas1==false){
        contraseña.style.border = "3px solid red";
    }else if(bandPas2==false){
        contraseña2.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    id:/^[a-zA-ZÁ-ý0-9-]{1,8}$/,
    nombre:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    apeMa:/^[a-zA-ZÁ-ý\s]{0,20}$/,
    rfc:/^[A-Z0-9]{13}$/,
    email:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/,
    passw:/^[a-zA-Z0-9üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]{8,255}$/
}

/* Input id del trabajador*/
formulario.idTrabajador.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idTrabajador.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòû·ùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idTrabajador.style.border = "3px solid red";
        bId = false
	}else{
        idTrabajador.removeAttribute("style");
        bId = true
    }
    validar(bId);
})

/* Input del nombre del trabajador*/
formulario.nombreTabajador.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreTabajador.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôö·òûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.nombre.test(valorInput)) {
        nombreTabajador.style.border = "3px solid red";
        bNom = false
	}else{
        nombreTabajador.removeAttribute("style");
        bNom = true
    }
    validar(bNom);
})

/* Input del apellido paterno*/
formulario.apPaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apPaterno.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîìÄÅÉæ·ÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apellidos.test(valorInput)) {
        apPaterno.style.border = "3px solid red";
        bAP = false
	}else{
        apPaterno.removeAttribute("style");
        bAP = true
    }
    validar(bAP);
})

/* Input del apellido materno*/
formulario.apMaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apMaterno.value = valorInput
   // Eliminar numeros
   .replace(/[0-9]/g, '')
   // Eliminar caracteres especiales
  .replace(/[üâäàåçê♪ëèïîì·ÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.apeMa.test(valorInput)) {
        apMaterno.style.border = "3px solid red";
        bAM = false
	}else{
        apMaterno.removeAttribute("style");
        bAM = true
    }
    validar(bAM);
})

/* Input del RFC*/
formulario.rfc.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfc.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄ·ÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfc.style.border = "3px solid red";
        bRFC = false
	}else{
        rfc.removeAttribute("style");
        bRFC = true
    }
    validar(bRFC);
})

/* Input del correo*/
formulario.correoE.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.correoE.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.email.test(valorInput)) {
        correoE.style.border = "3px solid red";
        bEmail = false
	}else{
        correoE.removeAttribute("style");
        bEmail = true
    }
    validar(bEmail);
})

/* Input de la constrasenia*/
formulario.contraseña.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.contraseña.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    //.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.passw.test(valorInput)) {
        contraseña.style.border = "3px solid red";
        bandPas1 = false
	}else{
        contraseña.removeAttribute("style");
        bandPas1 = true
    }
    validarPassword2();
    validar(bandPas1);
})

/* Input de la confirmacion de la constrasenia*/
formulario.contraseña2.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.contraseña2.value = valorInput
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
    const inputPass1 = document.getElementById('contraseña');
    const inputPass2 = document.getElementById('contraseña2');

    if (inputPass1.value !== inputPass2.value){
        contraseña2.style.border = "3px solid red";
        bandPas2 = false
    }else{
        contraseña2.removeAttribute("style");
        bandPas2 = true
    }
    validar(bandPas2);
}



/*Funcion que se encarga de habiliatar o deshabilitar el boton, segun el valor del parametro que reciba*/
function validar(bandera){
    const guardar = document.getElementById('guardar');
    if(bandera == true ){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}