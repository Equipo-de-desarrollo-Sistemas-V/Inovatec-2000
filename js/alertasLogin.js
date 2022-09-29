var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('login.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conn'){
            alert('Fallo al conectar a la base de datos');
        }
        else if(data==='registro'){
            alert("El correo no se encuentra registrado en el sistema.");
        }
    })
})