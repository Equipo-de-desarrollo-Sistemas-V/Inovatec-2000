function confirmDesabled(e)
{
    if (confirm("¿Estas seguro de eliminar el proveedor?\nPuede que el proveedor se encuentre relacionado con la sección de productos, o alguna otra sección, de ser así, se procederá a cambiar el status de dicho proveedor.")) {
        return true
    }

    else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".table__item_link");

for (var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmDesabled);
}