window.onload=function(){
    /*var prod1= document.getElementById("contenidoAgregaProd");
    var prod2= document.getElementById("contenidoListaProd");
    var suc1= document.getElementById("contenidoAgregaSuc");
    var suc2= document.getElementById("contenidoListaSuc");
    var trab1= document.getElementById("contenidoAgregaTrab");
    var trab2= document.getElementById("contenidoListaTrab");
    var prov1= document.getElementById("contenidoAgregaProv");
    var prov2= document.getElementById("contenidoListaProv");
    var inv1= document.getElementById("contenidoInventario");
    var inv2= document.getElementById("contenidoListaInventario");
    var vent1= document.getElementById("contenidoAgregaVenta");
    var vent2= document.getElementById("contenidoListaVenta");*/


    /*prod1.style.display = "none";
    prod2.style.display = "none";
    suc1.style.display = "none";
    suc2.style.display = "none";
    trab1.style.display = "none";
    trab2.style.display = "none";
    prov1.style.display = "none";
    prov2.style.display = "none";
    inv1.style.display = "none";
    inv2.style.display = "none" 
    vent1.style.display = "none";
    vent2.style.display = "none";*/

    document.getElementById('menuProducto1').className = 'desactivate';
    document.getElementById('menuProducto2').className = 'desactivate';
    document.getElementById('menuSucursal1').className = 'desactivate';
    document.getElementById('menuSucursal2').className = 'desactivate';
    document.getElementById('menuTrabajador1').className = 'desactivate';
    document.getElementById('menuTrabajador2').className = 'desactivate';
    document.getElementById('menuProveedor1').className = 'desactivate';
    document.getElementById('menuProveedor2').className = 'desactivate';
    document.getElementById('menuInventario1').className = 'desactivate';
    document.getElementById('menuInventario2').className = 'desactivate';
    document.getElementById('menuVentas1').className = 'desactivate';
    document.getElementById('menuVentas2').className = 'desactivate';
 
}

function show(param_div_id){
    var prod1= document.getElementById("contenidoAgregaProd");
    var prod2= document.getElementById("contenidoListaProd");
    var suc1= document.getElementById("contenidoAgregaSuc");
    var suc2= document.getElementById("contenidoListaSuc");
    var trab1= document.getElementById("contenidoAgregaTrab");
    var trab2= document.getElementById("contenidoListaTrab");
    var prov1= document.getElementById("contenidoAgregaProv");
    var prov2= document.getElementById("contenidoListaProv");
    var inv1= document.getElementById("contenidoInventario");
    var inv2= document.getElementById("contenidoListaInventario");
    var vent1= document.getElementById("contenidoAgregaVenta");
    var vent2= document.getElementById("contenidoListaVenta");

    if(param_div_id === "contenidoAgregaProd"){
        prod1.style.display='flex';
        prod2.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='activate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';
    }

    else if(param_div_id == ("contenidoListaProd")){
        prod1.style.display='none';
        prod2.style.display='flex';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='activate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoAgregaSuc")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='flex';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'activate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoListaSuc")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='flex';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'activate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoAgregaTrab")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='flex';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'activate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';
    }

    else if(param_div_id == ("contenidoListaTrab")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='flex';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'activate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';
    }

    else if(param_div_id == ("contenidoAgregaProv")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='flex';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'activate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoListaProv")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='flex';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'activate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoInventario")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "flex";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'activate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoListaInventario")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "flex";
        vent1.style.display='none';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'activate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoAgregaVenta")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='flex';
        vent2.style.display='none';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'activate';
        document.getElementById('menuVentas2').className = 'desactivate';

    }

    else if(param_div_id == ("contenidoListaVenta")){
        prod1.style.display='none';
        prod2.style.display='none';
        suc1.style.display='none';
        suc2.style.display='none';
        trab1.style.display='none';
        trab2.style.display='none';
        prov1.style.display='none';
        prov2.style.display='none';
        inv1.style.display = "none";
        inv2.style.display = "none";
        vent1.style.display='none';
        vent2.style.display='flex';

        document.getElementById('menuProducto1').className='desactivate';
        document.getElementById('menuProducto2').className='desactivate';
        document.getElementById('menuSucursal1').className = 'desactivate';
        document.getElementById('menuSucursal2').className = 'desactivate';
        document.getElementById('menuTrabajador1').className = 'desactivate';
        document.getElementById('menuTrabajador2').className = 'desactivate';
        document.getElementById('menuProveedor1').className = 'desactivate';
        document.getElementById('menuProveedor2').className = 'desactivate';
        document.getElementById('menuInventario1').className = 'desactivate';
        document.getElementById('menuInventario2').className = 'desactivate';
        document.getElementById('menuVentas1').className = 'desactivate';
        document.getElementById('menuVentas2').className = 'activate';

    }
}

$(document).ready(function(){

    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change",function(){
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
              	alert("No selecciono foto");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
    	$('#foto').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });

});
