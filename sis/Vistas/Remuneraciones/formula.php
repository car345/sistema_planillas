<div class="modal fade" id="formula<?php echo  $data["id_registro"];?>"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px ; ">
                <div class="modal-content bg-light "  >
                    <div class="modal-header bg-light ">
                    <span class="fw-bold">FORMULA DE RENUMERACION</span>
                      <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >

                      <form  class="row row-col-2"  id="nice<?php echo  $data["id_registro"];?>" method="POST" action="#" enctype="multipart/form-data">

            <div class="col-sm-6" >
              <label for="" class="align-content-center "> <h6 style=" padding:1px;" class="fw-bold">OPERADORES</h6> <select class="form-select" name="" id="valueT<?php echo  $data["id_registro"];?>">
                <option value="SUMA">SUMA</option>
                <option value="MULTIPLICAR">MULTIPLICAR</option>
              </select> </label>
            </div>       
            <div class="col-sm-6 mt-3" >
            <label   for=""> <h6   class="fw-bold"style="  padding:1px">CODIGO DE DECRETO</h6></label>
            <?php            

                  $query_option=mysqli_query($conn,"SELECT * from reportxmes where id_meses='9999' and REGPERSO='18923'  ORDER BY CODIGO");
                  $result_estado=mysqli_num_rows($query_option);


            ?> 
            <select name="code<?php echo  $data["id_registro"];?>" class="form-select" id="code<?php echo  $data["id_registro"];?>"required>
           

            <?php
            if($result_estado){ 
            while($options=mysqli_fetch_array($query_option) ){
            ?>
            <option value="<?php echo $options['CODIGO'] ;?>" ><?php echo $options['CODIGO'].' '.$options['DESCT'];?> </option>
            <?php 
            }
            }
           
            ?>
            </select>                           
            </div>

             <button class=" btn px-3 btn-primary btn  mt-3"     type="button" onclick="registrarvariable(<?php echo  $data["id_registro"];?>)" id="reeach" >Registrar Formula</button>     
                         
                         
                           <div  ><br> <span class="fw-bold">LISTA DE FORMULAS </span> </br>
                            <?php 

                            include '../../../conecta.php';
                            $id_registro=$data["id_registro"];
                            $up= "SELECT *FROM renxformula WHERE id_registro='$id_registro' ";
                            $mysql=mysqli_query($conn,$up);
                            $c=" ";

                            $se="SELECT*FROM renumeraciones where id_registro='$id_registro'";
                            $sql=$conn->query($se);
                            $fetch=$sql->fetch_assoc();
                            
                           
                            while($rec=mysqli_fetch_assoc($mysql))
                            {
                            ?>
                            <div class=""> <?php echo $rec['CODIGO'].' '.$rec['DESCT'].' '.$rec['TIPO'];
                            
                            if($rec['TIPO']=='SUMA')
                            {
                              $c.='+'.$rec['IMPORTE'];
                            }else
                            {
                              $c.=' *'.$rec['IMPORTE'];
                            }
                            
                            ?></div>                            
                             <?php
                            
                             } ?>
                           </div>

                    
                            <span class="fw-bold"> REPRESENTACION DE FORMULA </span>
                            <br>
                           <?php 
                            echo $fetch['APORTE'].' '.$c;
                           ?>

                      </form>

                  </div>
               
              </div>
          </div>
      </div>
    