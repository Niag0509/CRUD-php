<?php

    function conexion(){
        $conexion=new mysqli("127.0.0.1","root","","basesegura");
        if ($conexion->connect_errno){
            echo "Fallo al conectar : " .$conexion-connect_error;
        }
    //agregamos el encoding para evitar errores futuros
    $conexion->set_charset("utf8");
    return $conexion; 
    }
    
?>
