<div class="modal fade" id="cont<?php echo  $data["id_meses"];?>" >
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold  font-weight-bold'>Modalidad, Area</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                    <div class="row row-2">
                    <label for="">Modalidad</label>
                  <div class="btn-group col-sm-2  ">
                
                    <br>
                <input type="text" class="form-control"  data-id-meses="<?php echo  $data["id_meses"];?   id='inputmodalidad<?php echo  $data["id_meses"];?>'>
    
            </div>
            <div class="btn-group  col-sm-7">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> Hasta</p>

        </div>
            </div>
            <div class="row row-2">
                    <label for="">Modalidad</label>
                  <div class="btn-group col-sm-2  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-md-6">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> </p>
        </div>
            </div>
            
            <div class="row row-2">
                    <label for="">Áreas</label>
                  <div class="btn-group col-sm-2  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-sm-7">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> Hasta</p>

        </div>
            </div>
            <div class="row row-2">
                    <label for="">Áreas</label>
                  <div class="btn-group col-sm-2  ">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-md-6">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> </p>
        </div>
            </div>

                    <div class="row row-2">
              
                  <div class="btn-group btn-group-justified my-2">
            
                  <button type="button" onclick="planilla(<?php echo  $data["id_meses"];?>)" class="btn btn-primary">Aceptar</button>
                <button class="btn btn-dark mx-2" id="minimizar" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </div>
                  </div>
              </div>
          </div>
      </div>
 
 