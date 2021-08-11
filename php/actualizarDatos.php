<?php 

    //se agrega la conexion
    include "conexion.php";
    //funcion de escapar caracteres
    $conexion=conexion();
    //print_r($_POST);
    //array de datos
    //en post agrego un nuevo nivel de seguridad (htmlentities)
    $datos=array(
        $conexion->real_escape_string(htmlentities($_POST['nombreu'])),
        $conexion->real_escape_string(htmlentities($_POST['paternou'])),
        $conexion->real_escape_string(htmlentities($_POST['maternou'])),
        $conexion->real_escape_string(htmlentities($_POST['telefonou'])),
        $conexion->real_escape_string(htmlentities($_POST['idu']))
    );

    //sentencia sql 
    $sql="UPDATE t_persona set nombre=?, paterno=?, materno=?, telefono=?
          where id=?";
          
    //preparar la sentencia
    $query=$conexion->prepare($sql);
    //agregar parte de la incognita
    //especificar que tipo de dato es 
    //los 3 primero son string, pero telefono es entero
    //solo se traen los indices del arreglo
    $query->bind_param('ssssi',$datos[0],
                               $datos[1],
                               $datos[2],
                               $datos[3],
                               $datos[4]);
    //ejecutar
    echo $query->execute();
    //cerrar la conexion
    $query->close();    
?>