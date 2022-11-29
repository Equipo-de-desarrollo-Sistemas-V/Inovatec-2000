var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('recuperarContra.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert("Fallo al conectar a la base de datos.");
        }else if(data==='registro'){
            alert("El correo no se encuentra registrado en el sistema.");
        }else if(data==='correoInvalido'){
            alert("Por favor inserte un correo válido");
        }else if(data==='correoNo'){
            alert("No se pudo enviar el correo");
        }else{
            alert('Se ha enviado un correo electrónico con las instrucciones para la recuperación de tu contraseña. Por favor, verifica la información enviada.');
            location.href="recuperarContraseña.php";
        }
    })
})