  function agregararea()
  {
        var action='agregararea';
        var id_area= $('#id_area').val();
        var codigo_area=$('#codigo_area').val();
        var descripcion_area=$('#descripcion_area').val();
        $.ajax({
        url:'./Controlador_areas/crud_area.php',
        type:'POST',
        data: 'id_area='+id_area+'&codigo_area='+codigo_area+'&descripcion_area='+descripcion_area+'&boton='+action
    }).done(function(resp){
      
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

    
  }
  function eliminararea(id)
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
        url:'./Controlador_areas/crud_area.php',
        type:'POST',
        data: 'id_area='+id+'&boton=eliminararea'
    }).done(function(resp){
    
     if(resp=="ok")
     {
       swal({
         title: "Se elimino  correctamente  ",
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
    } else {
      swal("Cancelo la eliminacion");
      setTimeout(function() {
          location.reload();
        }, 1000); 
    }
 })


    
   


   
  };
  function actualizararea(id)
  {
    var action='actualizararea';
    var id_primary= $('#id_primary'+id).val();
    var id_area= $('#id_area'+id).val();
    var codigo_area=$('#codigo_area'+id).val();
    var descripcion_area=$('#descripcion_area'+id).val(); 
   $.ajax({
       url:'./Controlador_areas/crud_area.php',
       type:'POST',
       data: 'id_area1='+id_area+'&id_primary='+id_primary+'&codigo_area1='+codigo_area+'&descripcion_area1='+descripcion_area+'&boton=actualizararea'
   }).done(function(resp){
     console.log(resp);
     if(resp=="ok")
     {
       swal({
         title: "Se actualizo  correctamente  ",
         text: "You clicked the button!",
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

