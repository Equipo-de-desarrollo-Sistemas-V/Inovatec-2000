function confirmacion(e)
{
    if (confirm("¿Estas seguro de eliminar la promoción")) {
        return true
    }

    else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".table__item_link");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
}