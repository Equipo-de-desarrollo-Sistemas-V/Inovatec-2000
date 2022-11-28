<?php
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$querry_rutas = "SELECT ruta FROM imgpromocion";
$resultados_rutas = sqlsrv_query($con, $querry_rutas);

$predefinidos = ["imgProm/imagen-1.jpg", "imgProm/imagen-2.jpg", "imgProm/imagen-3.jpg", "imgProm/imagen-4.jpg", "imgProm/imagen-5.jpg"];

$arre = ["1", "2", "3", "4"];
$salida = '<article class="slider-frame">
      <ul>';

if($resultados_rutas === false){
    $arre = $predefinidos;
}

else{
    
    $conta = 0;

    while($row = sqlsrv_fetch_array($resultados_rutas)){
        $arre[$conta] = $row['ruta'];
        $conta++;
    }

    if($conta < 4){
        $aux = elegir($predefinidos, abs(3 - $conta)) ;

        for($i=$conta; $i <= 3; $i++){
            $arre[$i] = $aux[$i-$conta];
        }
    }

    $arre = elegir($arre, 3);
    
}

for($i=0; $i <= 3; $i++){
    $salida .= '<li><img src="'.$arre[$i].'" alt=""></li>';
    //echo $arre[$i]. '<br>';
    //echo '123456';
}

$salida .= '</ul>
    </article>';

echo $salida;



//recibe un arreglo y el numero de elementos que se deben escojer
function elegir($arre, $n){
    $elejidos = [];
    $i = 0;
    while($i <= $n){
        $r = rand(0, count($arre));
        if($arre[$r] != ''){
            $elejidos[$i] = $arre[$r];
            $i++;   
        }
        $arre[$r] = '';
    }

    return $elejidos;

}
?>

