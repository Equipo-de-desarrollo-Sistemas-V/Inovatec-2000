window.onload = function () {
    let url = "JsPhp/obtenerProductos.php";
    /* categoria = "Computadoras";
    subcategoria = "Laptop"; */

    categoria = document.getElementById('categoria').textContent
    subcategoria = document.getElementById('subcategoria').textContent

    let form = new FormData();
    form.append("categoria", categoria);
    form.append("subcategoria", subcategoria);

    fetch(url, {
        method: "POST",
        body: form
    })
        .then(response => response.json())
        .then(data => arrays(data))
        .catch(error => console.log(error));

    const arrays = (data) => {

        let body = '';

        let size = Object.keys(data).length;

        console.log("El tamaño es: " + size);

        let arreglosVariables = Object.values(data);

        console.log(arreglosVariables);

        for (let i = 0; i < size -2; i++) {
            body += `
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion1-producto1">${arreglosVariables[3][i]}</span></h3>
                        <h3 class="tituloPrecio"><span id="seccion1-precio1">${arreglosVariables[1][i]}</span></h3>
                    </div>

                <img src="${arreglosVariables[4][i]}" alt="" id="seccion1-imagen1">

                <h3 class="nombreProducto"><span id="seccion1-nombre1">${arreglosVariables[0][i]}</span></h3>
                <a href="producto_individual.php?item=${arreglosVariables[5][i]}" class="btn">Comprar</a>
                </div>
            `;
        }
        document.querySelector('.containerCards').innerHTML = body;
    }
} 