var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('validacionesDireccion.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='negativo calle'){
            alert("El número de la calle no puede ser negativo");
        }
        
        else if(data==='digitosCP'){
            alert("El código postal debe tener 5 dígitos");
        }
            
        else if(data==='negativoCP'){
            alert("El código postal debe ser positivo");
        }
        
        else if(data==='estado-municipio'){
            alert("El municipio no se encuentra en el estado indicado");
        }
        
        else if(data === 'estado'){
            alert("El estado no existe");
        }

        else if(data === 'municipio'){
            alert("La ciudad no existe");
        }
        
        else{
            alert("La información ha sido aceptada");
            location.href = "registroTarjeta.php";
        }
    })
})