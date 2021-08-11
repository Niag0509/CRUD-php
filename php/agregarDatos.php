<?php

    //se agrega la conexion
    include "conexion.php";
    //funcion de escapar caracteres
    $conexion=conexion();
    //print_r($_POST);
    //array de datos
    //en post agrego un nuevo nivel de seguridad (htmlentities)
    $datos=array(
    $conexion->real_escape_string(htmlentities($_POST['nombre'])),
    $conexion->real_escape_string(htmlentities($_POST['paterno'])),
    $conexion->real_escape_string(htmlentities($_POST['materno'])),
    $conexion->real_escape_string(htmlentities($_POST['telefono']))
    );
    //en values se encapsula el tipo de dato
    $sql="INSERT into t_persona (nombre,paterno,materno,telefono)
    VALUES (?,?,?,?)";
    //para inicializar la query de manera segura
    $query=$conexion->prepare($sql);
    //como se manda la informacion
    //string s, int i, double d + sss
    $query->bind_param('ssss',$datos[0],$datos[1],$datos[2],$datos[3]);
    //solo falta ejecutarlo

    echo $query->execute();

    //se cierra la conexion
    $query->close();    

?>