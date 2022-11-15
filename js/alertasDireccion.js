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
    var calle = document.getElementById('calle').value;
    var numero = document.getElementById('numero').value;
    var colonia = document.getElementById('colonia').value;
    var estado = document.getElementById('estados').value;
    var municipio = document.getElementById('municipio').value;
    var cp = document.getElementById('codigoPostal').value;
    

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
        
        else if(data === 'numeros colonia'){
            alert("El nombre de la colonia no debe contener números ni caracteres especiales");
        }
            
        else if(data === 'colonia largo'){
            alert("El nombre de la colonia no debe tener más de 20 caracteres");
        }
            
        else if(data === 'numeros calle'){
            alert("El nombre de la calle no debe contener números ni caracteres especiales");
        }
            
        else if(data === 'calle largo'){
            alert("El nombre de la calle no debe tener más de 20 caracteres");
        }
        
        else{
            //alert("Información aceptada");
            location.href = "registroTarjeta.php?user=" + usuario + "&nombre=" + nombre + "&pat=" + paterno + "&mat=" + materno + "&correo=" + email + "&tel=" + telefono + "&contra=" + contra + "&calle="+calle+"&num="+numero+"&colonia="+colonia+"&estado="+estado+"&mun="+municipio+"&cp="+cp;
        }
    })
})