function quitarEspacios(event) {
    // Obtener el texto del portapapeles
    var texto = event.clipboardData.getData("text/plain");

    // Quitar los espacios en blanco
    var textoSinEspacios = texto.replace(/\s/g, "");

    // Pegar el texto sin espacios en blanco en el campo de entrada
    var campoEntrada = document.getElementById("dni_cliente");
    campoEntrada.value = textoSinEspacios;
    // Prevenir la acción de pegar predeterminada
    event.preventDefault();
    }
    window.onload = function() {
        var campoEntrada = document.getElementById("dni_cliente");
        campoEntrada.addEventListener("paste", quitarEspacios);
    };
    
function quitarEspaciosmes(event) {
    // Obtener el texto del portapapeles
    var textomes = event.clipboardData.getData("text/plain");

    // Quitar los espacios en blanco
    var textoSinEspaciosmes = textomes.replace(/\s/g, "");

    // Pegar el texto sin espacios en blanco en el campo de entrada
    var campoEntradames = document.getElementById("dni_mes");
    campoEntradames.value = textoSinEspaciosmes;
    // Prevenir la acción de pegar predeterminada
    event.preventDefault();
    }
    window.onload = function() {
        var campoEntradames = document.getElementById("dni_mes");
        campoEntradames.addEventListener("paste", quitarEspaciosmes);
    };

$('#dni_cliente').keyup(function(e)
{
e.preventDefault();
var cl=$(this).val();
var action='searchcliente';
$.ajax({
    url: 'ajax.php',
    type :"POST",
    async:true,
    data:{action:action,cliente:cl},
    success: function(res)
    {
        console.log(res)
        if(res==0)
        {
            $('#NOMBRE').val('');
            $('#APELLIDOS').val('');
        }else
        {
            var data =$.parseJSON(res);
            $('#NOMBRE').val(data.NOMBRE);
            $('#APELLIDOS').val(data.APELLIDOS);
            
        }
 }
 
  }) 
   })
   
   function abrirPagina() {
    var campoEntrada = document.getElementById("dni_cliente");
    var valorCampo = campoEntrada.value.trim();
    if (valorCampo === '') {
      window.open("http://localhost/sis/Vistas/DatosPersonales/datperson.php", "_blank");
    }
  }
  
  function abrirPaginames() {
    var campoEntradames = document.getElementById("dni_mes");
    var valorCampo = campoEntradames.value.trim();
    if (valorCampo === '') {
      window.open("http://localhost/sis/Vistas/Meses/meses.php", "_blank");
    }
  }
  
  window.addEventListener("load", function() {
    var campoEntrada = document.getElementById("dni_cliente");
    campoEntrada.addEventListener("dblclick", abrirPagina);
  
    var campoEntradames = document.getElementById("dni_mes");
    campoEntradames.addEventListener("dblclick", abrirPaginames);
  });

   registrar.addEventListener("click", ()=>{
    fetch("./armarplanilla/registrar.php",{
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
                   
            }else if(response=="false"){
                swal({
                  title: "Escriba el dni del trabajador",
                  text: "You clicked the button!",
                  icon: "warning",
                  timer :5000 });
            }else if(response="existe"){
                swal({
                    title: "Ya existe ese trabajador en la planilla ",
                    text: "You clicked the button!",
                    icon: "warning",
                    timer :5000 });
            }else{
                swal({
                    title: "No se pudo registrar en la planilla ",
                    text: "You clicked the button!",
                    icon: "warning",
                    timer :5000 });
            }
          frm.reset();
              
           setTimeout(function() {
               location.reload();
               }, 2000);   
        })
})

$('#dni_mes').keyup(function(e)
{
e.preventDefault();
var cl=$(this).val();
var mes=$('#id_mes').val();
var action='dnimes';
$.ajax({
    url: 'ajax.php',
    type :"POST",
    async:true,
    data:{action:action,cliente:cl,mes:mes},
    success: function(res)
    {
        console.log(res)
    if(res==0)
    {
        $('#anio').val('');
        $('#mes').val('');
        $('#modalidad').val('');
    }
    else
    {
        var data =$.parseJSON(res);
        $('#anio').val(data.MES);
        $('#mes').val(data.anio);
        $('#modalidad').val(data.DESC);
    }
 }
  }) 
   })
   const loadingElement = document.getElementById('loading');
    // Mostrar el indicador de carga
    loadingElement.style.display = 'none';
    // Realizar la solicitud fetch

    recargar.addEventListener("click", ()=>{
    loadingElement.style.display = 'flex';
    const formulario = document.getElementById('frm2');
    const data =new FormData(formulario);

// Obtener los valores de los campos del formulario
    fetch("./armarplanilla/recargar.php",{
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
                    });
                    loadingElement.style.display = 'none';
            }else{
                swal({
                  title: "No se pudo recargar la planilla ",
                  text: "You clicked the button!",
                  icon: "warning",
                  });
              }
              frm.reset();
              
              setTimeout(function() {
                  location.reload();
                  }, 1000);   
        })
})
function eliminar(id, mes) 
{
    var $action ='eliminar';
    var $id= id;
    var $mes= mes;
    const data =new FormData();
    data.append('id',$id);
    data.append('mes',$mes);
    data.append('eliminar',$action);
    swal({
        title: "¿Estás segur@ de sacar del registro?",
        text: "Una vez retirado, Tendrás que volver agregarlo manualmente.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
     
      }).then((result)=>
    {
        if (result) {
            fetch("./armarplanilla/eliminar.php",
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
                           });
                      }
                      setTimeout(function() {
                        location.reload();
                      }, 2000); 
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

function eliminarImporte(id) 
{
    var $action ='eliminarImporte';
    var $id= id;
    const data =new FormData();
    data.append('id',$id);
    data.append('eliminar',$action);
    swal({
        title: "¿Estás segur@ de sacar del registro?",
        text: "Una vez retirado, Tendrás que volver agregarlo manualmente.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
     
      }).then((result)=>
    {
        if (result) {
            fetch("./armarplanilla/eliminarImporte.php",
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
                            text: "Importe Borrado!",
                            icon: "success",
                            timer :5000 });
                    }else{
                        swal({
                          title: "No se pudo eliminar ",
                          text: "Error interno!",
                          icon: "warning",
                          timer :5000 });
                      }
                      setTimeout(function() {
                        location.reload();
                      }, 2000);   
  
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
function importar(year, month, id) 
{
    var $action ='importar';
    var $year = year;
    var $month = month;
    var $id = id;
    const data =new FormData();
    data.append('year',$year);
    data.append('month',$month);
    data.append('id',$id);
    data.append('importar',$action);
    swal({
        title: "Se va a cargar el registro del mes anterior.",
        text: "¿Está de acuerdo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
     
      }).then((result)=>
    {
        if (result) {
            fetch("./importar/importar.php",
            {   
                method:"POST",
                body: data
            }).then(response => response.text().then(response =>
                {  
                    console.log(response);
                    if(response =="ok" )
                    {
                        swal({
                            title: "Se cargo correctamente correctamente  ",
                            text: "Importe realizado!",
                            icon: "success",
                            timer :5000 });
                    }else{
                        swal({
                          title: "No se pudo cargar datos ",
                          text: "Error interno!",
                          icon: "warning",
                          timer :5000 });
                      }
                      setTimeout(function() {
                        location.reload();
                      }, 2000);   
  
                } 
                ))
          } else {
            swal("Canceló la operación.");
            setTimeout(function() {
                location.reload();
              }, 1000); 
          }
  
        
    }
    )
}

