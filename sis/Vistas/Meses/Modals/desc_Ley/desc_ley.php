<div class="modal fade" id="desc_ley<?php echo  $data["id_meses"];?>" >
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                        <div class="row justify-content-md-center ">
                            <p class=" text-center text-black" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:1.5em; ">Sistema Pensionario</p>
                      </div>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                    <div class="row row-2">
                    <label for="">Sistema Pensionario</label>
                  <div class="btn-group col-sm-2  ">
                
                    <br>
                <input type="text" class="form-control"   >
    
            </div>
            <div class="btn-group  col-sm-7">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> Hasta</p>

        </div>
            </div>
            <div class="row row-2">
                  
                  <div class="btn-group col-sm-2 my-2">
                
                    <br>
                <input type="text" class="form-control " >
    
            </div>
            <div class="btn-group  col-md-6 my-2">
   
            <input type="text" class="form-control " disabled > <p class="mx-4"> </p>
        </div>
            </div>
          

                    <div class="row row-2">
              
                  <div class="btn-group btn-group-justified my-2">
            
                  <button type="button" onclick="desc_ley(<?php echo $data["id_meses"]; ?>)" class="btn btn-success">Aceptar</button>
                <button class="btn btn-dark mx-2" id="minimizar" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </div>
                  </div>
              </div>
          </div>
      </div>
  <script>
    function desc_ley(mes){

// Variables define el alto de la ventana para mostrar
var ancho = 1000;
var alto = 800;
// Calcular posocion x,y para centrar la ventana
var x = parseInt((window.screen.width/2) - (ancho / 2));
var y = parseInt((window.screen.height/2) - (alto / 2));

  $url = 'facturas/generardesc_ley.php?mes='+mes;
  // Posciones
  window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}
  </script>