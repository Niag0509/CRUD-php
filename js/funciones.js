function mostrarDatos(){
    $.ajax({
        url:"php/mostrarDatos.php",
        success:function(r){
            //r debe regresar un html 
            $('#tablaDatos').html(r);

        }
    });
}

function agregarDatos(){
    if ($('#nombre').val()==""){
        swal("Debes agregar un nombre!!");
        return false;
    }

    if ($('#paterno').val()==""){
        swal("Debes agregar un apellido paterno!!");
        return false;
    }

    if ($('#materno').val()==""){
        swal("Debes agregar un apellido materno!!");
        return false;
    }

    if ($('#telefono').val()==""){
        swal("Debes agregar un numero de telefono!!");
        return false;
    }

    $.ajax({
        type:"POST",
        data:$('#frmAgregarDatos').serialize(),
        url:"php/agregarDatos.php",
        success:function(r){
            console.log(r);
            //r debe regresar un html 
            if(r==1){
                swal(":D","Agregado con exito.","success");
                mostrarDatos();
            }else{
                swal(":(","Fallo al agregar","error");
            }
        }
    });
}

function eliminarDatos(idNombre){
    swal({
        title: "¿Estas seguro/a?",
        text: "Una vez eliminado el registro, no podra ser recuperado!!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
}

function agregaDatosParaEdicion(id){
    $.ajax({
        type:"POST",
        data:"id=" + id,
        url:"php/datosUpdate.php",
        success:function(r){
        //convertir r que trae un json valid
            datos=jQuery.parseJSON(r);
            //para llenar el formulario 
            $('#idu').val(datos['id']);
            $('#nombreu').val(datos['nombre']);
            $('#paternou').val(datos['paterno']);
            $('#maternou').val(datos['materno']);
            $('#telefonou').val(datos['telefono']);
        }
    });
}

function actualizarDatos(){
    if ($('#nombreu').val()==""){
        swal("Debes agregar un nombre!!");
        return false;
    }

    if ($('#paternou').val()==""){
        swal("Debes agregar un apellido paterno!!");
        return false;
    }

    if ($('#maternou').val()==""){
        swal("Debes agregar un apellido materno!!");
        return false;
    }

    if ($('#telefonou').val()==""){
        swal("Debes agregar un numero de telefono!!");
        return false;
    }   

    $.ajax({
        type:"POST",
        data:$('#frmAgregarDatosu').serialize(),
        url:"php/actualizarDatos.php",
        success:function(r){
            //console.log(r);
            //r debe regresar un html 
            if(r==1){
                swal(":D","Actualizado con exito.","success");
                mostrarDatos();
            }else{
                swal(":(","Fallo al actualizar","error");
            }
        }
    });    
}

function eliminarDatos(idNombre){
    swal({
        title:"¿Estas segura de eliminar este registro?",
        text:"Una vez que eliines este registro, no podra ser recuperado!!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete)=>{
        if (willDelete){
            $.ajax({
                type:"POST",
                data:"id=" + idNombre,
                url:"php/eliminar.php",
                success:function(r){
                    if(r==1){
                        swal(":D","Eliminado con exito.","success");
                        mostrarDatos();
                    }else{
                        swal(":(","Fallo al eliminar","error");
                    }
                }
            });
        }
    });
}