<div class="modal fade" id="actualizarmodalidad<?php echo  $data["id_modali"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    
                    <span class="fw-bold">Actualizar Modalidad</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id_primary1<?php echo  $data["id_modali"];?>" name="id_primary1<?php echo  $data["id_modali"];?>"  value="<?php echo $data["id_modali"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_modalidad1<?php echo  $data["id_modali"];?>" type="text" name="id_modalidad1<?php echo  $data["id_modali"];?>" value="<?php echo $data["id_modali"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CODIGO</h6><input  name="codigo_modalidad1<?php echo  $data["id_modali"];?>"  autocomplete="off" type="text" class="form-control" id="codigo_modalidad1<?php echo  $data["id_modali"];?>"  value="<?php echo $data["CODIGO"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > DESCRIPCION</h6><input  name="descripcion_modalidad1<?php echo  $data["id_modali"];?>"  autocomplete="off" type="text" class="form-control" id="descripcion_modalidad1<?php echo  $data["id_modali"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > FEDU</h6><input  name="fedu_modalidad1<?php echo  $data["id_modali"];?>"  autocomplete="off" type="text" class="form-control" id="fedu_modalidad1<?php echo  $data["id_modali"];?>"  value="<?php echo $data["FEDU"];?>" > </label>
                          </div>  
                          
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizarmodalidad('<?php echo $data["id_modali"]; ?>')"  >Actualizar modalidad</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>