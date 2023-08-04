registrar.addEventListener("click", ()=>{
    fetch("./Controlador_siafdescuento/registrar.php",{
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
            //   frm.reset();
            //   setTimeout(function() {
            //     location.reload();
            //   }, 1000);   
        })
})
function eliminar(id)
{
    var $action ='eliminarsiaf';
    var $id_planilla= id;
    const data =new FormData();
    data.append('id',$id_planilla);
    data.append('eliminarsiaf',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_siafdescuento/eliminar.php",
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
    var id_planilla= $('#id_planilla1'+id).val();
    var codigo_planilla=$('#nombre_planilla1'+id).val();
    var descripcion_planilla=$('#descripcion_planilla1'+id).val(); 
    var excluir=$('#afps'+id).val();
    data.append('id_primary1',id_primary);
    data.append('id_planilla1',id_planilla);
    data.append('nombre_planilla1',codigo_planilla);
    data.append('descripcion_planilla1',descripcion_planilla);
    data.append('afps',excluir);
    fetch("./Controlador_siafdescuento/actualizar.php",{
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