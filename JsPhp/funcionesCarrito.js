

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
    console.log(data);
  }
}

function continuar(){

  window.location.href = "datos_venta.php";
}