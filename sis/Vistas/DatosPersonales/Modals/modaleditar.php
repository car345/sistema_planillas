<div class="modal fade" id="actualizardatperso<?php echo $data['id_datperso'] ?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                     <span class="fw-bolder">EDITAR DATOS CLIENTE</span>
                          <button type="button" class="btn-close " id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <form  class="row row-col-2"   method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <h6 style=" padding:1px">id</h6> <input class="form-control" placeholder="id<?php echo $data['id_datperso']; ?>" type="text" name="id_primary<?php echo $data['id_datperso']; ?>"  id="id_primary1<?php echo $data['id_datperso']; ?>" value="<?php echo $data['id_datperso'] ?>" ></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CODIGO PLAZA</h6><input  name="CODIGO_PLAZA<?php echo $data['id_datperso']; ?>"  autocomplete="off" type="text" class="form-control" id="CODIGO_PLAZA<?php echo $data['id_datperso']; ?>" value="<?php echo $data['CODPLAZA'] ?>"  > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CODIGO</h6><input  name="CODIGO<?php echo $data['id_datperso']; ?>"  autocomplete="off" type="text" class="form-control" id="CODIGO<?php echo $data['id_datperso']; ?>" value="<?php echo $data['CODIGO'] ?>"  > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > NOMBRE</h6><input  name="NOMBRE<?php echo $data['id_datperso']; ?>"  autocomplete="off" type="text" class="form-control" id="NOMBRE<?php echo $data['id_datperso']; ?>"  value="<?php echo $data['NOMBRE'] ?>"> </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > APELLIDOS </h6><input  name="APELLIDOS<?php echo $data['id_datperso']; ?>"  autocomplete="off" type="text" class="form-control" id="APELLIDOS<?php echo $data['id_datperso']; ?>" value="<?php echo $data['APELLIDOS'] ?>"  > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > A. PATERNO</h6><input  name="APATERNO<?php echo $data['id_datperso']; ?>"  autocomplete="off" type="text" class="form-control" id="APATERNO<?php echo $data['id_datperso']; ?>"  value="<?php echo $data['APATERNO'] ?>"> </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > A. MATERNO</h6><input  name="AMATERNO<?php echo $data['id_datperso'] ;?>"  autocomplete="off" type="text" class="form-control" id="AMATERNO<?php echo $data['id_datperso'] ;?>"  value="<?php echo $data['AMATERNO'] ?>"> </label>
                          </div>    
                          <!--TIPO DOCUMENTO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >TIPO DOCUMENTO</h6>
                          <select name="tipdoc<?php echo $data['id_datperso'] ?>" id="tipdoc<?php echo $data['id_datperso'] ?>" class="form-select multiple" selected >
                          <?php
                                 
                                 $res= $data['id_datperso'];  
                                 $doc_tip = $data['id_docide'];
                                 $query_estado=mysqli_query($conn,"SELECT REGISTRO, SIGLA from docide");
                                 $result_estado=mysqli_num_rows($query_estado);   
                                 $query_tipdoc2=mysqli_query($conn,"SELECT REGISTRO, SIGLA from docide where REGISTRO='$doc_tip'");
                                 $doccs=mysqli_fetch_assoc($query_tipdoc2); ?> 
                           <option value="<?php echo $doccs['REGISTRO'] ;?>" selected ="" ><?php echo $doccs['SIGLA'] ;?></option>
                           <?php
                       if($result_estado)
                       { while($doc=mysqli_fetch_array($query_estado) ){?>
                       <option value="<?php echo $doc['id_docide'] ;?>" ><?php echo $doc['SIGLA']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>
                           <!--NUMERO DE DOCUMENTO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >N° DOCUMENTO</h6><input  name="NUMERO_DOC<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="text" class="form-control" id="NUMERO_DOC<?php echo $data['id_datperso'] ;?>"  value="<?php echo $data['CODIGO'] ;?>" > </label>
                          </div>   
                          <!--FECHA DE NACIMIENTO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > FECHA DE NAC</h6><input  name="FECHA_NACI<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="date" class="form-control" id="FECHA_NACI<?php echo $data['id_datperso'] ;?>"   value="<?PHP  echo date('Y-m-d',strtotime($data['FECHA_NACI'] )); ?>"> </label>
                          </div>  
                        <!--SEXO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > SEXO </h6></label>
                             <select name="SEXO<?php echo $data['id_datperso'] ?>" id="SEXO<?php echo $data['id_datperso'] ?>"  class="form-select selector" >
            
                             <option  <?php echo $data['SEXO']==='1'?"selected='selected'":"" ?>  value="1">
                              MASCULINO
                           </option>
                           <option <?php echo $data['SEXO']==='2'?"selected='selected'":"" ?>  value="2" >
                              FEMENINO
                           </option>
                            </select>
                          </div>
                        <!--ESTADO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >ESTADO</h6>
                          <select name="estado<?php echo $data['id_datperso'] ?>" id="estado<?php echo $data['id_datperso'] ?>" class="form-select multiple" selected="" >
                          <?php
                                 $doc_estado=$data['id_estado'];
                                 $query_estado=mysqli_query($conn,"SELECT id_estado,DESCR from estado ");
                                 $result_estado=mysqli_num_rows($query_estado);   
                                 $query_estados=mysqli_query($conn,"SELECT id_estado,DESCR from estado where id_estado='$doc_estado'");
                                 $doccs=mysqli_fetch_assoc($query_estados); ?> 
                           <option value="<?php echo $doccs['id_estado'] ;?>" selected="" ><?php echo $doccs['DESCR'] ;?></option>
                           <?php
                       if($result_estado)
                       { while($doc=mysqli_fetch_array($query_estado) ){?>
                       <option value="<?php echo $doc['id_estado'] ;?>" ><?php echo $doc['DESCR']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>
                           
                      <!--MODALIDAD-->
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >MODALIDAD</h6>
                          <select name="modali<?php echo $data['id_datperso'] ?>" id="modali<?php echo $data['id_datperso'] ?>" class="form-select multiple" selected="" >
                          <?php 
                                 $doc_est=$data['id_modali'];
                                 $query_modali=mysqli_query($conn,"SELECT id_modali,`DESC` from modali ");
                                 $result_modali=mysqli_num_rows($query_modali);   
                                 $query_modalidad=mysqli_query($conn,"SELECT id_modali,`DESC` from modali where id_modali='$doc_est'");
                                 $modali=mysqli_fetch_assoc($query_modalidad); ?> 
                           <option value="<?php echo $modali['id_modali'] ;?>" selected="" ><?php echo $modali['DESC'] ;?></option>
                           <?php
                       if($result_modali)
                       { while($doc=mysqli_fetch_array($query_modali) ){?>
                       <option value="<?php echo $doc['id_modali'] ;?>" ><?php echo $doc['DESC']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>

                           <div class="wrapper">
                           <div class="divider div-transparent"></div>
                           </div>
                           <!--Categoria-->
                      

                           <div class="wrapper">
                           <div class="divider div-transparent"></div>
                           </div>
                           <!--CARGO-->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >CARGO </h6><input  name="CARGO<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="text" class="form-control" id="CARGO<?php echo $data['id_datperso'] ?>" value ="<?php echo $data['CARGO']; ?>"  > </label>
                          </div>  

                           <!--AREAS-->
                           <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >AREAS</h6>
                          <select name="AREA<?php echo $data['id_datperso'] ?>" id="AREA<?php echo $data['id_datperso'] ?>" class="form-select multiple" selected="" >
                          <?php 
                                 $doc_est=$data['id_areas'];
                                 $query_modali=mysqli_query($conn,"SELECT id_areas,`DESC` from areas ");
                                 $result_modali=mysqli_num_rows($query_modali);   
                                 $query_modalidad=mysqli_query($conn,"SELECT id_areas,`DESC` from areas where id_areas='$doc_est'");
                                 $modali=mysqli_fetch_assoc($query_modalidad); ?> 
                           <option value="<?php echo $modali['id_areas'] ;?>" selected="" ><?php echo $modali['DESC'] ;?></option>
                           <?php
                       if($result_modali)
                       { while($doc=mysqli_fetch_array($query_modali) ){?>
                       <option value="<?php echo $doc['id_areas'] ;?>" ><?php echo $doc['DESC']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>
                           <div class="wrapper">
                           <div class="divider div-transparent"></div>
                           </div>
                           <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >CATEGORIA</h6>
                          <select name="categori<?php echo $data['id_datperso'] ?>" id="categori<?php echo $data['id_datperso'] ?>" class="form-select multiple" selected="" >
                          <?php 
                                 $doc_cat=$data['id_categori'];
                                 $query_categori=mysqli_query($conn,"SELECT id_categori,`DESC` from categori");
                                 $result_categori=mysqli_num_rows($query_categori);   
                                 $query_cat=mysqli_query($conn,"SELECT id_categori,`DESC` from categori where id_categori='$doc_cat'");
                                 $categori=mysqli_fetch_assoc($query_cat); ?> 
                           <option value="<?php echo $categori['id_categori'] ;?>" selected="" ><?php echo $categori['DESC'] ;?></option>
                           <?php
                       if($result_categori)
                       { while($docc=mysqli_fetch_array($query_categori) ){?>
                       <option value="<?php echo $docc['id_categori'] ;?>" ><?php echo $docc['DESC']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>

                           <!--SISTEMA PENSIONARIO-->
                           <?php   
                                 $query_afps=mysqli_query($conn,"SELECT id_afps,`DESC` from afps");
                                 $result_afps=mysqli_num_rows($query_afps);?> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px">SISTEMA PENSIONARIO</h6>
                          <select name="afps<?php echo $data['id_datperso'] ?>" id="afps<?php echo $data['id_datperso'] ?>" class="form-select">
                          <?php  
                          $doc_afps=$data['id_afps'];
                           $query_afpss=mysqli_query($conn,"SELECT id_afps,`DESC` from afps where id_afps='$doc_afps'");
                           $afpss=mysqli_fetch_assoc($query_afpss); 
                           ?>
                           <option value="<?php echo $afpss['id_afps'] ;?>" selected="" ><?php echo $afpss['DESC'] ;?></option>
                           <?php
                                 if($result_afps)
                                 { while($afps=mysqli_fetch_array($query_afps) ){?>
                                 <option value="<?php echo $afps['id_afps']; ?>"><?php echo $afps['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div> 

                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > COD IPSSS</h6><input  name="CODIGO_IPS<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="text" class="form-control" id="CODIGO_IPS<?php echo $data['id_datperso'] ?>"  value="<?php echo $data['CODIGO_IPS'] ?>" > </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CODIGO AFP</h6><input  name="CODIGO_AFP<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="text" class="form-control" id="CODIGO_AFP<?php echo $data['id_datperso'] ?>"  value="<?php echo $data['CODIGO_AFP'] ?>" > </label>
                          </div>  

                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > FECHA ING</h6><input  name="FECHA_ING<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="date" class="form-control" id="FECHA_ING<?php echo $data['id_datperso'] ?>"  value="<?PHP  echo date('Y-m-d',strtotime($data['FECHA_ING'] )) ?>" "> </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > FECHA CESE</h6><input  name="FECHA_CESE<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="date" class="form-control" id="FECHA_CESE<?php echo $data['id_datperso'] ?>"  value="<?PHP  echo date('Y-m-d',strtotime($data['FECHA_CESE'] )) ?>"> </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CTA CTE</h6><input  name="CTA_CTE<?php echo $data['id_datperso'] ?>"  autocomplete="off" type="text" class="form-control" id="CTA_CTE<?php echo $data['id_datperso'] ?>"  value="<?php echo $data['CTA_CTE'] ?>"> </label>
                          </div> 
                                    <!--ACTIVIDAD-->
                                    <?php   
                                 $query_activi=mysqli_query($conn,"SELECT REGISTRO,`DESC` from activi");
                                 $result_activi=mysqli_num_rows($query_activi);?> 
                           <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px">ACTIVIDAD</h6>
                          <select name="activi<?php echo $data['id_datperso'] ?>" id="activi<?php echo $data['id_datperso'] ?>" class="form-select" selected="">
                          <?php  
                           $doc_actv=$data['id_activi'];
                           $query_act=mysqli_query($conn,"SELECT REGISTRO,`DESC` from activi where REGISTRO = '$doc_actv'");
                           $activi=mysqli_fetch_assoc($query_act); 
                           ?>
                           <option value="<?php echo $activi['REGISTRO'] ;?>" selected="" ><?php echo $activi['DESC'] ;?></option>
                           <?php
                                 if($result_activi)
                                 { while($act=mysqli_fetch_array($query_activi) ){?>
                                 <option value="<?php echo $act['REGISTRO']; ?>"><?php echo $act['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>  
                           <!--PARTIDAS-->
                           <?php   
                                 $query_partid=mysqli_query($conn,"SELECT REGISTRO, CODIGO, NOMBRE from partidas");
                                 $result_partid=mysqli_num_rows($query_partid);?> 
                           <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px">PARTIDAS</h6>
                          <select name="partidas<?php echo $data['id_datperso'] ?>" id="partidas<?php echo $data['id_datperso'] ?>" class="form-select" selected="">
                          <?php  
                           $doc_part = $data['id_partidas'];
                           $query_part = mysqli_query($conn,"SELECT REGISTRO, CODIGO from partidas where REGISTRO = '$doc_part'");
                           $partidas = mysqli_fetch_assoc($query_part); 
                           $num=mysqli_num_rows($query_part);
                           if($num >0)
                           { 
                           ?>
                           <option value="<?php echo $partidas['REGISTRO'] ;?>" selected="" ><?php echo $partidas['CODIGO'] ;?></option>
                           <?php
                           }else{ ?>
                           <option value="<?php echo $partidas['REGISTRO'] ;?>" selected="" ></option>
                           <?php } ?>
                           <?php
                           
                                 if($result_partid)
                                 { while($part=mysqli_fetch_array($query_partid) ){?>
                                 <option value="<?php echo $part['REGISTRO']; ?>"><?php echo $part['CODIGO']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>  
                           <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizar1('<?php echo $data['id_datperso']; ?>')"  >Actualizar Persona datos</button>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>
      