var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logAltaProveedor.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='ID existente'){
            alert("Ya hay un proveedor registrado con ese ID");
        }
        
        else if (data === 'conexion BD') {
            alert("Se produjo un problema al conectar con la base de datos");
        }

        else if (data === 'consulta BD') {
            alert("Se produjo un problema en la consulta a la base de datos");
        }

        else {
            alert("El registro se ha realizado con éxito");
            location.href = "administrativo2.php";
        }
    })
})