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
              
              setTimeout(function() {
                location.reload();
              }, 1000);   
        })
})
registrarse.addEventListener("click", ()=>{
    const data = new FormData(frms);
    fetch("./Controlador/registrarse.php",{
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
            //   frm.reset();
              
              setTimeout(function() {
                location.reload();
              }, 1000);   
        })
});

deletes.addEventListener("click", ()=>{
    const data = new FormData(frms1);
    fetch("./Controlador/eliminarse.php",{
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
            //   frm.reset();
              
              setTimeout(function() {
                location.reload();
              }, 1000);   
        })
});

deletear.addEventListener("click", ()=>{
    const data = new FormData(frms2);
    fetch("./Controlador/eliminar.php",{
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
            //   frm.reset();
              
              setTimeout(function() {
                location.reload();
              }, 1000);   
        })
});





function eliminar(id)
{
    var $action ='eliminarAporte';
    var $id= id;
    const data =new FormData();
    data.append('id',$id);
    data.append('eliminarAporte',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
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

    fetch("./Controlador/actualizar.php",{
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

function registrarvariable(id)
{
  var $id_registro=id;

  var $code = $('#code'+id).val();
  var $tipo = $('#valueT'+id).val();
  const data =new FormData();
  data.append('registro',$id_registro);
  data.append('cod',$code);
  data.append('tipo',$tipo);
fetch('./formula/registrar.php',
{
    method: "POST",
    body: data
}).then(response => response.text().then(response =>
    {  
        console.log(response);
        if(response =="ok" )
        {
            swal({
                title: "Se eliminó registro  ",
                text: "Eliminación exitosa!",
                icon: "success",
                timer :3000 });
                setTimeout(function() {
                    location.reload();
                  }, 1500);
        }else{
            swal({
              title: "No se pudo Eliminar ",
              text: "Error interno!",
              icon: "warning",
            //   timer :5000
             });
          }
    } 
    ))

}