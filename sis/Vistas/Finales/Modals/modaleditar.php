<div class="modal fade" id="editaraportes<?php echo  $data["id_aportes"];?>"  tabindex="-1">
    <div class="modal-dialog" style="border-radius: 10px;">
        <div class="modal-content bg-light w-100 m-lg-3 "  >
            <div class="modal-header bg-light  ">
                <div class="row justify-content-md-center ">
                    <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; "> ACTUALIZAR FINALES</p>
                </div>
                <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
            </div>
            <div class="modal-body" >
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">Categoria</h6></label>    
                        <select name="select_box" class="form-select" id="categoria<?php echo  $data["id_aportes"];?>">
                            <option value="<?php echo $data["id_aportes"];?>"><?php echo $data["id_aportes"];?></option>
                         <?php
                            $sqlSL = "SELECT p.id_categori, p.DESC
                            FROM categori p ";
                            $querySL = mysqli_query($conn, $sqlSL."ORDER BY p.id_categori ASC");
                            while($dataSL=mysqli_fetch_array($querySL)){
                                echo  '<option value="'.$dataSL["id_categori"].'">'.$dataSL["DESC"].'</option>';}
                         ?>
                        </select>

                    </div>
                    <div class="row row-col-2">

                        <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <input class="form-control" placeholder="id" type="hidden" id="idaportes<?php echo  $data["id_aportes"];?>" name="idaportes<?php echo  $data["id_aportes"];?>"  value="<?php echo $data["id_aportes"];?>"></label> 
                        </div>

                        <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">CODIGO</h6> <input class="form-control" id="codigo<?php echo  $data["id_aportes"];?>" type="text" name="codigo<?php echo  $data["id_aportes"];?>" value="<?php echo $data["CODIGO"];?>"></label>
                        </div>
                        <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">CODIGO CONCEPTO</h6> <input class="form-control" id="cc<?php echo  $data["id_aportes"];?>" type="text" name="cc<?php echo  $data["id_aportes"];?>" value="<?php echo $data["CODIGOC"];?>"></label>
                        </div>                        
                    </div>
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">TIPO CONCEPTO REMUNERATIVO</h6> <input class="form-control" id="tcr<?php echo  $data["id_aportes"];?>" type="text" name="tcr<?php echo  $data["id_aportes"];?>" value="<?php echo $data["TIPOCR"];?>"></label> 
                    </div>
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">GLOSA (DESCRIPCION)</h6> <input class="form-control" id="glosa<?php echo  $data["id_aportes"];?>" type="text" name="glosa<?php echo  $data["id_aportes"];?>" value="<?php echo $data["DESCT"];?>"></label> 
                    </div> 
                    <div class="row row-col-1 " style="padding:px 40px 10px 10px;">
                        <label   for=""> <h6 style=" padding:1px">FORMULA</h6> <input class="form-control" id="formula<?php echo  $data["id_aportes"];?>" type="text" name="formula<?php echo  $data["id_aportes"];?>" value="<?php echo $data["APORTE"];?>"></label> 
                    </div>                    
                    <div class="row row-col-3 custom-control custom-checkbox">
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="imprimir<?php echo  $data["id_aportes"];?>" checked />
                            <label class="custom-control-label" for="defaultUnchecked">Imprimir</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="leer<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Leer</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="ver<?php echo  $data["id_aportes"];?>" checked />
                            <label class="custom-control-label" for="defaultUnchecked">Ver</label>
                        </div>                        
                    </div>
                    <div class="row row-col-3 custom-control custom-checkbox">
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="encargado<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Encargado</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="auxiliar<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Auxiliar</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="anular<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Anular</label>
                        </div>                        
                    </div>
                    <div class="row row-col-3 custom-control custom-checkbox">
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="afecto<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Afecto</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="valorabsoluto<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Valor Absoluto</label>
                        </div>
                        <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" id="inicializa<?php echo  $data["id_aportes"];?>" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Inicializar</label>
                        </div>                        
                    </div>
                    <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">
                        <div class="col-sm-8" >    
                            <label class="align-content-center"  for=""> <h6 style=" padding:1px">DETALLE</h6> <input class="form-control" id="detalle<?php echo  $data["id_aportes"];?>" type="text" name="detalle<?php echo  $data["id_aportes"];?>" value="<?php echo $data["DETALLE"];?>"></label> 
                        </div>
                    </div>
                    <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">   
                        <div class="col-sm-8" >
                            <select name="select_box" class="form-select" id="traba_emp">
                                <option value="1">Trabajador</option>
                                <option value="0">Empleador</option>                                                  
                            </select>
                        </div>
                    </div>
                    <div class="row row-col-2 " style="padding: 0px 0px 0px 10px;">
                        <div class="col-sm-6" >    
                            <label class="align-content-center"  for=""> <h6 style=" padding:1px">FECHA</h6> <input class="form-control" id="fecha<?php echo  $data["id_aportes"];?>" type="date" name="fecha<?php echo  $data["id_aportes"];?>" value="<?php echo substr($data["FECHA"], 0, -9);?>"></label> 
                        </div>
                        <div class="col-sm-6" >    
                            <label class="align-content-center"  for=""> <h6 style=" padding:1px">HASTA</h6> <input class="form-control" id="fecha2<?php echo  $data["id_aportes"];?>" type="date" name="fecha2<?php echo  $data["id_aportes"];?>" value="<?php echo substr($data["FECHA2"], 0, -9);?>"></label> 
                        </div>
                    </div>
                    <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;"> 
                        <div>
                            <button class="btn px-3 btn-primary btn  mt-3" type="button" id="actualizar" 
                            onclick="actualizaraportes('<?php echo $data["id_aportes"]; ?>')"  >Actualizar Aportes</button>
                        </div>
                    </div>  
                </form>                       
            </div>
        </div>
    </div>
</div>

<!-- <script>
    var select_box_element = document.querySelector('#categoria<?php //echo  $data["id_aportes"];?>');
    dselect(select_box_element, {
        search:true
    });
</script> -->
