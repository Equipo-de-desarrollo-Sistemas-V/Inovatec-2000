/* Declara una variable global */
let bId = false


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
    id:/^[a-zA-ZÁ-ý0-9-]{1,8}$/
}

/* Input id del Producto */
formulario.idSucursal.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.idSucursal.value = valorInput
    // Eliminar espacios en blanco
	.replace(/\s/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+=\[\]{};':"\\|,.<>\/?]/g, '')
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.id.test(valorInput)) {
        idSucursal.style.border = "3px solid red";
        bId = false
	}else{
        idSucursal.removeAttribute("style");
        bId = true
    }
    validar();
})


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