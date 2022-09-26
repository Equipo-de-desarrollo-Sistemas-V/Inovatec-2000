nombreCliente.addEventListener("keyup", (e) => {
    let valorInput = e.target.value;

    formulario.nombreCliente.value = valorInput .replace(/\s/g, "").replace(/\d/g, "");

    if (valorInput.length > 3) {
        banderaNombre = 1;
    } else {
        banderaNombre = 0;
    }
    mostrarFrente();
});