/* Declara una variable global */
let bNom = true
let bRFC = true  
let bEmail = true

const expresiones = {
    id:/^[a-zA-ZÁ-ý0-9-]{1,8}$/,
    empresa:/^[a-zA-ZÁ-ý\s0-9"]{1,20}$/,
    rfc:/^[A-Z0-9]{12}$/,
    email:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/
}

/* Input del nombre de la empresa*/
formulario.empresaProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.empresaProv.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆ·ôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_\-+=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.empresa.test(valorInput)) {
        empresaProv.style.border = "3px solid red";
        bNom = false
	}else{
        empresaProv.removeAttribute("style");
        bNom = true
    }
    validar();
})

/* Input del RFC*/
formulario.rfcProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfcProv.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
   .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfcProv.style.border = "3px solid red";
        bRFC = false
	}else{
        rfcProv.removeAttribute("style");
        bRFC = true
    }
    validar();
})

/* Input del email*/
formulario.correoProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.correoProv.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôö·òûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.email.test(valorInput)) {
        correoProv.style.border = "3px solid red";
        bEmail = false
	}else{
        correoProv.removeAttribute("style");
        bEmail = true
    }
    validar();
})


function validar(){
    const guardar = document.getElementById('guardar');
    if(bNom== true && bRFC == true && bEmail == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}