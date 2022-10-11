/* Declara una variable global */
let bandNombre = false
let bandAP = false
let bandAM = false
let bandEmail = false
let bandTel = false
let bandUsua = false

const expresiones = {
    cadenas:/^[a-zA-ZÁ-ý\s]{3,40}$/,
    apellidos:/^[a-zA-ZÁ-ý\s]{3,20}$/,
    usuario:/^[a-zA-ZÁ-ý0-9\s_@.]{3,20}$/,
    telefono:/^[0-9]{10}$/,
    correo:/^[a-zA-Z0-9.-_+]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]/
}

/* Input nombre del cliente */
formulario.nombreCliente.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreCliente.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    /*$conta = 0;
    for ($i = 0; $i < strlen($cadena); $i++) {
        //verifica que el caracter no sea numero, letra o espacio (ya admite acentos y ñ)
        if ((ord($cadena[$i]) <= 47 || ord($cadena[$i]) >= 58) && (ord($cadena[$i]) <= 64 || ord($cadena[$i]) >= 91) && (ord($cadena[$i]) <= 96 || ord($cadena[$i])
                >= 123) && ord($cadena[$i]) != 32 || ord($cadena[$i]) != 195 && ord($cadena[$i]) != 161 && ord($cadena[$i]) != 169 && ord($cadena[$i]) != 173 &&
            ord($cadena[$i]) != 179 && ord($cadena[$i]) != 186 && ord($cadena[$i]) != 129 &&  ord($cadena[$i]) != 137 &&  ord($cadena[$i]) != 141 &&  ord($cadena[$i]) != 147
            &&  ord($cadena[$i]) != 154 &&  ord($cadena[$i]) != 177 &&  ord($cadena[$i]) != 145
        ) {
            $conta++;
            //echo json_encode(ord($cadena[$i]));
        }
    }*/
    if (!expresiones.cadenas.test(valorInput)) {
        nombreCliente.style.border = "3px solid red";
        bandNombre = false
	}else{
        nombreCliente.removeAttribute("style");
        bandNombre = true
    }
    validar();
})

/* Input apellidoPaterno*/
formulario.apellidoPaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apellidoPaterno.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.apellidos.test(valorInput)) {
        apellidoPaterno.style.border = "3px solid red";
        bandAP = false
	}else{
        apellidoPaterno.removeAttribute("style");
        bandAP = true
    }
    validar();

})

/* Input apellidoMaterno*/
formulario.apellidoMaterno.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.apellidoMaterno.value = valorInput
    // Eliminar numeros
    .replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim(); 

    if (!expresiones.apellidos.test(valorInput)) {
        apellidoMaterno.style.border = "3px solid red";
        bandAM = false
	}else{
        apellidoMaterno.removeAttribute("style");
        bandAM = true
    }
    validar();
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
    validar();
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
    validar();
})


function validar(){
    const siguiente = document.getElementById('siguiente');
    if(bandNombre == true && bandAP == true && bandAM == true && bandEmail == true && bandTel == true && bandUsua == true){
        siguiente.disabled=false;
    }
    else{
        siguiente.disabled=true;
    }

}

/*Swal.fire({
        icon: 'success',
        title: 'hola',
        text: 'msj',
        confirmButtonText: 'Ok',
        timer:5000,
        timerProgressBar: true,
        })*/
    //.replace(/[ord(65)-ord(67)]/g, '')
    //alert('Datos actualizados')
    //.replace(/\w/g, '')