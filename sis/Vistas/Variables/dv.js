
registrar.addEventListener("click", ()=>{
    const data = new FormData(frm);
    //leer//
    
    fetch("./Controlador_dv/registrar.php",{
        method: "POST",
        body: data
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
    var $action ='eliminarcategoria';
    var $id_modalidad= id;
    const data =new FormData();
    data.append('id',$id_modalidad);
    data.append('eliminarcategoria',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_dv/eliminar.php",
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

function actualizaraportes(id)
{
    const data = new FormData();
    var action='actualizaraportes';
    var idaportes=$('#idaportes'+id).val();
    var id_past=$('#id_past'+id).val();
    var codigo= $('#codigo'+id).val();
    var cc= $('#cc'+id).val();
    var val= $('#val'+id).val();
    var glosa= $('#desc'+id).val();
    var detalle= $('#det'+id).val();

    data.append('idaportes',idaportes);
    data.append('id_past',id_past);
    data.append('codigo',codigo);
    data.append('cc',cc);
    data.append('desc',glosa);
    data.append('det',detalle);
    data.append('val',val);

    fetch("./Controlador_dv/actualizar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response);
            if(response ="ok")
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