var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('LOGupdateEntrada.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='error'){
            alert("Error al actualizar la cantidad");
        }
        
        else if (data === 'confirmado') {
            alert("Inventario actualizado");
            location.href="consulta_inventario.php";
        }
    })
})