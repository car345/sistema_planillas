
<?php 
include '../../../conecta.php';
include '../Plantillas/encabezado.php';
$mes =$_GET['mes'];
$cod =$_GET['cod'];
$DESCT =$_GET['DESCT'];
$estado=$_GET['es'];
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Importes</li>
            </ol>
        </nav>
    </div><!-- Fin Titulo -->
    
    <div class="row row-2">
        <div class="col-sm-6"  >
            <?php  if($estado=='0')
            {?>
          <button type="button" class="btn btn-info my-1 text-white   " data-bs-toggle="modal"  data-bs-target="#agregarW" href="" id="nueva_curso" > Agregar Trabajador</button>
          <?php  } ?>
        </div>
        <div class="col-sm-6 mx-auto "  >
        <?php  if($estado=='0')
            {?>
          <button type="button" class="btn btn-info  text-white " data-bs-toggle="modal"      data-bs-target="#agregararea1" id="datos"  > Recargar datos  </button> 
          <?php  } ?>
        </div>
    </div>

    <div class="row row-cols-3">
        <table id="data_tableD" class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th> REGISTRO </th>
                    <th> CODIGO </th>
                    <th> NOMBRE </th>
                    <th> IMPORTE </th>
                    <th> ELIMINAR </th>
                </tr>
            </thead>
            <tbody>
                <?php 

                $queryP = "SELECT * FROM reportxmes WHERE CODIGO='$cod' and id_meses='$mes'";                          
                $ev = mysqli_query($conn,$queryP) or die("database error:". mysqli_error($conn));
            
                while($data = mysqli_fetch_assoc($ev))
                {
                ?>
                <tr>
                    <td> <?php echo $data['id_registro'];?></td>
                    <td> <?php echo $data['REGPERSO'];?></td>
                    <?php 
                        $persona = $data['REGPERSO'];
                        $queryNombre = "SELECT NOMBRE, id_datperso FROM datperso WHERE id_datperso='$persona'";                          
                        $per = mysqli_query($conn, $queryNombre) or die("database error:". mysqli_error($conn));
                        $persona = mysqli_fetch_assoc($per);
                        $nombre = $persona['NOMBRE'];
                    ?>
                    <td> <?php echo $nombre;?> </td>
                    <td> <?php echo $data['IMPORTE'];?> </td>
                    <td>  <button class="btn btn-danger" type='button' onclick='eliminardesc(<?php echo $data['id_registro'];?>)'> <i class="bi bi-trash"></i> </button></td>
                </tr>
            
            <?php   }  ?>
            </tbody>
        </table>           
    </div>
    <!-- Modal de registro-->
    <div class="modal fade" id="agregarW"  tabindex="-1">
        <div class="modal-dialog" style="border-radius: 10px;">
            <div class="modal-content bg-light w-100 m-lg-3 "  >
                <div class="modal-header bg-light  ">
                    <div class="row justify-content-md-center ">
                        <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; "> Datos Del Trabajador</p>
                    </div>
                      <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                </div>
                <div class="modal-body" >
                    <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                        <label   for=""> <h6 style=" padding:1px">DESCT</h6> <input class="form-control" placeholder="id" type="text" name="DESCT" id="DESCT" value="<?php echo $DESCT; ?>" ></label> 
                      </div>
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                        <label   for=""> <h6 style=" padding:1px">Cod_aporte</h6> <input class="form-control" placeholder="id" type="text" name="id_aporte" id="id_aporte" value="<?php echo $cod; ?>" ></label> 
                      </div>
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                        <label   for=""> <h6 style=" padding:1px">id_meses</h6> <input class="form-control" placeholder="id" type="text" name="id_meses" id="id_meses" value="<?php echo $mes; ?>" ></label> 
                      </div>

                      <div class="col-sm-6" >
                        <label   for=""> <h6 style=" padding:1px">DNI</h6> <input class="form-control" id="dni_cliente2" type="text" name="dni_cliente2" required></label> 
                      </div>
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px; ">
                         <label for="" class="align-content-center"> <h6 style="padding:1px" >REGPERSO</h6><input  name="REGPERSO"  autocomplete="off" type="text" class="form-control" id="REGPERSO"> </label>
                      </div>
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                         <label for="" class="align-content-center"> <h6 style=" padding:1px" > NOMBRE</h6><input  name="NOMBRE2"  autocomplete="off" type="text" class="form-control" id="NOMBRE2"  required disabled > </label>
                      </div>
                      <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                         <label for="" class="align-content-center"> <h6 style=" padding:1px" > APELLIDO</h6><input  name="APELLIDOS2"  autocomplete="off" type="text" class="form-control" id="APELLIDOS2"  required disabled > </label>
                      </div>  
                      <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrarDesc"  >Incluir al Trabajador</button>
                      <div>
                        <div><button   type="button" style="display:none" id="registrar"></button></div>
                        <div><button   type="button" style="display:none" id="recargar"></button></div>
                      </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


      <script src="./desc.js"></script>
      <script src="./descuento.js"></script>
<script src="./armarplanill.js"></script>

<?php
    include_once '../Plantillas/footer2.php';
?>