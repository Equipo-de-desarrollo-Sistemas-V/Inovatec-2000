/* Declara una variable global */
let bId = false
let bNom = false
let bPrC = false
let bPrV = false
let bDes = false

const expresiones = {
    id:/^[0-9]{1,8}$/,
    nombre:/^[a-zA-ZÁ-ý\s0-9"-]{3,50}$/,
    precio:/^[0-9.]{0,100}$/,
    descripcion:/^[a-zA-ZÁ-ý0-9\s"-.,]{1,10000}$/
}

/* Input id del Producto */
formulario.idProducto.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idProducto.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
	// Eliminar letras
	.replace(/\D/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idProducto.style.border = "3px solid red";
        bId = false
	}else{
        idProducto.removeAttribute("style");
        bId = true
    }
    validar();
})

/* Input nombre del Producto */
formulario.nombreProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreProd.value = valorInput
    // Eliminar numeros
    //.replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':\\|,.<>\/?]/g, '')

    if (!expresiones.nombre.test(valorInput)) {
        nombreProd.style.border = "3px solid red";
        bNom = false
	}else{
        nombreProd.removeAttribute("style");
        bNom = true
    }
    validar();
})

/* Input precio de compra */
formulario.precioProd.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;
    precio=valorInput;

	formulario.precioProd.value = valorInput
    .replace(/[^0-9.]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.precio.test(valorInput)) {
        precioProd.style.border = "3px solid red";
        bPrC = false
	}else{
        if(precio=="."){
            precioProd.style.border = "3px solid red";
            bPrC = false
        }else if(precio<=0){
            precioProd.style.border = "3px solid red";
            bPrC = false
        }else{
            var banPun= 0;
            for(i=0;i<(precio.length);i++){
                //verificar cuantos puntos ingresa
                if((precio[i]==".")){
                    banPun ++;
                }
            }
            if (banPun>1){
                precioProd.style.border = "3px solid red";
            bPrC = false
            }else{
                precioProd.removeAttribute("style");
                bPrC = true
            }
        }
    }
    validarPrecios();
    validar();
})

/* Input precio de venta */
formulario.precioVenta.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;
    precio=valorInput;

	formulario.precioVenta.value = valorInput
    .replace(/[^0-9.]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.precio.test(valorInput)) {
        precioVenta.style.border = "3px solid red";
        bPrV = false
	}else{
        if(precio=="."){
            precioVenta.style.border = "3px solid red";
            bPrV = false
        }else if(precio<=0){
            precioVenta.style.border = "3px solid red";
            bPrV = false
        }else{
            var banPun= 0;
            for(i=0;i<(precio.length);i++){
                //verificar cuantos puntos ingresa
                if((precio[i]==".")){
                    banPun ++;
                }
            }
            if (banPun>1){
                precioVenta.style.border = "3px solid red";
            bPrV = false
            }else{
                precioVenta.removeAttribute("style");
                bPrV = true
            }
        }
    }
    validarPrecios();
    validar();
})

/* Input descripcion del producto */
formulario.descripcion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.descripcion.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':\\|<>\/?]/g, '')

    if (!expresiones.descripcion.test(valorInput)) {
        descripcion.style.border = "3px solid red";
        bDes = false
	}else{
        descripcion.removeAttribute("style");
        bDes = true
    }
    validar();
})


/*Funcion para validar que el precio de compra sea menor o igual que el precio de venta*/
const validarPrecios = () =>{
    const inputPC = document.getElementById('precioProd');
    const inputPV = document.getElementById('precioVenta');

    if (inputPC.value > inputPV.value){
        precioVenta.style.border = "3px solid red";
        bPrV = false
    }else{
        precioVenta.removeAttribute("style");
        bPrV = true
    }
    validar();
}

function validar(){
    const guardar = document.getElementById('guardar');
    if(bId == true && bNom== true && bPrC == true && bPrV == true && bDes == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}