<div class="modal fade" id="actualizararea<?php echo  $data["id_areas"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                        <div class="row justify-content-md-center ">
                            <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; "> REGISTRAR AREA</p>
                      </div>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="register-form" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <h6 style=" padding:1px">ID</h6> <input class="form-control" placeholder="id" type="text" id="id_primary<?php echo  $data["id_areas"];?>" name="id_primary<?php echo  $data["id_areas"];?>"  value="<?php echo $data["id_areas"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_area<?php echo  $data["id_areas"];?>" type="text" name="id_area<?php echo  $data["id_areas"];?>" value="<?php echo $data["id_areas"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  CODIGO</h6><input  name="codigo_area<?php echo  $data["id_areas"];?>"  autocomplete="off" type="text" class="form-control" id="codigo_area<?php echo  $data["id_areas"];?>"  value="<?php echo $data["CODIGO"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  DESCRIPCION</h6><input  name="descripcion_area<?php echo  $data["id_areas"];?>"  autocomplete="off" type="text" class="form-control" id="descripcion_area<?php echo  $data["id_areas"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div>  
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar_area" onclick="actualizararea('<?php echo $data["id_areas"]; ?>')" >Actualizar Area</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>