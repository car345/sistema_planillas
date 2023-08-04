<div class="modal fade" id="planilla<?php echo  $data["id_meses"];?>" >
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold  font-weight-bold'>Planilla</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                    <div class="row row-2">

                  <div class="btn-group btn-group-justified ">
            <a data-bs-toggle="modal" data-bs-target="#cont<?php echo $data["id_meses"];?>"  class="btn btn-primary">Contratados</a>
            <a data-bs-toggle="modal" data-bs-target="#cont<?php echo $data["id_meses"];?>"  class="btn btn-dark mx-2 ">Nombrados</a>
            </div>
            </div>
            </div> 
                  </div>
              </div>
          </div>
      </div>
      <?php include ('./Modals/planilla/cont_nombr.php') ?>
      