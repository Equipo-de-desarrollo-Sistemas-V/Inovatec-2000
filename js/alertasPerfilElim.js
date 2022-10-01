var formulario = document.getElementById('formularioE');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logicaPeril.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else if(data==='confirmacion'){
            alert("La contraseña y la confirmación no coinciden.");
        }else if (data==='incor'){
            alert('Constraseña incorrecta')
        }else { //if (data==='elim')
            alert('Cuenta eliminada.')
        }
    })
})