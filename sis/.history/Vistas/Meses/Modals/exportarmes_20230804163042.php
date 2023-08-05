
<div class="modal fade" id="exportarmes<?php echo  $data["id_meses"];?>"  tabindex="-1">
            <div class="modal-dialog custom-modal" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light   text-center" style="justify-content:center;">
                        <span class="text-center fw-bold" style="font-size:20px; font-family: Georgia, 'Times New Roman', Times, serif ;">
                        REPORTE DEL MES  DE FEBRERO 2023 </span>
                          <button type="button" class="btn btn-close " id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <ul class="options-list">
    <li data-tab="planillas<?php echo  $data["id_meses"];?>" class="active">Planilla</li>
    <li data-tab="descuentoley<?php echo  $data["id_meses"];?>">Descuento Ley</li>
    <li data-tab="resmodalidad<?php echo  $data["id_meses"];?>">Modalidad</li>
    <li data-tab="boletpago<?php echo  $data["id_meses"];?>">Boleta de pago</li>
    <li data-tab="descgen<?php echo  $data["id_meses"];?>">Descuentos Generales</li>
    <li data-tab="reportitems<?php echo  $data["id_meses"];?>">Items</li>
    <!-- Agrega más opciones aquí -->
  </ul>

  <div class="tab-content" id="planillas<?php echo  $data["id_meses"];?>">
  <span>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplan<?php echo  $data["id_meses"];?>" id="modalplan<?php echo  $data["id_meses"];?>" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="PENSIONISTAS">PENSIONISTAS</option>
    </span>
  </select> 
<span>
  <span class="fw-bold">TIPO DE PLANILLA</span>
    <select   name="tipp<?php echo  $data["id_meses"];?>" id="tipp<?php echo  $data["id_meses"];?>" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="PLANILLA">PLANILLA</option>
    <option value="PLANILLA_MENSUAL"> PLANILLA MENSUAL</option>
  </select>
  </span>

  <span>
  <span class="fw-bold">FILTRAR</span>
    <select data-id="<?php echo  $data["id_meses"];?>"  name="" id="filtrar<?php echo  $data["id_meses"];?>" onchange="habilitarInput(<?php echo  $data["id_meses"];?>)" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="MODALIDADES">MODALIDAD</option>
    <option value="AREAS">ÁREAS</option>
  </select>
  </span>
  <div id="modalidades<?php echo  $data["id_meses"];?>" style="display:none;">
  <span>
  <div class="row row-2">
                    <label for="">Modalidad</label>
                  <div class="btn-group col-sm-1  ">
                
                    <br>
                <input type="text" class="form-control"   >
    
            </div>
            <div class="btn-group  col-sm-7">
   
            <input type="text" class="form-control " disabled > <p class="mx-4 my-2"> Hasta</p>

        </div>
            </div>
  </span>
  <div class="row row-2">
                    <label for="">Modalidad</label>
                  <div class="btn-group col-sm-1  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-md-6">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> </p>
        </div>
            </div>
  </div>

  <div id="arease<?php echo  $data["id_meses"];?>" style="display:none;">
  <span>
  <div class="row row-2">
                    <label for="">Áreas</label>
                  <div class="btn-group col-sm-1  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-sm-7">
   
            <input type="text" class="form-control " disabled > <p class="mx-4 my-2"> Hasta</p>

        </div>
            </div>
            <div class="row row-2">
                    <label for="">Áreas</label>
                  <div class="btn-group col-sm-1  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-md-6">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> </p>
        </div>
            </div>
  </span>
  </div>
  <div class="py-2">
<button class="btn btn-block btn-outline text-white w-100" onclick="planilla(<?php echo  $data["id_meses"];?>)" style="background-color: #1976D2; " >REPRESENTAR LA PLANILLA</button>
</div>
  </div>

  <div class="tab-content" id="descuentoley<?php echo  $data["id_meses"];?>" style="display: none;">
    <h2>Descuento de Ley</h2>
    <p>Descripción de la opción Planilla Mensual.</p>
  </div>
  
                    <div class="row row-2">
                      
            
                  <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" data-bs-target="#planilla<?php echo $data["id_meses"];?>" class="btn btn-success fw-bolder">Planilla</a>
            
            <a data-bs-toggle="modal" data-bs-target="#planilla<?php echo $data["id_meses"];?>" class="btn btn-dark fw-bold mx-2 ">Planilla Mensual</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" data-bs-target="#desc_ley<?php echo $data["id_meses"];?>"class="btn btn-success fw-bolder">Descuento de Ley</a>
            <a data-bs-toggle="modal" data-bs-target="#desc_ley<?php echo $data["id_meses"];?>" class="btn btn-dark fw-bold mx-2">Descuento de Ley Mensual</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" onclick="modalidad(<?php echo $data["id_meses"];?>)" class="btn btn-success fw-bolder">Resumen por Modalidad</a>
            <a data-bs-toggle="modal" data-bs-target="#planilla<?php echo $data["id_meses"];?>" class="btn btn-dark fw-bold mx-2">Resumen por Modalidad Mensual</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a  data-bs-toggle="modal" data-bs-target="#bol<?php echo $data["id_meses"];?>" class="btn btn-success fw-bolder">Boleta de Pago</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" data-bs-target="#planilla<?php echo $data["id_meses"];?>" class="btn btn-success fw-bolder">Reporte Descuentos</a>
            <a data-bs-toggle="modal" data-bs-target="#planilla<?php echo $data["id_meses"];?>" class="btn btn-dark fw-bold mx-2">Reportes Descuentos X Mes</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" onclick="items(<?php echo $data["id_meses"];?>)"  class="btn btn-success fw-bolder">Reporte items</a>
            <a data-bs-toggle="modal" onclick="items(<?php echo $data["id_meses"];?>)" class="btn btn-success fw-bolder">Reporte items de Mensual</a>     
            </div>

            </div>
            <!-- <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a href="#" class="btn btn-success fw-bolder">Constancia de Pago de Haberes</a>
            </div>
            </div>
            <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a onclick="nomxactividad(<?php echo $data["id_meses"]?>)" class="btn btn-success fw-bolder">Nomina de Trabajadores x Actividad</a>
            <a onclick="descxactividad(<?php echo $data["id_meses"]?>)" class="btn btn-dark fw-bold mx-2">Descuento de Trabajadores x Actividad</a>
            </div>
            </div> <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a onclick="nomxactividad(<?php echo $data["id_meses"]?>)" class="btn btn-success fw-bolder">Resumen Nomina de Trabajadores x Programa</a>
     
            </div>
            </div> <div class="row row-2 my-3">
            <div class="btn-group btn-group-justified ">
            <a onclick="nomxbanco(<?php echo $data["id_meses"]?>)"class="btn btn-success fw-bolder">Nomina de trabajadores x Actividad(Para Banco) </a>
            </div>
            </div>
            <div class="row row-2   ">
            <div class="btn-group btn-group-justified ">
            <a onclick="formsiaf(<?php echo $data["id_meses"]?>)" class="btn btn-success fw-bolder">Formulación SIAF</a>
            <a  onclick="formsiafdesc(<?php echo $data["id_meses"]?>)"class="btn btn-success fw-bolder" >Formulación SIAF Descuentos</a>
            </div>
            </div> -->
          
            </div> 
                  </div>
              </div>

          </div>
      </div>
      <?php include ('./Modals/planilla/planilla.php') ?>
      <?php include ('./Modals/desc_ley/desc_ley.php') ?>
      <?php include ('./Modals/boletapago/boletapago.php') ?>
      <script>
         function habilitarInputplanil(evento) {
           }
     function habilitarInput(event) {
     
     
      var modalidadInput = document.getElementById('filtrar' + event);
      var inputHabilitado = document.getElementById('modalidades' + event);
      var inputHabilitados = document.getElementById('arease' + event);
      if (modalidadInput.value === 'MODALIDADES') {
        inputHabilitado.style.display = 'block';
        inputHabilitados.style.display = 'none';  // Habilitar el input
      } else if(modalidadInput.value === 'AREAS') {
        inputHabilitados.style.display = 'block';
        inputHabilitado.style.display = 'none';   // Deshabilitar el input
      }else {
        inputHabilitado.style.display = 'none';
        inputHabilitados.style.display = 'none';   // Deshabilitar el input
      }

      }

        function boletapago(id,mes){

    // Variables define el alto de la ventana para mostrar
        var ancho = 1000;
        var alto = 800;
        // Calcular posocion x,y para centrar la ventana
        var x = parseInt((window.screen.width/2) - (ancho / 2));
        var y = parseInt((window.screen.height/2) - (alto / 2));

        $url = 'factura/generaFactura.php?m='+mes+'&id='+id;
        // Posciones
        if($('#NOMBRE'+mes).val()==='')
        {
          alert("DIGITE SU ID CORRECTAMENTE");
        }else
        {
          window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
        }
        
        }
    
        
    function planilla(mes,modalidad,tipoplanilla, param1,param2){
    // Variables define el alto de la ventana para mostrar
    var modalidad =$('#modalplan'+mes).val(); 
    var tipoplanilla=$('#tipp'+mes).val(); 
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana

    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));
    console.log(modalidad);

    $url = 'facturas/generaplanilla.php?m='+mes+ '';
    $url += modalidad ? '&modalidad=' + modalidad : '';
    $url += tipoplanilla ? '&tipoplanilla=' + tipoplanilla : '';
    $url += param1 ? '&param1=' + param1 : '';
    $url += param2 ? '&param2=' + param2 : '';

    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
    }

   function modalidad(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generamodalidad.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 
   
   function items(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generaritems.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 

      
   
   function formsiaf(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generasiaf.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 
   function formsiafdesc(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generasiafdesc.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 

   function nomxactividad(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generarnomxactividad.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 

   function descxactividad(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generadescxactividad.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   }

   function resxprograma(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generarresxprograma.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
   } 

   function nomxbanco(mes)
   {
    var ancho = 1000;
    var alto = 800;
    // Calcular posocion x,y para centrar la ventana
    var x = parseInt((window.screen.width/2) - (ancho / 2));
    var y = parseInt((window.screen.height/2) - (alto / 2));

    $url = 'facturas/generarnomxbanco.php?m='+mes+ '';
    // Posciones
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");

   } 
   
  </script>
      
      

      