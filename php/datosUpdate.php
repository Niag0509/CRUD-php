<?php 

    include "conexion.php";
    $conexion=conexion();

    $id=$conexion->real_escape_string(htmlentities($_POST['id']));
    //preparar sentencia 

    $sql="SELECT * from t_persona where id=?"; 
    //correr query
    $query=$conexion->prepare($sql);
    //ejecutar 
    //i por ser tipo entero (integer)
    $query->bind_param('i',$id);
    //ejecutar la query 
    $query->execute();
    //en datos se regresara un arreglo asociativo con los datos
    $datos=$query->get_result()->fetch_assoc();
    //convertir arreglo a json
    echo json_encode($datos); 



?>