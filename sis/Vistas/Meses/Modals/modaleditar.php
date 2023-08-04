<div class="modal fade" id="actualizarmes<?php echo  $data["id_meses"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class="fw-bold">EDITAR MES</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="nice<?php echo $data["id_meses"]; ?>" method="POST" action="#" enctype="multipart/form-data">
     
<div class="row row-2">
            <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
              <label for="" class="align-content-center"> <h6 style=" padding:1px"  class="fw-bold">Mes</h6><input  name="mes<?php echo  $data["id_meses"];?>"  autocomplete="off" type="number" class="form-control" id="mes<?php echo  $data["id_meses"];?>"  value="<?php echo $data["MES"];?>" > </label>
            </div>
            <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
              <label for="" class="align-content-center"> <h6 style=" padding:1px" class="fw-bold" >  Año</h6><input  name="year<?php echo  $data["id_meses"];?>"  autocomplete="off" type="text" class="form-control" id="year<?php echo  $data["id_meses"];?>"  value="<?php echo $data["anio"];?>" > </label>
            </div>
         
            <div class="col-sm-6" >
            <label   for=""> <h6 class="fw-bold" style=" padding:1px">Tipo</h6></label>
            <select name="t_p1<?php echo $data["id_meses"]; ?>" class="form-select" id="t_p1<?php echo $data["id_meses"]; ?>" required>
            <?php                                                           
                  $query_option=mysqli_query($conn,"SELECT id_tiplanil,`DESC` from tiplanil ");
                  $result_estado=mysqli_num_rows($query_option);   
                  $id_tipplanil = $data['id_tiplanil'];
                  $query_actual=mysqli_query($conn,"SELECT id_tiplanil,`DESC` from tiplanil where id_tiplanil='$id_tipplanil'");
                  $actualValue=mysqli_fetch_assoc($query_actual); 
            ?> 
            <option value="<?php echo $actualValue['id_tiplanil'] ;?>" selected="" ><?php echo $actualValue['DESC'] ;?></option>
            <?php
            if($result_estado){ 
            while($options=mysqli_fetch_array($query_option) ){
            if($options['DESC']=='pensionistas'){



           
            ?>
            <option value="<?php echo $options['id_tiplanil'] ;?>" ><?php echo $options['DESC']; ?> </option>
            <?php 
             }
            }
            }
           
            ?>
            </select>                           
            </div>

              
                        <br><hr><br>
                        <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                          <label for="" class="align-content-center"> <h6 style=" padding:1px" >Fedu</h6><input  disabled name="fedu<?php echo $data["id_meses"]; ?>"  autocomplete="off" type="number" class="form-control" id="fedu<?php echo $data["id_meses"]; ?>"   value="<?php echo $data["FEDU"];?>" required > </label>
                        </div>
                        <div class="col-sm-6" >
                          <label   for=""> <h6 style=" padding:1px" class="fw-bold">Modalidad</h6></label>
                          <select name="modali<?php echo $data["id_meses"]; ?>" class="form-select" id="modali<?php echo $data["id_meses"]; ?>" required>
<?php                                                                 
                          $id_modali = $data['MODALIDAD'];
                          $query_actualm=mysqli_query($conn,"SELECT id_modali,`DESC` from modali where id_modali='$id_modali'");
                          $actualValuem=mysqli_fetch_assoc($query_actualm);
?> 
                          <option value="<?php echo $actualValuem['id_modali'] ;?>" selected="" ><?php echo $actualValuem['DESC'] ;?></option>
<?php                          

                          $query_option2=mysqli_query($conn,"SELECT id_modali,`DESC` from modali ");
                          $result_estado2=mysqli_num_rows($query_option2);   
                      if($result_estado2){ 
                        while($options2=mysqli_fetch_array($query_option2) ){
?>
                          <option value="<?php echo $options2['id_modali'] ;?>" ><?php echo $options2['DESC']; ?> </option>
<?php 
                        }
                      }
?>
                          </select>                          
                        </div>
                        
                          <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar<?php echo $data["id_meses"]; ?>" onclick="actualizar('<?php echo $data['id_meses']; ?>')" >Actualizar Mes</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1<?php echo $data["id_meses"]; ?>"></button></div>
                          </div>  
                          </div>
                        </form>
                      
                  </div>
              </div>
          </div>
      </div>

<!-- Modal de registro-->
