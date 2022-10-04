//var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

//alert("Archivo JS de alertas si corre   ");

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('registro4.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='digitos tarjeta'){
            alert("El número de terjeta debe tener 16 dígitos");
        }
        
        else if (data === 'fallo bd') {
            alert("Fallo al conectar con la base de datos");
            location.href = "registroUsuarios.php"
        }
            
        else{
            alert("La información ha sido aceptada");
            location.href = "login.php";
        }
    })
})