/* Declara una variable global */
let bId = false
let bNom = false
let bCat = false
let bPrC = false
let bPrV = false
let bDes = false


/*Detecta cuando el boton fue presionado*/
let botonRegresar = document.getElementById("guardar");
botonRegresar.addEventListener("click", (e) => {

    if (bId==false){
        idProducto.style.border = "3px solid red";
    }else if(bNom==false){
        nombreProd.style.border = "3px solid red";
    }else if(bCat==false){
        categoria.style.border = "3px solid red";
    }else if(bPrC==false){
        precioProd.style.border = "3px solid red";
    }else if(bPrV==false){
        precioVenta.style.border = "3px solid red";
    }else if(bDes==false){
        descripcion.style.border = "3px solid red";
    }else{
        validar(true);
    }
});


/*Funciones que define las distinas expresiones para validar los campos*/
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
    validar(bId);
})

/* Select de Categoria*/
formulario.categoria.addEventListener('change', (e) => {
	let valorInput = e.target.value;
    if (valorInput==""){
        categoria.style.border = "3px solid red";
        bCat = false
    }else{
        categoria.removeAttribute("style");
        bCat = true
    }
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
    validar(bNom);
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
    validar(bPrC);
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
    validar(bDes);
})


/*Funcion para validar que el precio de compra sea menor o igual que el precio de venta*/
const validarPrecios = () =>{
    const inputPC = document.getElementById('precioProd');
    const inputPV = document.getElementById('precioVenta');
    var compra=parseFloat(inputPC.value)
    var venta=parseFloat(inputPV.value)

    if (compra > venta){
        precioVenta.style.border = "3px solid red";
        bPrV = false
        
    }else if(compra < venta){
        precioVenta.removeAttribute("style");
        bPrV = true
    }
    validar(bPrV);
}


/*Funcion que se encarga de habiliatar o deshabilitar el boton, segun el valor del parametro que reciba*/
function validar(bandera){
    const guardar = document.getElementById('guardar');
    if(bandera == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;   
    }

}