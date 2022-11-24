const btnbuscar = document.getElementById("spanbtn")

btnbuscar.addEventListener("click", () => {
    const caja = document.getElementById("search")
    console.log(caja.value)

    let nueva_direccion = "buscadorResultados.php?item="+caja.value

    /* llama el archivo que se encuentra en nueva_direccion */
    location.href = nueva_direccion
})