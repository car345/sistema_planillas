registrarImporte.addEventListener("click", ()=>{

    const data =new FormData(frm);

    fetch("./controlador/registrar.php",{
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
            }else{
                swal({
                  title: "No se pudo registrar ",
                  text: "Rellene campo solicitado y no seleccione cod. duplicado!",
                  icon: "warning",
                  timer :5000 });
              }
        })
})
function registrarvariable(id,user,mes)
{
  var $id_registro=id;
  var $id_mes=mes; 
  var $id_user=user; 
  var $code = $('#code'+id).val();
  var $tipo = $('#valueT'+id).val();
  const data =new FormData();
  data.append('registro',$id_registro);
  data.append('mes',$id_mes);
  data.append('user',$id_user);
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
              timer :5000 });
          }
    } 
    ))

}



function eliminar(id)
{
    var $id_Importe= id;
    const data = new FormData();
    data.append('id',$id_Importe);
    swal({
        title: "¿Estás seguro de eliminar este registro?",
        text: "Una vez eliminado, No podrás recuperar los datos incluidos en dicho mes!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
     
      }).then((result)=>
    {
        if (result) {
            fetch("./controlador/eliminar.php",
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
