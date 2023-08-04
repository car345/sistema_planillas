registrar.addEventListener("click", ()=>{
    fetch("./Controlador_partidas/registrar.php",{
        method: "POST",
        body: new FormData(frm)
    }).then(response =>response.text()).then(response=>
        {   
            console.log(response)
            if(response =="ok" )
            {
                swal({
                    title: "Se registro correctamente  ",
                    text: "You clicked the button!",
                    icon: "success",
                    timer :5000 });
            }else{
                swal({
                  title: "No se pudo registrar ",
                  text: "You clicked the button!",
                  icon: "warning",
                  timer :5000 });
              }
              frm.reset();
              setTimeout(function() {
                location.reload();
              }, 1000);   
        })
})
function eliminar(id)
{
    var $action ='eliminarpartida';
    var $id_partidas= id;
    const data =new FormData();
    data.append('id',$id_partidas);
    data.append('eliminarpartida',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_partidas/eliminar.php",
            {   
                method:"POST",
                body: data
            }).then(response => response.text().then(response =>
                {  
                    console.log(response);
                    if(response =="ok" )
                    {
                        swal({
                            title: "Se elimino correctamente  ",
                            text: "You clicked the button!",
                            icon: "success",
                            timer :5000 });
                    }else{
                        swal({
                          title: "No se pudo registrar ",
                          text: "You clicked the button!",
                          icon: "warning",
                          timer :5000 });
                      }
                      setTimeout(function() {
                        location.reload();
                      }, 1000);   
  
                } 

                ))
            } else {
                swal("Cancelo la eliminacion");
                setTimeout(function() {
                    location.reload();
                  }, 1000); 
              }


            
    }
    )
}

function actualizarplanilla(id)
{
    const data = new FormData();
    var action='actualizararea';
    var id_primary= $('#id_primary1'+id).val();
    var id_partidas= $('#ID_PARTIDAS'+id).val();
    var id_planilla= $('#CODIGO'+id).val();
    var formula=$('#FORMULA'+id).val();
    var auxiliar=$('#AUXILIAR'+id).val(); 
    var formulario=$('#id_formular'+id).val();
    var nombre=$('#NOMBRE'+id).val();
    data.append('id_primary1',id_primary);
    data.append('ID_PARTIDAS',id_partidas);
    data.append('CODIGO',id_planilla);
    data.append('FORMULA',formula);
    data.append('id_formular',formulario);
    data.append('AUXILIAR',auxiliar);
    data.append('NOMBRE',nombre);
    fetch("./Controlador_partidas/actualizar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response);
            if(response =="ok" )
            {
                swal({
                    title: "Se registro correctamente  ",
                    text: "You clicked the button!",
                    icon: "success",
                    timer :5000 });
            }else{
                swal({
                  title: "No se pudo registrar ",
                  text: "You clicked the button!",
                  icon: "warning",
                  timer :5000 });
              }
            //   setTimeout(function() {
            //     location.reload();
            //   }, 1000); 
            
        })
}