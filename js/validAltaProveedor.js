/* Declara una variable global */
let bId = false
let bNom = false
let bRFC = false    
let bEmail = false

/*Detecta cuando el boton fue presionado*/
let botonRegresar = document.getElementById("guardar");
botonRegresar.addEventListener("click", (e) => {

    if (bId==false){
        idProveedor.style.border = "3px solid red";
    }else if(bNom==false){
        empresaProv.style.border = "3px solid red";
    }else if(bRFC==false){
        rfcProv.style.border = "3px solid red";
    }else if(bEmail==false){
        correoProv.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    id:/^[a-zA-ZÁ-ý0-9-]{1,8}$/,
    empresa:/^[a-zA-ZÁ-ý\s0-9"]{1,20}$/,
    rfc:/^[A-Z0-9]{12}$/,
    email:/^[a-zA-Z0-9.-_+]+@[a-zA-Z]+\.[a-zA-Z]/
}

/* Input id del Producto */
formulario.idProveedor.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idProveedor.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæ·ÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idProveedor.style.border = "3px solid red";
        bId = false
	}else{
        idProveedor.removeAttribute("style");
        bId = true
    }
    validar(bId);
})

/* Input id del nombre de la empresa*/
formulario.empresaProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.empresaProv.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäà·åçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_\-+=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.empresa.test(valorInput)) {
        empresaProv.style.border = "3px solid red";
        bNom = false
	}else{
        empresaProv.removeAttribute("style");
        bNom = true
    }
    validar(bNom);
})

/* Input id del RFC*/
formulario.rfcProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.rfcProv.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
   .replace(/[üâäàåçê♪ëèï·îìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.rfc.test(valorInput)) {
        rfcProv.style.border = "3px solid red";
        bRFC = false
	}else{
        rfcProv.removeAttribute("style");
        bRFC = true
    }
    validar(bRFC);
})

/* Input id del email*/
formulario.correoProv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.correoProv.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
    // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖ·Ü¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡#$%^&^*()\-=\[\]{};':"\\|,<>\/?]/g, '')
    // Eliminar el ultimo espaciado
   .trim();

    if (!expresiones.email.test(valorInput)) {
        correoProv.style.border = "3px solid red";
        bEmail = false
	}else{
        correoProv.removeAttribute("style");
        bEmail = true
    }
    validar(bEmail);
})


function validar(bandera){
    const guardar = document.getElementById('guardar');
    if(bandera == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}