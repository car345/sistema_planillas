registrar.addEventListener("click", ()=>{
    const data = new FormData(frm);
    //leer//
    
    if(document.getElementById("leer").checked)
    {
    data.append("leer", 1);  
    }else if(!(document.getElementById("leer").checked) )
    {
    data.append("leer", 0);  
    }
    //ver//
    if(document.getElementById("ver").checked)
    {
    data.append("ver", 1);  
    }else if(!(document.getElementById("ver").checked) )
    {
    data.append("ver", 0);  
    }
    //Imprimir// 
    if(document.getElementById("imprimir").checked)
    {
    data.append("imprimir", 1);  
    }else if(!(document.getElementById("imprimir").checked) )
    {
    data.append("imprimir", 0);  
    } 
    //Encargado//          
    if(document.getElementById("encargado").checked)
    {
    data.append("encargado", 1);  
    }else if(!(document.getElementById("encargado").checked) )
    {
    data.append("encargado", 0);  
    } 
    //Auxiliar// 
    if(document.getElementById("auxiliar").checked)
    {
    data.append("auxiliar", 1);  
    }else if(!(document.getElementById("auxiliar").checked) )
    {
    data.append("auxiliar", 0);  
    } 
    //Anular// 
    if(document.getElementById("anular").checked)
    {
    data.append("anular", 1);  
    }else if(!(document.getElementById("anular").checked) )
    {
    data.append("anular", 0);  
    }  
    //Afecto// 
    if(document.getElementById("afecto").checked)
    {
    data.append("afecto", 1);  
    }else if(!(document.getElementById("afecto").checked) )
    {
    data.append("afecto", 0);  
    }
    //Valor Absoluto// 
    if(document.getElementById("val").checked)
    {
    data.append("val", 1);  
    }else if(!(document.getElementById("val").checked) )
    {
    data.append("val", 0);  
    }
    //Inicializar// 
    if(document.getElementById("init").checked)
    {
        data.append("init", 1);  
    }else if(!(document.getElementById("init").checked) )
    {
        data.append("init", 0);  
    }
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
              
            // //   setTimeout(function() {
            // //     location.reload();
            // //   }, 1000);   
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
    var categoria= $('#categoria'+id).val();
    var codigo= $('#codigo'+id).val();
    var cc= $('#cc'+id).val();
    var tcr= $('#tcr'+id).val();
    var glosa= $('#glosa'+id).val();
    var formula= $('#formula'+id).val();
    var imprimir = $('#imprimir'+id).is(':checked') ? "1" : "0" ;
    var leer= $('#leer'+id).is(':checked') ? "1" : "0" ;
    var ver= $('#ver'+id).is(':checked') ? "1" : "0" ;
    var encargado= $('#encargado'+id).is(':checked') ? "1" : "0" ;
    var auxiliar= $('#auxiliar'+id).is(':checked') ? "1" : "0" ;
    var anular= $('#anular'+id).is(':checked') ? "1" : "0" ;
    var afecto= $('#afecto'+id).is(':checked') ? "1" : "0" ;
    var valorabsoluto= $('#valorabsoluto'+id).is(':checked') ? "1" : "0" ;
    var inicializa= $('#inicializa'+id).is(':checked') ? "1" : "0" ;
    var detalle= $('#detalle'+id).val();
    var traba_emp= $('#traba_emp'+id).val();
    var fecha= $('#fecha'+id).val();
    var fecha2= $('#fecha2'+id).val();

    data.append('idaportes',idaportes);
    data.append('categoria',categoria);
    data.append('codigo',codigo);
    data.append('cc',cc);
    data.append('tcr',tcr);
    data.append('glosa',glosa);
    data.append('formula',formula);
    data.append('imprimir',imprimir);
    data.append('leer',leer);
    data.append('ver',ver);
    data.append('encargado',encargado);
    data.append('auxiliar',auxiliar);
    data.append('anular',anular);
    data.append('afecto',afecto);
    data.append('valorabsoluto',valorabsoluto);
    data.append('inicializa',inicializa);
    data.append('detalle',detalle);
    data.append('traba_emp',traba_emp)
    data.append('fecha',fecha);
    data.append('fecha2',fecha2);

    fetch("./Controlador/actualizar.php",{
        method: "POST",
        body: data
    }).then(response =>response.text()).then(response=>
        {
            console.log(response);
            if(response =='ok' )
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
            //   setTimeout(function() {
            //     location.reload();
            //   }, 1000);
            
        })
}