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

  fetch(url, {
    method: "GET"
  })
      .then(response => response.json())
      .then(data => fetchEjecuted(data))
      .catch(error => console.log(error));

  const fetchEjecuted = (data) => {
    let size = Object.keys(data).length;
    let i = 0;

    for(let i = 0; i < size; i++){
      document.getElementById(data[i]).remove();
    }
  }
}