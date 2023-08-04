<div class="modal fade" id="editaraportes<?php echo  $data["REGISTRO"];?>"  tabindex="-1">
    <div class="modal-dialog" style="border-radius: 10px;">
        <div class="modal-content bg-light w-100 m-lg-3 "  >
            <div class="modal-header bg-light  ">
            <span class='fw-bold'>Actualizar Descuento</span>
                <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" >
                <form method="POST" action="#" enctype="multipart/form-data">
               
                   
                    <div class="row row-col-2">
                    <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="id_past<?php echo  $data["REGISTRO"];?>" name="id_past<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["REGISTRO"];?>"></label> 
                        </div>

                        <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="idaportes<?php echo  $data["REGISTRO"];?>" name="idaportes<?php echo  $data["REGISTRO"];?>"  value="<?php echo $data["REGISTRO"];?>"></label> 
                        </div>

                        <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">CODIGO</h6> <input class="form-control" id="codigo<?php echo  $data["REGISTRO"];?>" type="text" name="codigo<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["CODIGO"];?>"></label>
                        </div>
                        <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">CODIGO CONCEPTO</h6> <input class="form-control" id="cc<?php echo  $data["REGISTRO"];?>" type="text" name="cc<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["CODIGOCONCEPTO"];?>"></label>
                        </div>                        
                    </div>
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">GLOSA (DESCRIPCION)</h6> <input class="form-control" id="desc<?php echo  $data["REGISTRO"];?>" type="text" name="desc<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["DESCT"];?>"></label> 
                    </div> 
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">FORMULA</h6> <input class="form-control" id="val<?php echo  $data["REGISTRO"];?>" type="text" name="val<?php echo  $data["REGISTRO"];?>" value="<?php echo $data["APORTE"];?>"></label> 
                    </div>                    

                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">DETALLE</h6> <textarea class="form-control" name="det<?php echo  $data["REGISTRO"];?>" id="det<?php echo  $data["REGISTRO"];?>" cols="30" rows="10" ><?php echo $data["DETALLE"]; ?></textarea></label> 
                    </div> 
                    <button class=" btn px-3 btn-primary btn  mt-3"     type="button" id="actualizar" onclick="actualizaraportes('<?php echo $data["REGISTRO"]; ?>')"  >Actualizar Descuento</button>
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
