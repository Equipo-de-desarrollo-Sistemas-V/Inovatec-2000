const tarjeta = document.querySelector('#tarjeta')

const fondoTarjetaDelantera = document.querySelector('#tarjeta .delantera')
const fondoTarjetaTrasera = document.querySelector('#tarjeta .trasera')

const formulario = document.querySelector('#formulario')

const numeroTarjeta = document.querySelector('#tarjeta .numero')
const nombreTarjeta = document.querySelector('#tarjeta .nombre')

const logoMarca = document.querySelector('#logo-marca')
const firma = document.querySelector('#tarjeta .firma p')

const mesExpiracion = document.querySelector('#tarjeta .mes')
const yearExpiracion = document.querySelector('#tarjeta .year')
const ccv = document.querySelector('#tarjeta .ccv')

	
// * Volteamos la tarjeta para mostrar el frente.
const mostrarFrente = () => {
	if (tarjeta.classList.contains('active')) {
		tarjeta.classList.remove('active');
	}
}

const mostrarTrasera = () => {
	if (!tarjeta.classList.contains('active')) {
		tarjeta.classList.add('active');
	}
}

// * Rotacion de la tarjeta
tarjeta.addEventListener('click', () => {
	tarjeta.classList.toggle('active');
});

/* Entada y verificacion de la tarjeta */
formulario.numeroTarjeta.addEventListener('keyup',(e)=>{
	let valorInput = e.target.value;

	formulario.numeroTarjeta.value = valorInput.replace(/\s/g, '').replace(/\D/g, '').replace(/([0-9]{4})/g, '$1 ').trim();

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

formulario.nombrePropietario.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombrePropietario.value = valorInput.replace(/[0-9]/g, '');
	nombreTarjeta.textContent = valorInput;
	mostrarFrente();

	firma.textContent = valorInput;

	if(valorInput == ''){
		nombreTarjeta.textContent = 'Nombre Y Apellido';
	}
})

formulario.mesCaja.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.mesCaja.value = valorInput.replace(/\s/g, '').replace(/\D/g, '');

	if(valorInput > 12){
		valorInput = 0
		formulario.mesCaja.value = ""
		mesExpiracion.textContent = 'MM';
	}
	else if(valorInput < 1){
		valorInput = 0
		formulario.mesCaja.value = ""
		mesExpiracion.textContent = 'MM'
	}
	else if(valorInput == ''){
		valorInput = 'MM'
		formulario.mesCaja.value = 'MM'
	}

	else if(valorInput >= 1 && valorInput < 10){
		cadena = '0' + valorInput
		mesExpiracion.textContent = cadena;
	}
	else if(valorInput >= 10 && valorInput <= 12){
		mesExpiracion.textContent = valorInput;
	}

	
})

formulario.yearCaja.addEventListener('keyup',(e) => {
	let valorInput = e.target.value;

	formulario.yearCaja.value = valorInput.replace(/\s/g, '').replace(/\D/g, '');

	if(valorInput == ''){
		yearExpiracion.textContent = 'YY';
	}
	else if(valorInput.length == 2){

		if(valorInput >= 15 && valorInput <= 35){
			cadena = '20' + valorInput
			yearExpiracion.textContent = cadena;
		}
		else{
			valorInput = ''
			formulario.yearCaja.value = ""
			yearExpiracion.textContent = 'YY';
		}
		
	}
	
})

formulario.ccvCaja.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.ccvCaja.value = valorInput.replace(/\s/g, '').replace(/\D/g, '');

	if(valorInput == ''){
		ccv.textContent = 'CCV';
	}
	ccv.textContent = valorInput;
	mostrarTrasera()
})