function confirmDesabled(e)
{
    if (confirm("¿Estas seguro de eliminar la sucursal?\nPuede que se encuentre relacionada con alguna otra sección, de ser así, se cambiará el estatus de dicha sucursal.")) {
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

