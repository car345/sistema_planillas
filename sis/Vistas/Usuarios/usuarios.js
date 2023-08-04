  function agregarusuario()
  {
        var action='agregar_usuario';
        var id_usuarios= $('#id_usuarios').val();
        var nombre_usuario=$('#nombre_usuario').val();
        var clave_usuario=$('#clave_usuario').val();
        var admin_usuario=$('#admin_usuario').val();

        
        $.ajax({
        url:'./Controlador_usuarios/crud_usuarios.php',
        type:'POST',
        data: 'id_usuarios='+id_usuarios+'&nombre_usuario='+nombre_usuario + '&clave_usuario='+clave_usuario+ '&admin_usuario='+admin_usuario+'&boton='+action
    }).done(function(resp){
      
        console.log(resp);
        if(resp=="ok")
        {
          swal({
            title: "Se registro c correctamente  ",
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
    });
    return false;  
  }



  function eliminarusuario(id)
  {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((result)=>
  {


    if (result) {
   $.ajax({
       url:'./Controlador_usuarios/crud_usuarios.php',
       type:'POST',
       data: 'id_usuarios='+id+'&boton=eliminarusuario'
   }).done(function(resp){
  
    if(resp=="ok")
    {
      swal({
        title: "Usuario eliminado correctamente ",
        text: "You clicked the button!",
        icon: "success",
        timer :5000 });
    }else{
      swal({
        title: "No se pudo ELIMINAR ",
        text: "You clicked the button!",
        icon: "warning",
        timer :5000 });
    }
        setTimeout(function() {
                   location.reload();
                 }, 1000);
   });
 }else {
  swal("Cancelo la eliminacion");
  setTimeout(function() {
      location.reload();
    }, 1000); 
}


  });
  };


  function actualizarusaurio(id)
  {
    var action='actualizarusuario';
    var id_primary= $('#id_primary'+id).val();
    var id_usuario= $('#id_usuarios'+id).val();
    var nombre_usuario = $('#nombre_usuario'+id).val();
    var clave_usuario=$('#clave_usuario'+id).val();
    var admin_usuario=$('#admin_usuario'+id).val(); 
   $.ajax({
       url:'./Controlador_usuarios/crud_usuarios.php',
       type:'POST',
       data: 'id_usuario1='+id_usuario+'&id_primary='+id_primary+'&nombre_usuario1='+nombre_usuario+'&clave_usuario1='+clave_usuario+'&admin_usuario1='+admin_usuario+'&boton=actualizarusuario'
   }).done(function(resp){
     console.log(resp);
     if(resp=="ok")
     {
       swal({
         title: "DATOS ACTUALIZADOS CORRECTAMENTE  ",
         text: "GRACIAS!",
         icon: "success",
         timer :5000 });
     }else{
       swal({
         title: "No se pudo actualizar",
         text: "You clicked the button!",
         icon: "warning",
         timer :5000 });
     }
     setTimeout(function() {
      location.reload();
    }, 1000);            
   });
  };