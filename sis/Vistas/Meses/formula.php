<div class="modal fade" id="formula<?php echo  $planillaT["id_registro"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px ; ">
                <div class="modal-content bg-light "  >
                    <div class="modal-header bg-light ">
                        <div class="row justify-content-md-center ">
                            <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:1.5em; ">Formula</p>
                      </div>
                      <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                    <?php  $mis= $_GET["mes"]; 
                           $ids= $_GET["id"]; 
                    ?>
                      <form  class="row row-col-2"  id="nice<?php echo  $planillaT["id_registro"];?>" method="POST" action="#" enctype="multipart/form-data">

            <div class="col-sm-6" >
              <label for="" class="align-content-center "> <h6 style=" padding:1px;" class="fw-bold">OPERADORES</h6> <select class="form-select" name="" id="valueT<?php echo  $planillaT["id_registro"];?>">
                <option value="SUMA">SUMA</option>
                <option value="RESTA">RESTA</option>
                <option value="MULTIPLICAR">MULTIPLICAR</option>
                <option value="DIVIDIR">DIVIDIR</option>
              </select> </label>
            </div>       
            <div class="col-sm-6 mt-3" >
            <label   for=""> <h6 style=" padding:1px">CODIGO</h6></label>
            <?php                                                           
                  $query_option=mysqli_query($conn,"SELECT * from reportxmes where id_meses ='$mis' and REGPERSO ='$ids' ");
                  $result_estado=mysqli_num_rows($query_option);
                  $query_actual=mysqli_query($conn,"SELECT * from reportxmes where id_meses = '$mis' and REGPERSO ='$ids' and PROPOR='1'");
                  $actualValue=mysqli_fetch_assoc($query_actual); 

            ?> 
            <select name="code<?php echo  $planillaT["id_registro"];?>" class="form-select" id="code<?php echo  $planillaT["id_registro"];?>"required>
           

            <?php
            if($result_estado){ 
            while($options=mysqli_fetch_array($query_option) ){
            ?>
            <option value="<?php echo $options['id_registro'] ;?>" ><?php echo $options['CODIGO'].' '.$options['DESCT'];?> </option>
            <?php 
            }
            }
           
            ?>
            </select>                           
            </div>

             <button class=" btn px-3 btn-primary btn  mt-3"     type="button" onclick="registrarvariable(<?php echo  $planillaT["id_registro"];?>,<?php echo $ids;?>,<?php echo $mis;?>)" id="reeach" >Registrar Formula</button>     
                         
                         
                           <div  ><br> LISTA DE FORMULAS</br>
                            <?php 

                            include '../../../conecta.php';
                            $id_registro=$planillaT["id_registro"];
                            $up= "SELECT *FROM formulaxmes WHERE REGPERSON='$ids' AND REGMES='$mis' and id_registro='$id_registro' ";
                            $mysql=mysqli_query($conn,$up);

                            while($rec=mysqli_fetch_assoc($mysql))
                            {
                            ?>
                            <div class="bg-dark text-white"> <?php echo $rec['CODIGO'].' '.$rec['DESCT'].' '.$rec['TIPO'];?> </div>  
                             <?php } ?>
                           </div>
                      </form>

                  </div>
               
              </div>
          </div>
      </div>