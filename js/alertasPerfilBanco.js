var formulario = document.getElementById('formularioB');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logPerfilBanco.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else  if (data==='nomTar'){
            alert('El nombre de la tarjeta solo debe contener letras (a-z / A-Z)')
        }else if (data==='numTar'){
            alert('El número de tarjeta debe tener 16 díigitos (0-9)')
        }else if (data==='mes'){
            alert('El mes de expiración debe ser númerico (1-12), máximo 2 dígitos')
        }else if (data==='anio'){
            alert('El año de expiración debe ser númerico de 2 dígitos')
        }else if (data==='cvv'){
            alert('El cvv debe ser númerico de tres dígitos.')
        }else if (data==='banAct'){
            alert('Datos bancarios actualizados')
        }
    })
})