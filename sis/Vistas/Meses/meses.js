registrar.addEventListener("click", ()=>{

    const data =new FormData(frm);

    fetch("./Controlador_meses/registrar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response)
            if(response =="ok" )
            {
                swal({
                    title: "Se registro correctamente  ",
                    text: "Datos correctos!",
                    icon: "success",
                    timer :3000 });
                    frm.reset();
              
                    setTimeout(function() {
                        location.reload();
                        }, 1000); 
            }else if(response =="no") {
                swal({
                  title: "No se pudo registrar ",
                  text: "cod. duplicado!",
                  icon: "warning",
                  timer :5000 });
                  setTimeout(function() {
                    location.reload();
                    }, 1000)
              }
              else {
                swal({
                  title: "No se pudo registrar ",
                  text: "Rellene todo los campos y no debe ingreser cod. duplicado!",
                  icon: "warning",
                  timer :5000 });
                  setTimeout(function() {
                    location.reload();
                    }, 1000)
              }
  
        })
})

function eliminar(id)
{
    var $id_meses = id;
    const data = new FormData();
    data.append('id',$id_meses);
    swal({
        title: "¿Estás seguro de eliminar este registro?",
        text: "Una vez eliminado, No podrás recuperar los datos incluidos en dicho mes!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
     
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_meses/eliminar.php",
            {   
                method:"POST",
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
                          timer :5000 });
                      }
                } 
                ))
          } else {
            swal("¡Eliminación cancelada!");
            setTimeout(function() {
                location.reload();
              }, 1000); 
          }
    }
    )
}

const loadingElement = document.getElementById('loading');
// Mostrar el indicador de carga
loadingElement.style.display = 'none';
// Realizar la solicitud fetch

function validar(id, estado)
{

    var user = $('#user'+id).val();
    var pass = $('#pass'+id).val();
    const data =new FormData();
    data.append('id',id);
    data.append('user',user);
    data.append('pass',pass);
    data.append('estado',estado);

    if(estado == '1'){
        message = "DESBLOQUEADO";
        cmessage = "BLOQUEADO";
    }else{
        message = "BLOQUEADO";
        cmessage = "DESBLOQUEADO";
    }
   
    loadingElement.style.display = 'flex';
    fetch("./desbloquear/validacion.php", {   
        method:"POST",
        body: data
    }).then(response => response.text().then(response =>{  
        console.log(response);
        if(response =="ok" ){
            swal({
                title: "Se cambio estado",
                text: "El estado del mes es " + message,
                icon: "success",
                timer :3000 
            });
            setTimeout(function() {
                location.reload();
                }, 1000); 
        }else{
            swal({
                title: "No se pudo cambiar el estado ",
                text: "El estado continua siendo " + cmessage,
                icon: "warning"
            });
        }
   
    }));  
}


function actualizar(id)
{
    const data = new FormData();
    var action = 'actualizar';
    var mes = $('#mes'+id).val();
    var year = $('#year'+id).val();
    var t_p = $('#t_p'+id).val();
    var modali = $('#modali'+id).val();


    data.append('action',action);
    data.append('mes',mes);
    data.append('year',year)
    data.append('t_p',t_p);
    data.append('id',id);
    data.append('modali',modali);

    
    fetch("./Controlador_meses/actualizar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response);
            if(response =="ok" )
            {
                swal({
                    title: "Se actualizó correctamente",
                    text: " Valores correctos!",
                    icon: "success",
                    timer :5000 });
                    setTimeout(function() {
                        location.reload();
                     }, 1000);
            }else{
                swal({
                  title: "No se pudo actualizar ",
                  text: "Error de datos!",
                  icon: "warning",
                  timer :5000 });
              }   
        })
   
}