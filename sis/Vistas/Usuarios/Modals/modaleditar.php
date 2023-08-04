<div class="modal fade" id="actualizarusuario<?php echo  $data["id_usuarios"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class="fw-bold">Actualizar Usuario</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="register-form" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <h6 style=" padding:1px">ID</h6> <input class="form-control" placeholder="id" type="text" id="id_primary<?php echo  $data["id_usuarios"];?>" name="id_primary<?php echo  $data["id_usuarios"];?>"  value="<?php echo $data["id_usuarios"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_usuarios<?php echo  $data["id_usuarios"];?>" type="text" name="id_usuarios<?php echo  $data["id_usuarios"];?>" value="<?php echo $data["id_usuarios"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  NOMBRE</h6><input  name="nombre_usuario<?php echo  $data["id_usuarios"];?>"  autocomplete="off" type="text" class="form-control" id="nombre_usuario<?php echo  $data["id_usuarios"];?>"  value="<?php echo $data["NOMBRE"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CONTRASEÑA </h6><input  name="clave_usuario<?php echo  $data["id_usuarios"];?>"  autocomplete="off" type="text" class="form-control" id="clave_usuario<?php echo  $data["id_usuarios"];?>"  value="<?php echo $data["CLAVE"];?>" > </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > ADMIN </h6><input  name="admin_usuario<?php echo  $data["id_usuarios"];?>"  autocomplete="off" type="text" class="form-control" id="admin_usuario<?php echo  $data["id_usuarios"];?>"  value="<?php echo $data["ADMIN"];?>" > </label>
                          </div>  
                        
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizarusuario" onclick="actualizarusaurio('<?php echo $data["id_usuarios"]; ?>')" >Actualizar Usuario</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>