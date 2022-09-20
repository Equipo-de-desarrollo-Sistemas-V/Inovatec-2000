const tarjeta = document.querySelector('#tarjeta')
const fondoTarjetaDelantera = document.querySelector('#tarjeta .delantera')
const fondoTarjetaTrasera = document.querySelector('#tarjeta .trasera')
const formulario = document.querySelector('#formulario')
const numeroTarjeta = document.querySelector('#tarjeta .numero')
const nombreTarjeta = document.querySelector('#tarjeta .nombre')
const logoMarca = document.querySelector('#logo-marca')

	
// * Volteamos la tarjeta para mostrar el frente.
const mostrarFrente = () => {
	if (tarjeta.classList.contains('active')) {
		tarjeta.classList.remove('active');
	}
}

// * Rotacion de la tarjeta
tarjeta.addEventListener('click', () => {
	tarjeta.classList.toggle('active');
});

/* Entada y verificacion de la tarjeta */
formulario.numeroTarjeta.addEventListener('keyup',(e)=>{
	let valorInput = e.target.value;

	formulario.numeroTarjeta.value = valorInput
	/* Eliminamos los espacios en blanco */
	.replace(/\s/g, '')
	/* Eliminamos las letras */
	.replace(/\D/g, '')
	/* Ponemos espacio cada cuatro numeros */
	.replace(/([0-9]{4})/g, '$1 ')
	/* Elimina el ultimo espacio */
	.trim();

	numeroTarjeta.textContent = valorInput;

	if(valorInput == ''){
		numeroTarjeta.textContent = 'xxxx - xxxx - xxxx - xxxx'
		logoMarca.innerHTML = ''
		fondoTarjetaDelantera.style.backgroundImage = 'linear-gradient(45deg, #cdcdcd 5%, #4d4d4d)'
		fondoTarjetaTrasera.style.backgroundImage = 'linear-gradient(-45deg, #cdcdcd -5%, #4d4d4d)'
	}

	if(valorInput[0] == 4){
		logoMarca.innerHTML = '' 
		const imagen = document.createElement('img');
		imagen.src = 'assets/logos-banco/visa.png';
		logoMarca.appendChild(imagen);
		fondoTarjetaDelantera.style.backgroundImage = 'linear-gradient(45deg, #5a75e3 5%, #173e7d)';
		fondoTarjetaTrasera.style.backgroundImage = 'linear-gradient(-45deg, #5a75e3 -5%, #173e7d)';
	}
	else if(valorInput[0] == 5){
		logoMarca.innerHTML = ''
		const imagen = document.createElement('img');
		imagen.src = 'assets/logos-banco/mastercard.png';
		logoMarca.appendChild(imagen);
		fondoTarjetaDelantera.style.backgroundImage = 'linear-gradient(45deg, #ea2315 5%, #80140c)';
		fondoTarjetaTrasera.style.backgroundImage = 'linear-gradient(-45deg, #ea2315 -5%, #80140c)';
	}
	else if(valorInput[0] == 3){
		logoMarca.innerHTML = ''
		const imagen = document.createElement('img');
		imagen.src = 'assets/logos-banco/amex.png';
		logoMarca.appendChild(imagen);
		fondoTarjetaDelantera.style.backgroundImage = 'linear-gradient(45deg, #006ecf -5%, #9dd7f5)';
		fondoTarjetaTrasera.style.backgroundImage = 'linear-gradient(-45deg, #006ecf 5%, #9dd7f5)';
	}
	else if(valorInput[0] == 6){
		logoMarca.innerHTML = ''
		const imagen = document.createElement('img');
		imagen.src = 'assets/logos-banco/discover.png';
		logoMarca.appendChild(imagen);
		fondoTarjetaDelantera.style.backgroundImage = 'linear-gradient(45deg, #c14a0d 5%, #ec9e24)';
		fondoTarjetaTrasera.style.backgroundImage = 'linear-gradient(-45deg, #c14a0d -5%, #ec9e24)';
	}	

	mostrarFrente();
})