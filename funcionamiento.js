window.onload=function(){
    var prod1= document.getElementById("contenidoAgregaProd");
    var prod2= document.getElementById("contenidoListaProd");

    prod1.style.display = "none";
    prod2.style.display = "none";

    document.getElementById('menuProducto1').className = 'desactivate';
    document.getElementById('menuProducto2').className = 'desactivate';

}

function show(param_div_id){
    var prod1= document.getElementById("contenidoAgregaProd");
    var prod2= document.getElementById("contenidoListaProd");
    if(param_div_id === "contenidoAgregaProd"){
        prod1.style.display='flex';
        prod2.style.display='none';
        document.getElementById('menuProducto1').className='activate';
        document.getElementById('menuProducto2').className='desactivate';

    }

    else{
        prod1.style.display='none';
        prod2.style.display='flex';
        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='activate';

    }
}