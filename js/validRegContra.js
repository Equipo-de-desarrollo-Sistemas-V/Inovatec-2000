/* Declara una variable global */
let bandPas1 = false
let bandPas2 = false

/*Detecta cuando el boton fue presionado*/
let botonSig = document.getElementById("siguiente");
botonSig.addEventListener("click", (e) => {

    if (bandPas1==false){
        contraseña.style.border = "3px solid red";
    }else if(bandPas2==false){
        confirmar.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

const expresiones = {
    passw:/^[a-zA-Z0-9üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]{8,255}$/
}

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
formulario.confirmar.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.confirmar.value = valorInput
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
    const inputPass2 = document.getElementById('confirmar');

    if (inputPass1.value !== inputPass2.value){
        confirmar.style.border = "3px solid red";
        bandPas2 = false
    }else{
        confirmar.removeAttribute("style");
        bandPas2 = true
    }
    validar(bandPas2);
}



function validar(bandera){
    const siguiente = document.getElementById('siguiente');
    if(bandera == true ){
        siguiente.disabled=false;
    }
    else{
        siguiente.disabled=true;
    }

}