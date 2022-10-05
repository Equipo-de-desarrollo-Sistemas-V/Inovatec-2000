// var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('logPerfilCliente.php', {
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='conR'){
            alert('Fallo al conectar a la base de datos');
        }else if (data==='nombre'){
            alert('El nombre no debe contener más de 40 caracteres (a-z / A-Z)')
        }else if (data==='apellidos'){
            alert('Los apellidos no deben contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='telefono'){
            alert('El teléfono debe tener 10 dígitos (0-9)')
        }else if (data==='correo'){
            alert('El correo ya se encuentra registrado en el sistema')
        }
        
        
        
        else if(data==='calle'){
            alert('El nombre de la calle no debe contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='numero'){
            alert('El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos.')
        }else if (data==='colonia'){
            alert('El nombre de la colonia no debe contener más de 20 caracteres (a-z / A-Z)')
        }else if (data==='codigo'){
            alert('El código postal debe ser totalmente númerico (0-9), de 5 dígitos.')
        }else if (data==='municipio'){
            alert('El municipio no existe')
        }else if (data==='estado'){
            alert('El estado no existe')
        }else if (data==='munEstaExi'){
            alert('El municipio no se encuentra en el estado indicado')
        }else if (data==='munEst'){
            alert('El nombre del municipio y/o estado no debe contener más de 100 caracteres (a-z / A-Z)')
        }

        else if (data==='actual'){
            alert('La contraseña actual ingresada no coincide con la registrada')
        }else if (data==='confirmacion'){
            alert('La contraseña y la confirmación no coinciden')
        }else if (data==='validacion'){
            alert('La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales.')
        }else if (data==='longitud'){
            alert('"La contraseña debe tener un mínimo de 8 caracteres')
        }/*else if (data==='contAct'){
            alert('Contraseña actualizada')
        }*/


        else  if (data==='nomTar'){
            alert('El nombre de la tarjeta solo debe contener letras (a-z / A-Z)')
        }else if (data==='numTar'){
            alert('El número de tarjeta debe tener 16 dígitos (0-9)')
        }else if (data==='mes'){
            alert('El mes de expiración debe ser númerico (1-12)')
        }else if (data==='anio'){
            alert('El año de expiración debe ser númerico de 2 dígitos (mayor o igual a 2022)')
        }else if (data==='cvv'){
            alert('El cvv debe ser númerico de tres dígitos.')
        }


        else if (data==='incor'){
            alert('Constraseña incorrecta')
        }
        
        else if (data==='chido'){
            alert('Datos actualizados')
        }
        else if (data==='eliminar'){
            var respuesta=confirm("¿Estas seguro que deseas eliminar tu cuenta?");
            if(respuesta==true){
                location.href="eliminarCuenta.php";
                // $file = fopen("archivo_correo.txt", "r");
                // $auxIngreso = fgets($file);
                // fclose($file);

                // $ingreso ="";
                // for ($i=0;$i<strlen($auxIngreso)-2;$i++){
                //     $ingreso= $ingreso.$auxIngreso[$i];
                // }

                // $file = fopen("archivo_correo.txt", "w");
                // fwrite($file, "Si". PHP_EOL);
                // fwrite($file, $ingreso. PHP_EOL);
                // fclose($file);
                //alert('Constraseña incorrecta')
                //location.href="eliminarCuenta.php";
                location.href="cerrar.php";

                //include_once("cerrar.php");
            }else{
                return false;
            }
        }
        




    })
})    