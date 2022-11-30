/* Declara una variable global */
let bandCod = false
let bandPas1 = false
let bandPas2 = false

/*Detecta cuando el boton fue presionado*/
let botonSig = document.getElementById("actualizar");
botonSig.addEventListener("click", (e) => {

    if (bandCod==false){
        codigoS.style.border = "3px solid red";
    }else if(bandPas2==false){
        contraseñaS.style.border = "3px solid red";
    }else if(bandPas2==false){
        confirmarContraseña.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

const expresiones = {
    passw:/^[a-zA-Z0-9üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]{8,255}$/,
    codigo:/^[0-9]{4,5}$/
}

/* Input de la codigo*/
formulario.codigoS.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.codigoS.value = valorInput
    // Eliminar espacios en blanco
    .replace(/\s/g, '')
    // Eliminar letras
	.replace(/\D/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
    // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.codigo.test(valorInput)) {
        codigoS.style.border = "3px solid red";
        bandCod = false
	}else{
        codigoS.removeAttribute("style");
        bandCod= true
    }
    validar(bandCod);
})

/* Input de la constrasenia*/
formulario.contraseñaS.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.contraseñaS.value = valorInput
    // Eliminar espacios en blanco
        .replace(/\s/g, '')
        // Eliminar caracteres especiales
    //.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
        // Eliminar el ultimo espaciado
    .trim();

    if (!expresiones.passw.test(valorInput)) {
        contraseñaS.style.border = "3px solid red";
        bandPas1 = false
	}else{
        contraseñaS.removeAttribute("style");
        bandPas1 = true
    }
    validarPassword2();
    validar(bandPas1);
})

/* Input de la confirmacion de la constrasenia*/
formulario.confirmarContraseña.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.confirmarContraseña.value = valorInput
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
    const inputPass1 = document.getElementById('contraseñaS');
    const inputPass2 = document.getElementById('confirmarContraseña');

    if (inputPass1.value !== inputPass2.value){
        confirmarContraseña.style.border = "3px solid red";
        bandPas2 = false
    }else{
        confirmarContraseña.removeAttribute("style");
        bandPas2 = true
    }
    validar(bandPas2);
}



function validar(bandera){
    const actualizar = document.getElementById('actualizar');
    if(bandera == true ){
        actualizar.disabled=false;
    }
    else{
        actualizar.disabled=true;
    }

}