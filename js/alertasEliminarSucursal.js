function confirmDesabled(e)
{
    if (confirm('¿Seguro que eliminar la sucursal?')) {
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

