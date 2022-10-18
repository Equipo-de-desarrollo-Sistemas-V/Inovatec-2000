var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logAltaSucursal.php', { 
        method:'POST', 
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='ID existente'){
            alert("Ya hay una sucursal registrada con ese ID");
        }
        
        else if (data === 'conexion BD') {
            alert("Se produjo un problema al conectar con la base de datos");
        }

        else if (data === 'consulta BD') {
            alert("Se produjo un problema en la consulta a la base de datos");
        }

        else if(data === 'todo chido'){
            alert("El registro se ha realizado con éxito");
            location.href = "alta_sucursal.php";
        }
            
        else {
            alert(data);
        }
    })
})