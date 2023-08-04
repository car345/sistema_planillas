<div class="modal fade" id="bol<?php echo $data["id_meses"];?>" >
<?php  $var =$data["id_meses"];?>
            <div class="modal-dialog" style="border-radius: 10px;">
                <input type="hidden" id ='f' value='<?php echo  $data["id_meses"];?>'>
             
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
               
                          <span class="fw-bold">DIGITAR EL DNI PARA GENERAR  BOLETA DE PAGO</span>
                      
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <form  class="row row-col-2"  id="frm<?php echo  $data["id_meses"];?>" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <span style=" padding:1px">id_meses</span> <input class="form-control" placeholder="id" type="hidden" name="id_meses<?php echo  $data["id_meses"];?>" id="id_meses<?php echo  $data["id_meses"];?>" ></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <span class="fw-bold" style=" padding:1px">DNI</span> <input class="form-control "  type="text" name="id_usuario<?php echo  $data["id_meses"];?>" id="id_usuario<?php echo  $data["id_meses"];?>"   required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <span class="fw-bold" style=" padding:1px" >  NOMBRE</span><input  name="NOMBRE"  autocomplete="off" type="text" class="form-control" id="NOMBRE<?php echo  $data["id_meses"];?>"  required disabled > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <span  class="fw-bold" style=" padding:1px" >  APELLIDO</span><input  name="APELLIDOS"  autocomplete="off" type="text" class="form-control" id="APELLIDOS<?php echo  $data["id_meses"];?>"  required disabled > </label>
                          </div>  
                          <div>
                         
                          </div>  
                              
                      </form>
                    <div class="row row-2">
              
                  <div class="btn-group btn-group-justified my-2">
            
                  <button type="button" onclick="boletapago($('#id_usuario'+<?php echo  $data["id_meses"];?>).val(),<?php echo  $data["id_meses"];?>)" class="btn btn-primary">Proceder boleta</button>
                <button class="btn btn-dark mx-2" id="minimizar" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- <script>      
    function search_func(value,mes)
{
  var date =$('#f').val();
  console.log(date);
  var user =$('#id_usuario'+date).val();
  console.log();
    $.ajax({
       type: "POST",
       url: "./Modals/boletapago/boleta.php",
       data: {'cl' : user ,'mes':value},
       dataType: "text",
       success: function(msg){
                  console.log(msg);
       }
    });
}

</script> -->

