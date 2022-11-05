function confirmDesabled(e)
{
    if (confirm("¿Estas seguro de eliminar la sucursal?\nPuede que el producto se encuentre relacionado con la sección de inventario, o alguna otra sección, de ser así, se procederá a cambiar el estatus de dicha sucursal.")) {
        return true
        //alertas();
    }

    else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".table__item_link");

for (var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmDesabled);
}

