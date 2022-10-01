var formulario = document.getElementById('formularioD');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logPerfilDir.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else if(data==='calle'){
            alert('El nombre de la calle no debe contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='numero'){
            alert('El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos.')
        }else if (data==='colonia'){
            alert('El nombre de la colonia no debe contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='codigo'){
            alert('El código postal debe ser totalmente númerico (0-9), de 5 dígitos.')
        }else if (data==='municipio'){
            alert('El municipio no existe')
        }else if (data==='estado'){
            alert('El estado no existe')
        }else if (data==='munEstaExi'){
            alert('El municipio no se encuentra en el estado indicado')
        }else if (data==='munEst'){
            alert('El nombre del municipio y/o estado no debe contener más de 100 caracteres (a-z / A-Z)')
        }else if (data==='dicAct'){
            alert('Dirección actualizada')
        }
    })
})