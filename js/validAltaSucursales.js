let bId = false

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

function validar(){
    const guardar = document.getElementById('guardar');
    if(bId == true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}