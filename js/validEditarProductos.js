/* Declara una variable global */
let bNom = true
let bPrC = true
let bPrV = true
let bDes = true

const expresiones = {
    nombre:/^[a-zA-ZÁ-ý\s0-9"-]{3,50}$/,
    precio:/^[0-9.]{0,100}$/,
    descripcion:/^[a-zA-ZÁ-ý0-9\s"-]{1,10000}$/
}

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
    //validar();
})

/*Funcion para validar que el precio de compra sea menor o igual que el precio de venta*/
const validarPrecios = () =>{
    const inputPC = document.getElementById('precioProd');
    const inputPV = document.getElementById('precioVenta');
    var compra=parseFloat(inputPC.value)
    var venta=parseFloat(inputPV.value)

    console.log(compra, venta)

    if (compra > venta){
        console.log("Hola"+" "+inputPC.value+" "+inputPV.value)
        precioVenta.style.border = "3px solid red";
        bPrV = false
        
    }else if(compra < venta){
        console.log("Adios"+" "+inputPC.value+" "+inputPV.value)
        precioVenta.removeAttribute("style");
        bPrV = true
    }
    validar();
}
/* Input descripcion del producto */
formulario.descripcion.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.descripcion.value = valorInput
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':\\|,.<>\/?]/g, '')

    if (!expresiones.descripcion.test(valorInput)) {
        descripcion.style.border = "3px solid red";
        bDes = false
	}else{
        descripcion.removeAttribute("style");
        bDes = true
    }
    validar();
})

function validar(){
    const guardar = document.getElementById('guardar');
    if(bNom== true && bPrC == true && bPrV == true && bDes == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}