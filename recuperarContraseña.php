<?php
$email=$_GET['email'];
?>

<!DOCTYPE html>
<!-- Interfaz para RECUPERAR CONTRASEÑA -->
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar tu cuenta</title>
  <link rel="stylesheet" href="css/resetPassword.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar container">
      <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
    </nav>
  </header>

  <section class="waves">
    <div class="bgcolor"></div>
    <div class="wave w1"></div>
  </section>

  <section class="container-all">

    <article class="image">
      <img src="css/assets/reestablecerpassword.svg" alt="logo">
    </article>

    <article class="login">
      <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
      <div class="card-login">
        <form id="formulario">
          <!--llama a la accion de logear-->
          <h2>ACTUALIZA TU CONTRASEÑA</h2>

          <p class="subcabecera">Ingresa la nueva <span>contraseña</span>. Guardala muy <span>bien</span>.</p>

          <div class="passwords">
            <div class="input-group">
              <input type="input" name="codigoS" id="codigoS" required minlength="4" maxlength="5" class="input">
              <label for="codigo" class="input-label">Código</label>
            </div>
            <div class="input-group">
              <input type="password" name="contraseñaS" id="contraseñaS" required minlength="8" class="input">
              <label for="contraseña" class="input-label">Contraseña</label>
            </div>
            <div class="input-group-2">
              <input type="password" name="confirmarContraseña" id="confirmarContraseña" required minlength="8" class="input"
                autocomplete="off">
              <label for="confirmarContraseña" class="input-label">Confirmar contraseña</label>
            </div>
            <input type="hidden" name="correo" id="correo" class="input" value="<?php echo $email;?>">
          </div>
            <input type="button"  name="actualizar" id="actualizar" value="Actualizar" class="btn-login" onclick="restablecerContra();">
        </form>
      </div>
    </article>
  </section>
  <script src="js/validRecuContra.js"></script>
  <script src="js/linkHome.js"></script>
</body>
</html>

<script>
  function restablecerContra(){
    var codigo=document.getElementById("codigoS").value;
    var contraseña=document.getElementById("contraseñaS").value;
    var confirmarContraseña=document.getElementById("confirmarContraseña").value;
    var correo=document.getElementById("correo").value;
    if (codigo==""){
      codigoS.style.border = "3px solid red";
	  }else{
      codigoS.removeAttribute("style");
      if(contraseña==""){
        contraseñaS.style.border = "3px solid red";
      }else{
        contraseñaS.removeAttribute("style");
      }
    }

    
    if (contraseña!="" && confirmarContraseña!="" &&codigo!=""){
      $.ajax({
        type: "POST",
        url: "logRecuperarContra.php",
        dataType: "json",
        data: {"codigo":codigo, "contraseña":contraseña, "correo":correo},
        success: function(data){
          console.log(data)
          if (data=='Actualizado'){
            alert('Contraseña actualizada, ya puede iniciar sesión.')
            //mandar a llamar a la otra interfaz
            location.href="login.php";
          }else{
            alert(data)  
          }
        }
      }); 
    }
  }


</script>