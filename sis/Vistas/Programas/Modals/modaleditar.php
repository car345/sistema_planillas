<div class="modal fade" id="actualizarprograma<?php echo  $data["id_programa"];?>">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold'>Actualizar Programa</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id_primary1<?php echo  $data["id_programa"];?>" name="id_primary1<?php echo  $data["id_programa"];?>"  value="<?php echo $data["id_programa"];?>"></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">REGISTRO</h6> <input class="form-control" id="id_programa<?php echo  $data["id_programa"];?>" type="text" name="id_programa<?php echo  $data["id_programa"];?>" value="<?php echo $data["id_programa"];?>"></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  CODIGO</h6><input  name="CODIGO<?php echo  $data["id_programa"];?>"  autocomplete="off" type="text" class="form-control" id="CODIGO<?php echo  $data["id_programa"];?>"  value="<?php echo $data["CODIGO"];?>" > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  DESCRIPCION</h6><input  name="DESC<?php echo  $data["id_programa"];?>"  autocomplete="off" type="text" class="form-control" id="DESC<?php echo  $data["id_programa"];?>"  value="<?php echo $data["DESC"];?>" > </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >DIVISO</h6>
                          <select name="divisio<?php echo $data['id_programa'] ?>" id="DIVISO<?php echo $data['id_programa'] ?>" class="form-select multiple" selected="" >
                          <?php 
                                 $doc_est=$data['id_divisio'];
                                 $query_modali=mysqli_query($conn,"SELECT id_divisio,CODIGO from divisio ");
                                 $result_modali=mysqli_num_rows($query_modali);   
                                 $query_modalidad=mysqli_query($conn,"SELECT id_divisio,CODIGO from divisio where id_divisio='$doc_est'");
                                 $modali=mysqli_fetch_assoc($query_modalidad); ?> 
                           <option value="<?php echo $modali['id_divisio'] ;?>" selected="" ><?php echo $modali['id_divisio'] ;?></option>
                           <?php
                       if($result_modali)
                       { while($doc=mysqli_fetch_array($query_modali) ){?>
                       <option value="<?php echo $doc['id_divisio'] ;?>" ><?php echo $doc['id_divisio']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>
                           <div class="wrapper">
                           <div class="divider div-transparent"></div>
                           </div>
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizarprograma('<?php echo $data["id_programa"]; ?>')"  >Actualizar Programa</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>