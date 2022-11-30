function eliminar(id) {
  console.log("El id es: " + id);

  /* Destruye el elemento con el id */
  document.getElementById(id).remove();

  let url = "JsPhp/logCarritoEliminarProducto.php";

  let form = new FormData();
  form.append("id", id);

  fetch(url, {
    method: "POST",
    body: form
  })
      .then(response => response.json())
      .then(data => fetchEjecuted(data))
      .catch(error => console.log(error));

  const fetchEjecuted = (data) => {
    console.log(data);
    actualizarTotal();
  }
}

function volver(id){
  window.location.href = "producto_individual.php?item=" + id
}

function eliminarTodo(){
  console.log("Eliminando todo");

  let url = "JsPhp/logCarritoEliminarTodo.php";
  let form = new FormData();
  form.append ("usuario", "TchRui");

  fetch(url, {
    method: "POST",
    body: form
  })
      .then(response => response.json())
      .then(data => fetchEjecuted(data))
      .catch(error => console.log(error));

  const fetchEjecuted = (data) => {
    let ids = Object.values(data);
    let size = ids[0].length;

    /* Crea una alerta de si o no que pida confirmar la acción antes de eliminar */
    let confirmacion = confirm("¿Estás seguro de que quieres eliminar todo?");

    if (confirmacion == true) {
      for(let i = 0; i < size; i++){
        eliminar(ids[0][i]);
      }
      
      document.getElementById("total").innerHTML = "$0.00";
    }

  }
}

function alterarCantidad(id){
  const contador = "cajaCantidad" + id

  let cantidad = document.getElementById(contador).value;

  let url = "JsPhp/logActualizarCanti.php";

  let form = new FormData();
  form.append("id", id);
  form.append("cantidad", cantidad);

  fetch(url, {
    method: "POST",
    body: form
  })
      .then(response => response.json())
      .then(data => fetchEjecuted(data))
      .catch(error => console.log(error));

  const fetchEjecuted = (data) => {
    actualizarTotal();
  }
}

function actualizarTotal(){
  let url = "JsPhp/logCarritoSubTotal.php"

  let form = new FormData()
  form.append("Usuario", "TchRui")

  fetch(url, {
    method: "POST",
    body: form
  })
    .then(response => response.json())
    .then(data => fetchEjecuted(data))
    .catch(error => console.log(error));

    const fetchEjecuted = (data) =>{
      /* Separa data en sus dos arreglos y multiplicalos entre si */
      let arrays = Object.values(data);
      let precios = arrays[0];
      let cantidades = arrays[1];

      let size = precios.length;
      let total = 0;

      for(let i = 0; i < size; i++){
        total += (precios[i] * cantidades[i]);
      }

      total = total.toFixed(2);
      /* Actualiza el total */
      document.getElementById("total").innerHTML = total;

    }
}

function continuar(){
  let url = "JsPhp/logCarritoVenta.php";

  let form = new FormData();
  form.append("Usuario", "TchRui");

  fetch(url, {
    method: "POST",
    body: form
  })
      .then(response => response.json())
      .then(data => fetchEjecuted(data))
      .catch(error => console.log(error));

  const fetchEjecuted = (data) => {
     /* Guarda los elementos de data en diferentes arreglos */
      let arrays = Object.values(data);
      let idExistentes = arrays[0];
      let cantidades = arrays[1];
      let id_NoExistentes = arrays[2];

      /* Obtener el valor de id_no existentes */
      let size_noExistentes = id_NoExistentes.length;

      if(size_noExistentes > 0){

        for(let i = 0; i < size_noExistentes; i++){
          const clase = ".valorPrecio" + id_NoExistentes[i];
          const valor = document.querySelector(clase);
          valor.innerHTML = "SIN EXISTENCIAS";
          valor.style.color = "red";
          valor.style.textAlign = "center"
        }
        alert("Algunos de los productos que has seleccionado no están disponibles en este momento");
      }
      else{
        let nuevaCadena = "["
        let size_existentes = idExistentes.length;

        for(let i = 0; i < size_existentes; i++){

          if(i <= size_existentes - 2){
            nuevaCadena = nuevaCadena +'['+idExistentes[i]+','+'\"'+cantidades[i]+'\"'+'],'

          }
          else{
            nuevaCadena = nuevaCadena +'['+idExistentes[i]+','+'\"'+cantidades[i]+'\"'+']'
            
          }
        }

        nuevaCadena = nuevaCadena + ']'

        /* window.location.href = "datos_venta.php?item=[[60020,\"10\"],[50200,\"5\"],[50350,\"1\"]]"; */
        window.location.href = "datos_venta.php?item=" + nuevaCadena;
      }
  }
}