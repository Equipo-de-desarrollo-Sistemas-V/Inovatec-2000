/* Declara una variable global */
let bExis = false
let bStock = false

const expresiones = {
    numero:/^[0-9]{1,100}$/
}

/* Input de existentes */
formulario.existentes.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.existentes.value = valorInput
    .replace(/[^0-9]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        existentes.style.border = "3px solid red";
        bExis = false
	}else{
        existentes.removeAttribute("style");
        bExis = true
    }
    validar();
})

/* Input stcok minimo*/
formulario.stock.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.stock.value = valorInput
    .replace(/[^0-9.]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        stock.style.border = "3px solid red";
        bStock = false
	}else{
        stock.removeAttribute("style");
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