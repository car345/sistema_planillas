registrar.addEventListener("click", ()=>{
    fetch("./Controlador_Pensionario/registrar.php",{
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
    var $action ='eliminarafps';
    var $id_afps= id;
    const data =new FormData();
    data.append('id',$id_afps);
    data.append('eliminarafps',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_Pensionario/eliminar.php",
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
function actualizarafps(id)
{
    const data = new FormData();
    var action='actualizarafps';
    var id_primary= $('#id_primary1'+id).val();
    var id_afps= $('#id_afps1'+id).val();
    var codigo_afps= $('#codigo_afps1'+id).val();
    var descripcion_afps=$('#descripcion_afps1'+id).val();
    var cod2_afps1=$('#cod2_afps1'+id).val(); 
    data.append('id_primary1',id_primary);
    data.append('id_afps1',id_afps);
    data.append('codigo_afps1',codigo_afps)
    data.append('descripcion_afps1',descripcion_afps);
    data.append('cod2_afps1',cod2_afps1);
    fetch("./Controlador_Pensionario/actualizar.php",{
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