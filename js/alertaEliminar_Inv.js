function confirmacion(e){
    if (confirm("¿Estas seguro que deseas eliminar este registro?\nSi la cantidad es diferente a cero, el registro no puede ser eliminado.")){
        return true;
    }
    else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table__item_link");
for (var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click',confirmacion);
}