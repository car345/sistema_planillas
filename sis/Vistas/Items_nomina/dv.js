    registrar.addEventListener("click", ()=>{
    const data = new FormData(frm);
    
    fetch("./Controlador/registrar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response)
            if(response =="ok" )
            {
                swal({
                    title: "Se registro correctamente  ",
                    text: "-!",
                    icon: "success",
                    timer :5000 });
            }else{
                swal({
                  title: "No se pudo registrar ",
                  text: "Revisa los datos ingresados!",
                  icon: "warning",
                  timer :5000 });
              }
            //   frm.reset();
              
        //     setTimeout(function() {
        //          location.reload();
        //     }, 1000);   
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
        title: "¿Estás seguro de eliminar este campo?",
        text: "Una vez eliminado, no se podrá recuperar facilmente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
            fetch("./Controlador/eliminar.php",
            {   
                method:"POST",
                body: data
            }).then(response => response.text().then(response =>
                {  
                    console.log(response);
                    if(response =="ok" )
                    {
                        swal({
                            title: "Se eliminó correctamente  ",
                            text: "-!",
                            icon: "success",
                            timer :5000 });
                    }else{
                        swal({
                          title: "No se pudo eliminar campo ",
                          text: "Error !",
                          icon: "warning",
                          timer :5000 });
                      }
                      setTimeout(function() {
                        location.reload();
                      }, 1000);   
  
                } 

                ))
                
        
        
        
    }
    )
}
function actualizaraportes(id)
{
    const data = new FormData();
    var action='actualizaraportes';
    var id=$('#id'+id).val();
    var desc= $('#desc'+id).val();
    var formula = $('#formula'+id).val();
    var codigo= $('#codigo'+id).val();
    var tcr= $('#tcr'+id).val();


    data.append('id',id);
    data.append('desc',desc);
    data.append('formula',formula);
    data.append('codigo',codigo);
    data.append('tcr',tcr);


    fetch("./Controlador/actualizar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response);
            if(response ='ok')
            {
                swal({
                    title: "Se registro correctamente  ",
                    text: "You clicked the button!",
                    icon: "success",
                    timer :3000 });
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