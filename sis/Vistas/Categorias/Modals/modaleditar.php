<div class="modal fade" id="actualizarcategoria<?php echo  $data["id_categori"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold'>Actualizar Categoría</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id_primary1<?php echo  $data["id_categori"];?>" name="id_primary1<?php echo  $data["id_categori"];?>"  value="<?php echo $data["id_categori"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_categoria1<?php echo  $data["id_categori"];?>" type="text" name="id_area<?php echo  $data["id_categori"];?>" value="<?php echo $data["id_categori"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > DESCRIPCION</h6><input  name="descripcion_categoria1<?php echo  $data["id_categori"];?>"  autocomplete="off" type="text" class="form-control" id="descripcion_categoria1<?php echo  $data["id_categori"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > BASFEDU</h6><input  name="basfedu_categoria1<?php echo  $data["id_categori"];?>"  autocomplete="off" type="text" class="form-control" id="basfedu_categoria1<?php echo  $data["id_categori"];?>"  value="<?php echo $data["BASFEDU"];?>" > </label>
                          </div>  
                          
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizarcategoria('<?php echo $data["id_categori"]; ?>')"  >Actualizar Categoria</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>