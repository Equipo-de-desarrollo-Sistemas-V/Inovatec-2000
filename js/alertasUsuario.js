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
        
        else if(data==='inexistente'){
            alert("El correo ingresado no es válido, por favor ingresa un correo existente");
        }
        
        else if(data==='invalido'){
            alert("Por favor ingresa un correo válido");
        }
        
        else if(data === 'longitud'){
            alert("El teléfono debe tener 10 dígitos");
        }

        else if(data === 'letras'){
            alert("El teléfono no debe contener letras ni símbolos especiales");
        }
            
        else if(data === 'todo chido'){
            alert("La información ha sido registrada correctamente"); 
            location.href="registroContrasea.php"
        }
        
        else if(data === 'nombres largos'){
            alert("Los nombres no deben sumar más de 40 caracteres"); 
        }
            
        else if(data === 'apellidos largos'){
            alert("Los apellidos no deben tener más de 20 caracteres"); 
        }
        
        else{
            alert("El nombre de usuario no debe contener más de 20 caracteres");
        }
    })
})