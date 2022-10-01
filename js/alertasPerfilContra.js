var formulario = document.getElementById('formularioC');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logPerfilContra.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else if (data==='confirmacion'){
            alert('La contraseña y la confirmación no coinciden.')
        }else if (data==='validacion'){
            alert('La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales.')
        }else if (data==='longitud'){
            alert('"La contraseña debe tener un mínimo de 8 caracteres')
        }else if (data==='contAct'){
            alert('Contraseña actualizada')
        }
    })
})