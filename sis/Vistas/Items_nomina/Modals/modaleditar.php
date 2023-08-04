<div class="modal fade" id="editar<?php echo  $data["REGISTRO"];?>"  tabindex="-1">
    <div class="modal-dialog" style="border-radius: 10px;">
        <div class="modal-content bg-light w-100 m-lg-3 "  >
            <div class="modal-header bg-light  ">
            <span class="fw-bold">Actualizar items nomnina</span>
                <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
            </div>
            <div class="modal-body" >
                <form method="POST" action="#" enctype="multipart/form-data">
               
                              <h6 style=" padding:1px" >CÓDIGO</h6>
                          <select name="codigo<?php echo $data['REGISTRO'] ?>" id="codigo<?php echo $data['REGISTRO'] ?>" class="form-select multiple" selected="" >
                          <option value="<?php echo $data['CODIGO'] ;?>" selected="" ><?php echo $data['CODIGO'] ;?></option>
                          <?php
                                 include '../../../../conecta.php';  
                                 $query_estado=mysqli_query($conn,"SELECT CODIGO from items_no ");
                                 $result_estado=mysqli_num_rows($query_estado);   
                                 
                            ?> 

                           
                           <?php
                       if($result_estado)
                       { while($doc=mysqli_fetch_array($query_estado) ){?>
                       <option value="<?php echo $doc['CODIGO'] ;?>" ><?php echo $doc['CODIGO'] ; ?> </option>
                       <?php }
                    }?>
                            </select>
                    <div class="row row-col-2">
                        <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id<?php echo  $data["REGISTRO"];?>" name="id<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["REGISTRO"];?>"></label> 
                        </div>
                    </div>
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">TIPO CONCEPTO REMUNERATIVO</h6> <input class="form-control" id="tcr<?php echo  $data["REGISTRO"];?>" type="text" name="tcr<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["TIPO"];?>"></label>
                        <label for="">Variables(0)  Remuneraciones(1)   Descuentos Varios(3) </label>
                    </div>
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">DESC</h6> <input class="form-control" id="desc<?php echo  $data["REGISTRO"];?>" type="text" name="desc<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["DESC"];?>"></label> 
                    </div> 
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">FORMULA</h6> <input class="form-control" id="formula<?php echo  $data["REGISTRO"];?>" type="text" name="formula<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["FORMULA"];?>"></label> 
                    </div>                    

                    <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;"> 
                        <div>
                            <button class="btn px-3 btn-primary btn  mt-3" type="button" id="actualizar" 
                            onclick="actualizaraportes('<?php echo $data['REGISTRO']; ?>')"  >Actualizar Items nómina</button>
                        </div>
                    </div>  
                </form>                       
            </div>
        </div>
    </div>
</div>

<!-- <script>
    var select_box_element = document.querySelector('#categoria<?php //echo  $data["REGISTRO"];?>');
    dselect(select_box_element, {
        search:true
    });
</script> -->
