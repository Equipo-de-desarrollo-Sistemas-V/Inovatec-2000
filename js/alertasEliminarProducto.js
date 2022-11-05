function confirmacion(e){
    if (confirm("¿Estas seguro de eliminar el producto?\nPuede que el producto se encuentre relacionado con la sección de inventario, o alguna otra sección, de ser así, se procederá a cambiar el estado de dicho producto.")){
        return true;
    }else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table__item_link");

for (var i=0; i<linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}