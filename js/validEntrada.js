/* Declara una variable global */
let bCarga= false

/*Detecta cuando el boton fue presionado*/
let botonRegresar = document.getElementById("guardar");
botonRegresar.addEventListener("click", (e) => {

    if (bCarga==false){
        carga.style.border = "3px solid red";
    }else{
        validar(true);
    }
});

/*Funciones que define las distinas expresiones para validar los campos*/
const expresiones = {
    numero:/^[0-9]{1,1000}$/
}

/* Input de carga */
formulario.carga.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.carga.value = valorInput
    .replace(/[^0-9]+/, "")
     // Eliminar el ultimo espaciado
	.trim();

    if (!expresiones.numero.test(valorInput)) {
        carga.style.border = "3px solid red";
        bCarga = false
	}else{
        carga.removeAttribute("style");
        bCarga = true
    }
    validar(bCarga);
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