registrar.addEventListener("click", ()=>{
    fetch("./Controlador_programas/registrar.php",{
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
    var $action ='eliminarprograma';
    var $id_planilla= id;
    const data =new FormData();
    data.append('id',$id_planilla);
    data.append('eliminarprograma',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_programas/eliminar.php",
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
function actualizarprograma(id)
{
    const data = new FormData();
    var action='actualizararea';
    var id_primary= $('#id_primary1'+id).val();
    var id_planilla= $('#id_programa'+id).val();
    var codigo_planilla=$('#CODIGO'+id).val();
    var descripcion_planilla=$('#DESC'+id).val(); 
    var diviso=$('#DIVISO'+id).val();
    data.append('id_primary1',id_primary);
    data.append('id_programa',id_planilla);
    data.append('CODIGO',codigo_planilla);
    data.append('DESC',descripcion_planilla);
    data.append('DIVISO',diviso);
    fetch("./Controlador_programas/actualizar.php",{
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
              setTimeout(function() {
                location.reload();
              }, 1000); 
            
        })
}