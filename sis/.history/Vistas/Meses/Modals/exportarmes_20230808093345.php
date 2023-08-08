
<div class="modal fade" id="exportarmes<?php echo  $data["id_meses"];?>"  tabindex="-1">
            <div class="modal-dialog custom-modal" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light   text-center" style="justify-content:center;">
                        <span class="text-center fw-bold" style="font-size:20px; font-family: Georgia, 'Times New Roman', Times, serif ;">
                        REPORTE DEL MES  DE FEBRERO 2023 </span>
                          <button type="button" class="btn btn-close " id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <ul class="options-list text-center">
    <li data-tab="planillas<?php echo  $data["id_meses"];?>" class="active">Planilla</li>
    <li data-tab="descuentoley<?php echo  $data["id_meses"];?>">Descuento Ley</li>
    <li data-tab="resmodalidad<?php echo  $data["id_meses"];?>">Modalidad</li>
    <li data-tab="boletpago<?php echo  $data["id_meses"];?>">Boleta de pago</li>
    <li data-tab="descgen<?php echo  $data["id_meses"];?>">Descuento</li>
    <li data-tab="reportitems<?php echo  $data["id_meses"];?>">Items</li>
    <li data-tab="consthab<?php echo  $data["id_meses"];?>">Constancia de haberes</li>
    <li data-tab="nomintrab<?php echo  $data["id_meses"];?>">Nomina de Trabajadores </li>

    <li data-tab="formulariosiaf<?php echo  $data["id_meses"];?>">Formulario SIAF</li>
    <!-- Agrega más opciones aquí -->
  </ul>
 <!-- planillas -->
  <div class="tab-content" id="planillas<?php echo  $data["id_meses"];?>">
  <span>
    <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplan<?php echo  $data["id_meses"];?>" id="modalplan<?php echo  $data["id_meses"];?>" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="PENSIONISTAS">PENSIONISTAS</option>
    </span>
  </select> 
<span>
  <span class="fw-bold">TIPO DE PLANILLA</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tipp<?php echo  $data["id_meses"];?>" id="tipp<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="PLANILLA">PLANILLA</option>
    <option value="PLANILLA_MENSUAL"> PLANILLA MENSUAL</option>
  </select>
  </span>
  <span id="filtraropciones<?php echo  $data["id_meses"];?>" style="display:none;">
  <span class="fw-bold">FILTRAR</span>
    <select data-id="<?php echo  $data["id_meses"];?>"  name="" id="filtrar<?php echo  $data["id_meses"];?>" onchange="habilitarInput(<?php echo  $data["id_meses"];?>)" class="form-select">
    <option value="">Seleccione una opcion</option>
    <option value="MODALIDADES">MODALIDAD</option>
    <option value="AREAS">ÁREAS</option>
  </select>
  </span>
  <div id="modalidades<?php echo $data["id_meses"]; ?>" style="display:none;">
  <span>
    <div class="row row-2 fila">
      <label for="">Modalidad</label>
      <div class="btn-group col-sm-1">
        <br>
        <input type="text" data-id-meses="<?php echo $data["id_meses"]; ?>" class="form-control" id ="cod_modal<?php echo $data["id_meses"]; ?>">
      </div>
      <div class="btn-group col-sm-7">
        <input type="text" class="form-control" id='NOMBREMODAL<?php echo $data["id_meses"]; ?>'>
        <p class="mx-4 my-2"> Hasta</p>
      </div>
    </div>
  </span>
  <div class="row row-2">
    <label for="">Modalidad</label>
    <div class="btn-group col-sm-1">
      <br>
      <input type="text" class="form-control" data-id-meses="<?php echo $data["id_meses"]; ?>" id ="cod_modal_final<?php echo $data["id_meses"]; ?>">
    </div>
    <div class="btn-group col-md-6">
      <input type="text" class="form-control">
      <p class="mx-4"> </p>
    </div>
  </div>
</div>

  <div id="arease<?php echo  $data["id_meses"];?>" style="display:none;">
  <span>
    <div class="row row-2">
            <label for="">Áreas</label>
          <div class="btn-group col-sm-1  ">
              <br><input type="text" class="form-control " >
          </div>
          <div class="btn-group  col-sm-7">
              <input type="text" class="form-control "  > <p class="mx-4 my-2"> Hasta</p>
          </div>
    </div>
    <div class="row row-2">
          <label for="">Áreas</label>
        <div class="btn-group col-sm-1  ">
          <br><input type="text" class="form-control " >
        </div>
        <div class="btn-group  col-md-6">
          <input type="text" class="form-control "  > <p class="mx-4"> </p>
        </div>
    </div>
  </span>
  </div>
  <div class="py-2">
<button class="btn btn-block btn-outline text-white w-100 fw-bold" onclick="planilla(<?php echo  $data["id_meses"];?>)" style="background-color: #1976D2; " >REPRESENTAR LA PLANILLA</button>
</div>
  </div>
<!-- descuento ley -->
  <div class="tab-content" id="descuentoley<?php echo  $data["id_meses"];?>" style="display: none;">
  <span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplandesc<?php echo  $data["id_meses"];?>" id="modalplandesc  <?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>
  <span>
  <span class="fw-bold">TIPO DE DESCUENTO LEY</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippdesc<?php echo  $data["id_meses"];?>" id="tippdesc<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">DESC. LEY INDIVIDUAL</option>
      <option value="DESCLEY_MENUSAL"> DESC. LEY MENSUAL</option>
    </select>
  </span>
  <span>
  <div class="row row-2">
   <label for="" class="fw-bold">SISTEMA PENSIONARIO</label>
     <div class="btn-group col-sm-1  "><br>
     <input type="text" class="form-control"   ></div>
            <div class="btn-group  col-sm-7">
              <input type="text" class="form-control " disabled > <p class="mx-4"> Hasta</p></div></div>
            <div class="row row-2">
            <div class="btn-group col-sm-1 my-2"><br>
              <input type="text" class="form-control " ></div>
            <div class="btn-group  col-md-6 my-2">
              <input type="text" class="form-control " disabled ><p class="mx-4"></p></div>
            </div>
  </span>
    <button type="button" onclick="desc_ley(<?php echo $data["id_meses"]; ?>)" class="btn btn-success w-100 fw-bold" style="background-color: #1976D2; ">REPRESENTAR DESCUENTO LEY</button>
  </div>

  <!-- resumen modalidad -->
  <div class="tab-content" id="resmodalidad<?php echo  $data["id_meses"];?>">
  <span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplanmodal<?php echo  $data["id_meses"];?>" id="modalplandesc  <?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>
  <span>
  <span class="fw-bold">TIPO DE RESUMEN DE MODALIDAD</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippmodal<?php echo  $data["id_meses"];?>" id="tippdesc<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">RESUMEN MODALIDAD</option>
      <option value="DESCLEY_MENUSAL"> RESUMEN MODALIDAD MENSUAL</option>
    </select>
  </span>
  <div class="py-2">
    <button class="btn btn-block w-100 fw-bold text-white" style="background-color: #1976D2; " onclick="modalidad(<?php echo $data["id_meses"];?>)">REPRESENTAR RESUMEN DE MODALIDAD</button>
  </div>
</div>

<!-- boleta de pago -->
<div class="tab-content" id="boletpago<?php echo  $data["id_meses"];?>">
<hr>
<div class="row">

<form   id="frm<?php echo  $data["id_meses"];?>" method="POST" action="#" enctype="multipart/form-data">
    <div class="col-sm-6" style="display:none;">
      <label   for=""> <span style=" padding:1px">id_meses</span> <input class="form-control" placeholder="id" type="hidden" name="id_meses<?php echo  $data["id_meses"];?>" id="id_meses<?php echo  $data["id_meses"];?>" ></label> 
    </div>
    <div class="col-xl-3"  > 
      <span class="fw-bold">DNI</span> <input class="form-control w-100"  type="text" name="id_usuario<?php echo  $data["id_meses"];?>" id="id_usuario<?php echo  $data["id_meses"];?>"   required>
    </div>
    <div class="col-xl-4"> 
      <span class="fw-bold" style=" padding:1px" >  NOMBRE</span><input  name="NOMBRE"  autocomplete="off" type="text" class="form-control" id="NOMBRE<?php echo  $data["id_meses"];?>"  required disabled > 
    </div>
    <div class="col-xl-5"> 
      <span  class="fw-bold" style=" padding:1px" >  APELLIDO</span><input  name="APELLIDOS"  autocomplete="off" type="text" class="form-control" id="APELLIDOS<?php echo  $data["id_meses"];?>"  required disabled > 
    </div>
  </form>
</div>
<div class="py-3">
  <button type="button" onclick="boletapago($('#id_usuario'+<?php echo  $data["id_meses"];?>).val(),<?php echo  $data["id_meses"];?>)" class="btn btn-primary w-100">Proceder boleta</button>
</div>
</div>

<!-- Reporte Descuentos -->
<div class="tab-content" id="descgen<?php echo  $data["id_meses"];?>">
<hr>
<span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplandescu<?php echo  $data["id_meses"];?>" id="modalplandesc  <?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>
  <span>
  <span class="fw-bold">TIPO DE DESCUENTOS</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippdescu<?php echo  $data["id_meses"];?>" id="tippdesc<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">DESCUENTOS</option>
      <option value="DESCLEY_MENUSAL"> DESCUENTO X MES</option>
    </select>
  </span>
  <span>
  <div class="row row-2">
   <label for="" class="fw-bold">SISTEMA PENSIONARIO</label>
     <div class="btn-group col-sm-1  "><br>
     <input type="text" class="form-control"   ></div>
            <div class="btn-group  col-sm-7">
              <input type="text" class="form-control " disabled > <p class="mx-4"> Hasta</p></div></div>
            <div class="row row-2">
            <div class="btn-group col-sm-1 my-2"><br>
              <input type="text" class="form-control " ></div>
            <div class="btn-group  col-md-6 my-2">
              <input type="text" class="form-control " disabled ><p class="mx-4"></p></div>
            </div>
    
  </span>
    <button type="button" onclick="desc_ley(<?php echo $data["id_meses"]; ?>)" class="btn btn-success w-100 fw-bold" style="background-color: #1976D2; ">REPRESENTAR DESCUENTO LEY</button>
</div>

<!-- Reporte items -->
  <div class="tab-content" id="reportitems<?php echo  $data["id_meses"];?>">
  <hr>
  <span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplanmodali<?php echo  $data["id_meses"];?>" id="modalplanmodali  <?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>
  <span>
  <span class="fw-bold">TIPO DE RESUMEN DE MODALIDAD</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippmodali<?php echo  $data["id_meses"];?>" id="tippmodali<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="ITEMS">REPORTE POR ITEMS</option>
      <option value="ITEMS_MENUSAL">  REPORTE POR ITEMS MENSUAL</option>
    </select>
  </span>
  <div class="row" >
    <span> RENUMERACIONES</span>
    <span class="col-sm-6">Desde:</span>
    <span class="col-sm-6">Hasta:</span>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>  
      <span> MODALIDAD: <input type="text" class="form-control"></span>
  </div>
 
  <div  class="py-2">
  <button class="btn btn-block w-100 fw-bold text-white" style="background-color: #1976D2; " onclick="items(<?php echo $data["id_meses"];?>)"> Reporte de Items</button>
  </div>

  </div>
<!-- Constancia de haberes -->
<div class="tab-content" id="consthab<?php echo  $data["id_meses"];?>">
<hr>
<div class="row">

<form   id="frms<?php echo  $data["id_meses"];?>" method="POST" action="#" enctype="multipart/form-data">
    <div class="col-sm-6" style="display:none;">
      <label   for=""> <span style=" padding:1px">id_meses</span> <input class="form-control" placeholder="id" type="hidden" name="id_mesess<?php echo  $data["id_meses"];?>" id="id_mesess<?php echo  $data["id_meses"];?>" ></label> 
    </div>
    <span class="fw-bold"> DATOS DEL TRABAJADOR</span>
    <div class="col-xl-3"  > 
      <span class="fw-bold">DNI</span> <input class="form-control w-100"  type="text" name="id_usuarios<?php echo  $data["id_meses"];?>" id="id_usuarios<?php echo  $data["id_meses"];?>"   required>
    </div>
    <div class="col-xl-4"> 
      <span class="fw-bold" style=" padding:1px" >  NOMBRE</span><input  name="NOMBRE"  autocomplete="off" type="text" class="form-control" id="NOMBRES<?php echo  $data["id_meses"];?>"  required disabled > 
    </div>
    <div class="col-xl-5"> 
      <span  class="fw-bold" style=" padding:1px" >  APELLIDOS</span><input  name="APELLIDOS"  autocomplete="off" type="text" class="form-control" id="APELLIDOSS<?php echo  $data["id_meses"];?>"  required disabled > 
    </div>
  </form>

</div>
<div class="py-3">
  <button type="button" onclick="user($('#id_usuario'+<?php echo  $data["id_meses"];?>).val(),<?php echo  $data["id_meses"];?>)" class="btn btn-primary w-100">Proceder boleta</button>
</div>
<div class="row" >
    <span class="fw-bold"> FECHA</span>
    <span class="col-sm-6">  Desde el Mes: </span>
    <span class="col-sm-6"> Hasta el Mes:</span>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>  
      <span class="col-sm-6">  Desde el Mes: </span>
      <span class="col-sm-6"> Hasta el Mes:</span>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>
      <div class="col-sm-1"> <input type="text " class="form-control "></div>

      <div class="col-sm-5"> <input type="text " class="form-control " disabled></div>
  </div>
  <div class="py-3">
  <button type="button" onclick="user($('#id_usuario'+<?php echo  $data["id_meses"];?>).val(),<?php echo  $data["id_meses"];?>)" class="btn btn-primary w-100">Proceder boleta</button>
</div>
</div>

<!-- Nomina de Trabajadores-->
<div class="tab-content" id="nomintrab<?php echo  $data["id_meses"];?>">
<hr>
<span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplannom<?php echo  $data["id_meses"];?>" id="modalplannom<?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>

  <span>
  <span class="fw-bold">TIPO DE TRABAJADORES</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippnom<?php echo  $data["id_meses"];?>" id="tippnom<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">NOMINA</option>
      <option value="DESCLEY_MENUSAL"> DESCUENTOS</option>
    </select>
  </span>
  <span>
  <span class="fw-bold">ACCIÓN</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippaccion<?php echo  $data["id_meses"];?>" id="tippaccion<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">ACTIVIDAD</option>
      <option value="DESCLEY_MENUSAL"> PROGRAMA</option>
    </select>
    </span>
    <span>
    <span class="fw-bold">MODALIDAD </span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippaccion<?php echo  $data["id_meses"];?>" id="tippaccion<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="NORMAL">PENSIONISTAS</option>
  
    </select>

  
  </span>
  <div  class="py-2">
  <button class="btn btn-block w-100 fw-bold text-white" style="background-color: #1976D2; " onclick="items(<?php echo $data["id_meses"];?>)"> GENERAR REPORTE</button>
  </div>
</div>
<!-- Formulario SIAF-->
<div class="tab-content" id="formulariosiaf<?php echo  $data["id_meses"];?>">
<hr>
<span>
  <hr>
   <span class="fw-bold">MODALIDAD DE PLANILLA</span>
    <select name="modalplanform<?php echo  $data["id_meses"];?>" id="modalplanform  <?php echo  $data["id_meses"];?>" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="PENSIONISTAS">PENSIONISTAS</option>
    </select> 
  </span>
  <span>
  <span class="fw-bold">TIPO DE FORMULARIO</span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippform<?php echo  $data["id_meses"];?>" id="tippform<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="DESCLEY">FORMULARIO SIAF</option>
      <option value="DESCLEY_MENUSAL"> FORMULARIO DE ABONO A BANCOS</option>
    </select>
  </span>
  <span class="fw-bold">MODALIDAD </span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippmod<?php echo  $data["id_meses"];?>" id="tippmod<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="NORMAL">PENSIONISTAS</option>
    </select>
  </span>
  <span>
  <span class="fw-bold">CTA CTE </span>
    <select  data-id="<?php echo  $data["id_meses"];?>"   name="tippacta<?php echo  $data["id_meses"];?>" id="tippcta<?php echo  $data["id_meses"];?>" onchange="habilitarInputplanil(<?php echo  $data["id_meses"];?>)" class="form-select">
      <option value="">Seleccione una opcion</option>
      <option value="NORMAL">SIN CTATE</option>
      <option value="NORMAL">CON CTATE</option>
      <option value="NORMAL">TODAS</option>
    </select>

  
  </span>
  <div  class="py-2">
  <button class="btn btn-block w-100 fw-bold text-white" style="background-color: #1976D2; " onclick="items(<?php echo $data["id_meses"];?>)"> GENERAR FORMULARIO</button>
  </div>
</div>         

            </div> 
                  </div>
              </div>

          </div>
      </div>

      <script>
        var openModalLinks = document.getElementsByClassName('open-modal');

        for (var i = 0; i < openModalLinks.length; i++) {
            openModalLinks[i].addEventListener('click', function(event) {
                event.preventDefault(); // Evitar la acción por defecto del enlace o botón
             
            var ids = this.getAttribute('data-id');
            console.log('ID obtenido:', ids);

            var id_modalidad = document.getElementById('cod_modal' + ids);
            var id_modalidad_final = document.getElementById('cod_modal_final' + ids);
            id_modalidad.addEventListener('keyup', function(event) {
            var inputValue = id_modalidad.value;
           
           var formData = new FormData();
           formData.append('mes', ids);
           formData.append('cod_modal', inputValue);

           fetch('./Modals/planilla/buscarmodalidad.php', {
               method: 'POST',
               body: formData
           })
           .then(response => {
               if (!response.ok) {
                   throw new Error('Error en la solicitud AJAX: ' + response.status);
               }
               return response.text();  // Obtener la respuesta como texto en lugar de JSON
           })
           .then(data => {
               if (data) {
                   var jsonData = JSON.parse(data);
                   console.log('Respuesta del servidor:', jsonData);
                   $('#NOMBREMODAL'+ids).val(jsonData.DESC);
               
             
               } else 
               {$('#NOMBRE'+ids).val("");
                 $('#APELLIDOS'+ids).val("");
                   console.log('Respuesta vacía del servidor');
               }
           })
           .catch(error => {
               console.error('Error en la solicitud AJAX:', error);
           }); 
       });


       id_modalidad_final.addEventListener('keyup', function(event) {
            var inputValues = id_modalidad_final.value;
           
           var formData = new FormData();
           formData.append('mes', ids);
           formData.append('cod_modal', inputValue);

           fetch('./Modals/planilla/buscarmodalidad.php', {
               method: 'POST',
               body: formData
           })
           .then(response => {
               if (!response.ok) {
                   throw new Error('Error en la solicitud AJAX: ' + response.status);
               }
               return response.text();  // Obtener la respuesta como texto en lugar de JSON
           })
           .then(data => {
               if (data) {
                   var jsonData = JSON.parse(data);
                   console.log('Respuesta del servidor:', jsonData);
                   $('#NOMBREMODAL'+ids).val(jsonData.DESC);
               
             
               } else 
               {$('#NOMBRE'+ids).val("");
                 $('#APELLIDOS'+ids).val("");
                   console.log('Respuesta vacía del servidor');
               }
           })
           .catch(error => {
               console.error('Error en la solicitud AJAX:', error);
           }); 
       });


                });
        }

      function habilitarInputplanil(evento) {
      var tipp = document.getElementById('tipp' + evento);

      var inputHabilitadotipp = document.getElementById('filtraropciones' + evento); 

      if (tipp.value === 'PLANILLA') {
        inputHabilitadotipp.style.display = 'block';

      // Habilitar el input
      }else {
        inputHabilitadotipp.style.display = 'none';
      
      }
      }
      function validateForm(id_meses) {
        
      const modalplan = document.getElementById("modalplan" + id_meses);
      const tipp = document.getElementById("tipp" + id_meses);
      const filtrar = document.getElementById("filtrar" + id_meses);
      let valid = true;

     if(modalplan.value === "" || tipp.value === ""){
      swal({
                    title: "Falta seleccionar los campos ",
                   
                    icon: "warning",
                    timer :3000 });
      return false;
     }
     if(tipp.value ==="PLANILLA" && filtrar.value === "" )
     {
      swal({
                    title: "Falta seleccionar el campo filtrar ",
                   
                    icon: "warning",
                    timer :3000 });
      return false;
     }


  if (tipp.value === "PLANILLA" || tipp.value === "PLANILLA_MENSUAL") {
    const modalidades = document.getElementById("modalidades" + id_meses);
    const areas = document.getElementById("arease" + id_meses);

    const modalidadInputs = modalidades.querySelectorAll("input");
    const areaInputs = areas.querySelectorAll("input");

    if(tipp.value=="PLANILLA")
    {
      if(filtrar.value === "MODALIDADES" && modalidadInputs.length > 0)
      {

    
      modalidadInputs.forEach(input => {
      if (input.value.trim() === "") {
        insertErrorMessage(input, "Campo requerido");
        valid = false;
      } else {
        removeErrorMessage(input);
      }

    });
  }

  if(filtrar.value === "AREAS" && modalidadInputs.length > 0)
      {
    areaInputs.forEach(input => {
      if (input.value.trim() === "") {
        insertErrorMessage(input, "Campo requerido");
        valid = false;
      } else {
        removeErrorMessage(input);
      }
    });
 }
    if (!valid) {
      
      return false;
    }else{
      return true;
    }
    
    }

    if(tipp.value === "PLANILLA_MENSUAL")
    {
      if (modalplan.value === "" || tipp.value === "" ){
        swal({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, seleccione todas las opciones!',
    });
    return false;
    }
    }
  
  
  }

  return true;

}



function insertErrorMessage(input, message) {
  const errorMessage = input.parentNode.querySelector(".error-message");

  if (!errorMessage) {
    const newErrorMessage = document.createElement("div");
    newErrorMessage.className = "error-message";
    input.parentNode.appendChild(newErrorMessage);
  }

  const currentErrorMessage = input.parentNode.querySelector(".error-message");
  currentErrorMessage.textContent = message;
}

function removeErrorMessage(input) {
  const errorMessage = input.parentNode.querySelector(".error-message");
  if (errorMessage) {
    errorMessage.textContent = ""; // Limpiar el contenido del mensaje de error
  }
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
    if (validateForm(mes))
    {
    window.open($url,"facturas","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
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
      
      

      