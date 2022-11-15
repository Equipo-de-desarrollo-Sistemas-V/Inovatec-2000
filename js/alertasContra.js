var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);

    var usuario = document.getElementById('usuario').value;
    var nombre = document.getElementById('nombreCliente').value;
    var paterno = document.getElementById('apellidoPaterno').value;
    var materno = document.getElementById('apellidoMaterno').value;
    var email = document.getElementById('email').value;
    var telefono = document.getElementById('Teléfono').value;
    var contra = document.getElementById('contraseña').value;

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
            alert("La contraseña debe tener al menos un carácter especial");
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
            //alert("Contraseña aceptada");  
            location.href = "registroDireccion.php?user=" + usuario + "&nombre=" + nombre + "&pat=" + paterno + "&mat=" + materno + "&correo=" + email + "&tel=" + telefono + "&contra=" + contra;
        }
    })
})