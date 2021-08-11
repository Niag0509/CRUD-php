    <?php
    include "conexion.php";
    $conexion = conexion();

    $sql="SELECT * FROM t_persona";
    //$sql="SELECT * FROM t_persona WHERE nombre='Nico' OR Materno='Ibarra'";
    //conexion llama a query
    $result=$conexion->query($sql);
    //tabla guardara toda la cadena
    $tabla="";
    //while recorrera todo lo que trae la tabla
    while ($datos=$result->fetch_assoc()){
        //construccion del cuerpo de la tabla
        $tabla=$tabla.'<tr>
                            <td>'.$datos['id'].'</td>
                            <td>'.$datos['nombre'].'</td>
                            <td>'.$datos['paterno'].'</td>
                            <td>'.$datos['materno'].'</td>
                            <td>'.$datos['telefono'].'</td>
                            <td>
                                <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['id'].')">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </td>
                            <td>
                                <span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['id'].')">
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                            </td>
                        </tr>';
    }
    //saliendo del while se cierra la conexion
    $conexion->close();
    //la parte de arriba de la tabla
    echo '<table class="table tabla-stripped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Telefono</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>'.$tabla.'

            </tody>';
?>
