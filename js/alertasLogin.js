var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logicaLogin.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='usuario error'){
            alert("El usuario o contraseña estan incorrectos");
        }

        else if (data === 'usuario no registrado') {
            alert("El usuario no esta registrado");
        }

        else if (data === 'todo bien') {
            alert("Iniciado sesion correctamente");
            location.href="administrativo.php";
        }
    })
})