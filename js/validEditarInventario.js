/* Declara una variable global */
let bExis = true
let bStock = true

const expresiones = {
    numero:/^[0-9]{1,100}$/
}

/* Input de existentes */
formulario.cantidad.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.cantidad.value = valorInput
    .replace(/[^0-9]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        cantidad.style.border = "3px solid red";
        bExis = false
	}else{
        cantidad.removeAttribute("style");
        bExis = true
    }
    validar();
})

/* Input stcok minimo*/
formulario.stockmin.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.stockmin.value = valorInput
    .replace(/[^0-9.]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        stockmin.style.border = "3px solid red";
        bStock = false
	}else{
        stockmin.removeAttribute("style");
        bStock = true
    }
    validar();
})


function validar(){
    const guardar = document.getElementById('guardar');
    if(bExis == true && bStock== true){
        guardar.disabled=false;
    }
    else{
        guardar.disabled=true;
    }

}