window.onload = function () {
    let url = "JsPhp/logCarrito.php";

    fetch(url, {
        method: "GET"
    })
        .then(response => response.json())
        .then(data => arrays(data))
        .catch(error => console.log(error));

    const arrays = (data) => {
        
    }
} 