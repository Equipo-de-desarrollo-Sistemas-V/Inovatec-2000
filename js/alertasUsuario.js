var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('validacionesUsuario.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='usuario existente'){
            alert("Este usuario no está disponible");
        }

        else if (data === 'usuario largo') {
            alert("El usuario no puede contener mas de 20 caracteres");
        }

        else if (data === 'nombres largos') {
            alert("El nombre no puede contener mas de 40 caracteres");
        }

        else if (data === 'numeros nombre') {
            alert("El nombre de usuario no puede contener números ni caracteres especiales");
        }

        else if (data === 'apellidos largos') {
            alert("Los apellidos no pueden contener mas de 20 caracteres cada uno");
        }

        else if (data === 'numeros apellidos') {
            alert("Los apellidos no pueden contener números ni caracteres especiales");
        }

        else if (data === 'invalido') {
            alert("Por favor ingresa un correo válido");
        }

        else if (data === 'inexistente') {
            alert("El correo ingresado no existe");
        }

        else if (data === 'correo exsistente') {
            alert("Este correo ya está registrado en la base de datos");
        }

        else if (data === 'longitud') {
            alert("El teléfono debe contener 10 dígitos (0-9)");
        }

        else if (data === 'letras telefono') {
            alert("El teléfono debe contener únicamente números");
        }

        else if (data === 'todo chido') {
            alert("Información aceptada");
            location.href = "registroContrasea.php";
        }
        
    })
})