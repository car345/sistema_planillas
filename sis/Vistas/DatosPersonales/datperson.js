registrar.addEventListener("click", ()=>{
    var codigo=$('#CODIGO').val();
    var fecha=$('#FECHA_NACI').val();
    var Fechaing=$('#FECHA_ING').val();
    var FechaCese=$('#FECHA_CESE').val();
    var dni=$('#NUMERO_DOC').val();
    var dnis =dni.length;
    if(codigo =="")
 {
    alert("Te falta ingresar tu codigo");
 }else if(dnis<8)   
 {
    alert("El dni tiene que ser 8 digitos");
 }
 else if(fecha =="")
 {
    alert("Te falta tu fecha de nacimiento");
 }else if(Fechaing=="")
 {
    alert("Te falta tu fecha de Ingreso");
 }
 else if(FechaCese=="")
 {
    alert("Te falta tu fecha de Cese");
 }
 else
 {

    fetch("./Controlador_datperson/registrar.php",{
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
                    icon: "success" });
              
            }else if(response=="repeat")
            {
                swal({
                    title: "Esa persona ya esta registrada ",
                    text: "Revise bien el codigo!",
                    icon: "warning",
                    timer :5000 });
            }else{
                {
                    swal({
                      title: "No se pudo registrar ",
                      text: "You clicked the button!",
                      icon: "warning",
                      });
                     
                  }
            }
       
            
        })
 }

})
function eliminar(id)
{
    var $action ='eliminardatperso';
    var $id_datperso= id;
    const data =new FormData();
    data.append('id',$id_datperso);
    data.append('eliminardatperso',$action);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((result)=>
    {
        if (result) {
            fetch("./Controlador_datperson/eliminar.php",
            {   
                method:"POST",
                body: data
            }).then(response => response.text().then(response =>
                {  
                    console.log(response);
                    if(response =="ok" )
                    {
                        swal({
                            title: "Se Elimino correctamente  ",
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

function actualizar1(id)
{
  const data = new FormData();
var action='actualizarperso';
var id_primary= $('#id_primary1'+id).val();
var codigo= $('#CODIGO'+id).val();
var codigo_plaza= $('#CODIGO_PLAZA'+id).val();
var nombre= $('#NOMBRE'+id).val();
var apellidos =$('#APELLIDOS'+id).val();
var amaterno=$('#AMATERNO'+id).val(); 
var apaterno=$('#APATERNO'+id).val(); 
var tipdoc=$('#tipdoc'+id).val(); 
var numero_doc=$('#NUMERO_DOC'+id).val(); 
var fecha_naci=$('#FECHA_NACI'+id).val(); 
var sexo=$('#SEXO'+id).val(); 
var estado=$('#estado'+id).val(); 
var modali=$('#modali'+id).val(); 
var categori=$('#categori'+id).val(); 
var cargo=$('#CARGO'+id).val(); 
var area=$('#AREA'+id).val(); 
var afps=$('#afps'+id).val(); 
var codigo_ips=$('#CODIGO_IPS'+id).val(); 
var codigo_afp=$('#CODIGO_AFP'+id).val(); 
var fecha_ing=$('#FECHA_ING'+id).val(); 
var fecha_cese=$('#FECHA_CESE'+id).val(); 
var cta_cte=$('#CTA_CTE'+id).val(); 
var activi=$('#activi'+id).val(); 
var partidas=$('#partidas'+id).val();

data.append('id_primary1',id_primary);
data.append('CODIGO',codigo);
data.append('CODPLAZA',codigo_plaza);
data.append('NOMBRE',nombre)
data.append('APELLIDOS',apellidos);
data.append('AMATERNO',amaterno);
data.append('APATERNO',apaterno);
data.append('tipdoc',tipdoc)
data.append('NUMERO_DOC',numero_doc);
data.append('FECHA_NACI',fecha_naci);
data.append('SEXO',sexo);
data.append('estado',estado)
data.append('modali',modali);
data.append('categori',categori);
data.append('CARGO',cargo);
data.append('AREA',area);
data.append('afps',afps)
data.append('CODIGO_IPS',codigo_ips);
data.append('CODIGO_AFP',codigo_afp);
data.append('FECHA_ING',fecha_ing);
data.append('FECHA_CESE',fecha_cese)
data.append('CTA_CTE',cta_cte);
data.append('id_activi',activi);
data.append('id_partidas',partidas);

fetch("./Controlador_datperson/actualizar.php",{
    method: "POST",
    body: data
}).then(response =>response.text()).then(response=>
    {
        console.log(response);
        if(response =="ok" )
        {
            swal({
                title: "Se Actualizo correctamente  ",
                text: "You clicked the button!",
                icon: "success",
                timer :5000 });
                setTimeout(function() {
                    location.reload();
                  }, 1000); 
        }else{
            swal({
              title: "No se pudo registrar ",
              text: "You clicked the button!",
              icon: "warning",
              timer :5000 });
          }
          
    })
}

function datperso(){

    // Variables define el alto de la ventana para mostrar
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = './factura/generaFactura.php';
    // Posciones
    window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}
function modalidad(){

    // Variables define el alto de la ventana para mostrar
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = './factura/generamodalidad.php';
    // Posciones
    window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}
function afps(){

    // Variables define el alto de la ventana para mostrar
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = './factura/generaafps.php';
    // Posciones
    window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}