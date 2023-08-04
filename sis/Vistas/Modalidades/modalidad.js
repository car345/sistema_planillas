registrar.addEventListener("click", ()=>{
    fetch("./Controlador_modalidad/registrar.php",{
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
    var $action ='eliminarmodalidad';
    var $id_modalidad= id;
    const data =new FormData();
    data.append('id',$id_modalidad);
    data.append('eliminarmodalidad',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {  
        if (result) {
            fetch("./Controlador_modalidad/eliminar.php",
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

function actualizarmodalidad(id)
{
    const data = new FormData();
    var action='actualizarmodalidad';
    var id_primary= $('#id_primary1'+id).val();
    var id_modalidad= $('#id_modalidad1'+id).val();
    var codigo_modalidad=$('#codigo_modalidad1'+id).val();
    var descripcion_modalidad=$('#descripcion_modalidad1'+id).val(); 
    var fedu_modalidad=$('#fedu_modalidad1'+id).val();
    data.append('id_primary1',id_primary);
    data.append('id_modalidad1',id_modalidad);
    data.append('codigo_modalidad1',codigo_modalidad);
    data.append('descripcion_modalidad1',descripcion_modalidad);
    data.append('fedu_modalidad1',fedu_modalidad);
    fetch("./Controlador_modalidad/actualizar.php",{
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