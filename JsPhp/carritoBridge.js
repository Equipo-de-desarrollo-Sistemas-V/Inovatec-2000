window.onload = function () {
  let url = "JsPhp/logCarritoObtenerProductos.php";

  let usuario = "TchRui";

  let form = new FormData();
  form.append("usuario", usuario);

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

    let size2 = Object.keys(arreglosVariables[0]).length;

    for (let i = 0; i < size2; i++) {
      body += `
        <div class="tarjetaCarrito" id="${arreglosVariables[4][i]}">
        <img src="${arreglosVariables[0][i]}" alt="" srcset="">
          
          <div class="containerDatos">
            <div class="datos">
              <h3 class="nombreProducto">${arreglosVariables[1][i]}</h3>

              <div class="organizador">
                <h4 class="precioIndividual">Precio </h4>
                <span class="valorPrecio">${arreglosVariables[2][i]}</span>
              </div>

              <div class="organizador">
                <h4 class="cantidad">Cantidad</h4>
                <input type="number" name="cajaCantidad" id="cajaCantidad" min="1" max="99" value="${arreglosVariables[3][i]}">
              </div>
              
            </div>

            <div class="botones">
              <button type="button" class="eliminar" onclick="eliminar(${arreglosVariables[4][i]});">
                <ion-icon name="trash-outline" class="icon"></ion-icon>
                Eliminar articulo
              </button>

              <a href="producto_individual.php?item=${arreglosVariables[4][i]}" type="button" class="comprar");">Volver al producto</a>
            </div>
          </div>
        </div>`;
    }
    document.querySelector('.listaCarrito').innerHTML = body;
  }
} 

