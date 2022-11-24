const btnbuscar = document.getElementById("spanbtn")

btnbuscar.addEventListener("click", () => {
    const caja = document.getElementById("search")
    console.log(caja.value)

    let nueva_direccion = "buscadorResultados.php?item="+caja.value

    /* Llama a la ventana CarritoVentas */

})