<div class="modal fade bd-example-modal-lg" id="importes" tabindex="-4" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fw-bold" id="meses12<?php echo $data["id_meses"]; ?>"> IMPORTE DE : <?php echo $data['NOMBRE']; echo " ".$data['APELLIDOS']; ?> </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-3">
     
            
            <div class="col-sm-2">
            <label class="fw-bold "for=""> CODIGO </label>
            <input  style="height: 28px;" class="form-control" type="text"></label>
            </div>
            <div class="col-sm-4 ">
            DESCRIPCION<input style="height: 28px;" class="form-control" type="text">
            </div>
            <div class="col-sm-5 ">
            IMPORTE<input style="height: 28px;" class="form-control" type="text">
            </div>
            <div class="col-sm-2 my-2 ">
            <input style="height: 28px;" class="form-control" type="text"></label>
            </div>
            <div class="col-sm-4 my-2">
            <input style="height: 28px;" class="form-control" type="text">
            </div>
            <div class="col-sm-5 my-2">
            <input style="height: 28px;" class="form-control" type="text">
            </div>
        </div>
      </div>
    </div>
  </div>
</div>