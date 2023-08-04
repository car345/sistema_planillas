    
    registrarDesc.addEventListener("click", ()=>{
        fetch("./armarplanilla/registrarDesc.php",{
            method: "POST",
            body: new FormData(frm)
        }).then(response =>response.text()).then(response=>
            {
                console.log(response)
                if(response =="ok" )
                {
                    swal({
                        title: "Se registro correctamente  ",
                        text: response,
                        icon: "success",
                        timer :5000 });
                }else{
                    swal({
                      title: "No se pudo registrar ",
                      text: response,
                      icon: "warning",
                      timer :5000 });
                  }
              frm.reset();
                  
               setTimeout(function() {
                   location.reload();
                   }, 100000);   
            })
    })
    
    $('#dni_cliente2').keyup(function(e){
        e.preventDefault();
        var cl=$(this).val();
        var action='searchclientes';
        var mes =$('#id_meses').val();
        $.ajax({
            url: 'ajax.php',
            type :"POST",
            async:true,
            data:{action:action,cliente:cl,mes:mes},
            success: function(res)
            {
                console.log(res)
                if(res==0){
                    $('#REGPERSO').val('');
                    $('#NOMBRE2').val('');
                    $('#APELLIDOS2').val('');
                }else{
                    var data =$.parseJSON(res);
                    $('#REGPERSO').val(data.id_datperso);
                    $('#NOMBRE2').val(data.NOMBRE);
                    $('#APELLIDOS2').val(data.APELLIDOS);    
                }
            }
        }) 
    })
    function eliminardesc(id)
    {
        var action='eliminardescuento';
        
        $.ajax({
            url: 'ajax.php',
            type :"POST",
            async:true,
            data:{action:action,id:id},
            success: function(res)
            {
                console.log(res)
                if(res == 0 )
                {
                    swal({
                        title: "No se pudo registrar ",
                        text: "You clicked the button!",
                        icon: "warning",
                        timer :5000 });
                }else{
                  
                         swal({
                        title: "Se elimino correctamente  ",
                        text: "You clicked the button!",
                        icon: "success",
                        timer :5000 });
                        setTimeout(function() {
                            location.reload();
                            }, 1000);   
                  }
            }
        }) 

    }