function consultar(){
    /* Declara un fetc a datosCategorias.php y en el body manda
    como categoria computadoas y como subcategoria laptops */
    fetch('../datosCategorias.php', {
        method: 'POST',
        body: JSON.stringify({
            categoria: 'computadoras',
            subcategoria: 'laptops'
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    }
    )
    .catch(error => console.log(error));

}

consultar();