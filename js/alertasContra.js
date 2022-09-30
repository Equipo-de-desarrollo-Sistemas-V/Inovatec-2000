var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('validacionesContra.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='numeros'){
            alert("La contraseña debe contener números");
        }
        
        else if(data==='caracteres'){
            alert("La contraseña debe tener al menos un caracter especial");
        }
        
        else if(data==='mayusculas'){
            alert("La contraseña debe contener mayúsculas y minúsculas");
        }
        
        else if(data === 'longitud'){
            alert("La contraseña debe tener un mínimo de 8 caracteres");
        }

        else if(data === 'coincidencia'){
            alert("La contraseña y la confirmación no coinciden");
        }
        
        else{
            alert("La contraseña ha sido aceptada");  
            location.href = "registroDireccion.php";
        }
    })
})