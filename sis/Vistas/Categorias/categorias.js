registrar.addEventListener("click", ()=>{
    fetch("./Controlador_categorias/registrar.php",{
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
    var $action ='eliminarcategoria';
    var $id_categoria= id;
    const data =new FormData();
    data.append('id',$id_categoria);
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
            fetch("./Controlador_categorias/eliminar.php",
            {   
                method:"POST",
                body: data
            }).then(response => response.text().then(response =>
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

function actualizarcategoria(id)
{
    const data = new FormData();
    var action='actualizarcategoria';
    var id_primary= $('#id_primary1'+id).val();
    var id_categoria= $('#id_categoria1'+id).val();
    var codigo_categoria= $('#codigo_categoria1'+id).val();
    var descripcion_categoria=$('#descripcion_categoria1'+id).val();
    var basfedu_categoria1=$('#basfedu_categoria1'+id).val(); 
    data.append('id_primary1',id_primary);
    data.append('id_categoria1',id_categoria);
    data.append('codigo_categoria1',codigo_categoria)
    data.append('descripcion_categoria1',descripcion_categoria);
    data.append('basfedu_categoria1',basfedu_categoria1);
    fetch("./Controlador_categorias/actualizar.php",{
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