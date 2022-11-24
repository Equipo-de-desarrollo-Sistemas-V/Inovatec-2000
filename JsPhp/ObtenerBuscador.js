const btnbuscar = document.getElementById("spanbtn")

btnbuscar.addEventListener("click", () => {
  const caja = document.getElementById("search")
  console.log(caja.value)

  if (caja.value == "") {
    alert("El campo de busqueda esta vacio")
  }
  else {
    let nueva_direccion = "buscadorResultados.php?item=" + caja.value

    /* llama el archivo que se encuentra en nueva_direccion */
    location.href = nueva_direccion
  }
})