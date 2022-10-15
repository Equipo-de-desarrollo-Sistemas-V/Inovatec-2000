function confirmacion(e){
    if (confirm("¿Estas reguro que deseas eliminar este proveedor?")){
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