/* Declara una variable global */
let bId = false
let bNom = false
let bPrC = false
let bPrV = false
let bDes = false

const expresiones = {
    id:/^[0-9]{1-8}$/,
    nombre:/^[a-zA-ZÁ-ý\s][0-9]{3,50}$/,
    precio:/^[0-9.]$/,
    descripcion:/^[a-zA-ZÁ-ý\s]{1,10}$/
}

/* Input id del Producto */
formulario.idProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idProd.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idProd.style.border = "3px solid red";
        bId = false
	}else{
        idProd.style.border = "3px solid green";
        idProd.removeAttribute("style");
        bId = true
    }
    //validar();
})

/* Input nombre del Producto */
formulario.nombreProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreProd.value = valorInput
    // Eliminar numeros
    //.replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.nombre.test(valorInput)) {
        nombreProd.style.border = "3px solid red";
        bNom = false
	}else{
        nombreProd.style.border = "3px solid green";
        // nombreProd.removeAttribute("style");
        bNom = true
    }
    //validar();
})

/* Input precio de compra */
formulario.precioProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.precioProd.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.precio.test(valorInput)) {
        precioProd.style.border = "3px solid red";
        bPrC = false
	}else{
        precioProd.removeAttribute("style");
        bPrC = true
    }
    //validar();
})

/* Input precio de venta */
formulario.precioVenta.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.precioVenta.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.precio.test(valorInput)) {
        precioVenta.style.border = "3px solid red";
        bPrV = false
	}else{
        precioVenta.removeAttribute("style");
        bPrV = true
    }
    //validar();
})

/* Input descripcion del producto */
formulario.descripcion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.descripcion.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')

    if (!expresiones.descripcion.test(valorInput)) {
        descripcion.style.border = "3px solid red";
        bDes = false
	}else{
        descripcion.removeAttribute("style");
        bDes = true
    }
    //validar();
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