var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logPerfilUsua.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else if (data==='nombre'){
            alert('El nombre no debe contener más de 40 caracteres (a-z / A-Z)')
        }else if (data==='apellidos'){
            alert('Los apellidos no deben contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='telefono'){
            alert('El teléfono debe tener 10 dígitos (0-9)')
        }else if (data==='correo'){
            alert('El correo ya se encuentra registrado en el sistema')
        }else if (data==='datAct'){
            alert('Datos actualizados')
        }
    })
})