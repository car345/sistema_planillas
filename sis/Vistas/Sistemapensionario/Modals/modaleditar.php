<div class="modal fade" id="actualizarafps<?php echo  $data["id_afps"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold'>Actualizar Afps</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id_primary1<?php echo  $data["id_afps"];?>" name="id_primary1<?php echo  $data["id_afps"];?>"  value="<?php echo $data["id_afps"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_afps1<?php echo  $data["id_afps"];?>" type="text" name="id_area<?php echo  $data["id_afps"];?>" value="<?php echo $data["id_afps"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CODIGO</h6><input  name="codigo_afps1<?php echo  $data["id_afps"];?>"  autocomplete="off" type="text" class="form-control" id="codigo_afps1<?php echo  $data["id_afps"];?>"  value="<?php echo $data["CODIGO"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > DESCRIPCION</h6><input  name="descripcion_afps1<?php echo  $data["id_afps"];?>"  autocomplete="off" type="text" class="form-control" id="descripcion_afps1<?php echo  $data["id_afps"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > COD2</h6><input  name="cod2_afps1<?php echo  $data["id_afps"];?>"  autocomplete="off" type="text" class="form-control" id="cod2_afps1<?php echo  $data["id_afps"];?>"  value="<?php echo $data["COD2"];?>" > </label>
                          </div>  
                          
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizarafps('<?php echo $data["id_afps"]; ?>')"  >Actualizar Categoria</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>