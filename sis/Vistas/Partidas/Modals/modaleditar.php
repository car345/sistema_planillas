<div class="modal fade" id="actualizarpartidas<?php echo  $data["REGISTRO"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class="fw-bold">Actualizar Partida</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                         
                         <input class="form-control" id="id_primary1<?php echo  $data["REGISTRO"];?>" type="hidden" name="id_primary1<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["REGISTRO"];?>"> 
                          
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="ID_PARTIDAS<?php echo  $data["REGISTRO"];?>" type="text" name="ID_PARTIDAS<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["REGISTRO"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  CODIGO</h6><input  name="CODIGO<?php echo  $data["REGISTRO"];?>"  autocomplete="off" type="text" class="form-control" id="CODIGO<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["CODIGO"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  FORMULAR</h6><input  name="FORMULA<?php echo  $data["REGISTRO"];?>"  autocomplete="off" type="text" class="form-control" id="FORMULA<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["FORMULA"];?>" > </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  AUXILIAR</h6><input  name="AUXILIAR<?php echo  $data["REGISTRO"];?>"  autocomplete="off" type="text" class="form-control" id="AUXILIAR<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["AUXILIAR"];?>" > </label>
                          </div> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  FORMULARIO</h6><input  name="id_formular<?php echo  $data["REGISTRO"];?>"  autocomplete="off" type="text" class="form-control" id="id_formular<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["FORMULARIO"];?>" > </label>
                          </div> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > NOMBRE</h6><input  name="NOMBRE<?php echo  $data["REGISTRO"];?>"  autocomplete="off" type="text" class="form-control" id="NOMBRE<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div> 
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizarplanilla('<?php echo $data["REGISTRO"]; ?>')"  >Actualizar Partidas</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>