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