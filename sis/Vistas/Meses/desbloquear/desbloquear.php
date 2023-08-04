
<!-- Modal -->
<div class="modal fade" id="meses12<?php echo $data["id_meses"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="meses12<?php echo $data["id_meses"]; ?>">CONFIRMAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="" >
                            <label>
                                <i class="fas fa-user"></i>
                                Usuario
                            </label>
                            <div>
                                <input id="user<?php echo $data["id_meses"]; ?>" type="text" placeholder="Username" name="user<?php echo $data["id_meses"]; ?>" class="form-control" required/>
                            </div>

                            <label>
                                <i class="fas fa-key"></i>
                                Password
                            </label>
                            <div>
                                <input id="pass<?php echo $data["id_meses"]; ?>" type="password" name="pass<?php echo $data["id_meses"]; ?>" class="form-control" required />
                            </div>

                            <div>
                                <button class="btn btn-dark ml-3 my-3 " type="button" id="validarestado<?php echo $data["id_meses"]; ?>" onclick="validar('<?php echo $data['id_meses']; ?>', '<?php echo $data['ESTADO']; ?>')"> 
                                    <i class="fas fa-lock"></i>
                                    Confirmar
                                </button>
                            </div>

                        </form>
      </div>
     
    </div>
  </div>
</div>
