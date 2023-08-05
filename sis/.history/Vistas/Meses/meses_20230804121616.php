<?php 
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
$directorioActual = getcwd();
echo $directorioActual;
?>
<style>
  .modal {
 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

ul.options-list {
  list-style: none;
  padding: 0;
  display: flex;
  justify-content: space-between;
}

ul.options-list li {
  cursor: pointer;
  padding: 10px;
  margin:0;
}

ul.options-list li.active {
  background-color: #f0f0f0;
  border-radius: 5px;
}

.tab-content {
  display: none;
}

.tab-content.active {
  display: block;
  padding:0;
  margin:0
}
ul.options-list {
  list-style: none;
  padding: 0;
  display: flex;
  justify-content: space-between;
  background-color: #f0f0f0;
  border-radius: 5px;
  margin: 0;
}

ul.options-list li {
  cursor: pointer;
  padding: 15px 20px;
  border-radius: 5px;
  transition: background-color 0.2s ease;
}

ul.options-list li.active {
  background-color: #007bff;
  color: #fff;
}

ul.options-list li:not(.active):hover {
  background-color: #ddd;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin</h1>
      <nav >
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/sis/sistema.php">Admin</a></li>
          <li class="breadcrumb-item active">Meses</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
      
    <div class="card">
            <div class="card-body">
            <h4 class="fw-bold text-primary mt-3 ">PLANILLA DE MES</h4>
            <hr>
      <div class="col-sm-6"  >
        <button type="button" class="btn btn-outline-primary m-3  " data-bs-toggle="modal"  data-bs-target="#agregarmes" href="" id="nueva_curso" ><i class="bi bi-calendar3"></i> Agregar Mes</button>
      </div>
<div class="container-fluid"> 
      <form class="d-flex" action="" method="GET">

        <input class="form-control me-2" type="search" placeholder="Busca el Mes" name="busqueda" > <br>
        <button class="btn btn-outline-primary" type="submit" name="enviar" > <b><i class="bi bi-search"></i></b> </button> 
      </form>
</div>

    <div class="table-responsive" > <!--table_id --> 
          <table class="table_id table table-table-responsive-md table-bordered border-blue table-hover table-light mt-3  " >
            <thead class="bg-primary"><!--thead -->
              <tr>
              <th class="bg-primary text-white text-center" >Código</th>
                <th class="bg-primary text-white text-center" >Mes</th>
                <th class="bg-primary text-white text-center" >Año</th>
                <th  class="bg-primary text-white text-center">Estado</th>
                <th class="bg-primary text-white text-center">Tipo</th>
                <th class="bg-primary text-white text-center">FEDU</th>
                <th class="bg-primary text-white text-center">Ver</th> 
                <th class="bg-primary text-white text-center">Rep Vs.2.0</th>
                <th class="bg-primary text-white text-center">Seleccionar</th>
                <th class="bg-primary text-white text-center">Bloq/desbloq</th>
                <th class="bg-primary text-white text-center">Descuentos</th>
                <th class="bg-primary text-white text-center">Generar Archivo</th>
                <th class="bg-primary text-white text-center">Editar</th> 
                <th class="bg-primary text-white text-center">Eliminar</th>
              </tr>   
            </thead><!--thead -->
            <tbody><!--tbody -->
<?php

$columns = ['a.id_meses','a.MES','a.anio', 'a.MODALIDAD', 'a.ESTADO', 'a.id_tiplanil', 'a.FEDU', 'a.NOEXPSIAF','ti.DESC'];
  $table = 'meses a';
  $id = 'a.id_meses';
  //$campo = isset($_POST['campo']) ? mysqli_escape_string($conexion, $_POST['campo']) : null;
  $where = '';
	if(isset($_GET['enviar'])){
    $campo = $_GET['busqueda'];
		$where = "WHERE (";
		$cont = count($columns);
		for ($i=0; $i < $cont; $i++) { 
			$where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
		}
		$where = substr_replace($where, "", -3);
		$where .= " )"; 	
	}
	$sql ="SELECT ".implode(", ", $columns) ."
	FROM $table inner join tiplanil ti on a.id_tiplanil=ti.id_tiplanil
	$where";
  $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM meses a inner join tiplanil ti on a.id_tiplanil=ti.id_tiplanil $where");
  $result_register=mysqli_fetch_array($sql_registe);
  $total_registro=$result_register['total_registro'];
  $por_pagina=10;
  if(empty($_GET['pagina'])){
      $pagina=1;
  }else{
    $pagina=$_GET['pagina'];
  }
  $desde=($pagina-1)*$por_pagina;
  $total_paginas=ceil($total_registro/$por_pagina);
  //add and modify
  $query=mysqli_query($conn, $sql."ORDER BY a.anio DESC LIMIT $desde,$por_pagina");
  $result=mysqli_num_rows($query);
  

  if($result>0){
    $a=array(); 
    while($data=mysqli_fetch_array($query)){
if($data['id_meses']=='9999')
{

}else{
?>

                  <tr >
                  <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important;"><?php echo $data['id_meses'];?></td>
                    <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important;  text-transform:uppercase;"><?php  
                   setlocale(LC_ALL, 'esp');
                   $monthNum  = $data['MES'];
                   $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                   $monthName = strftime('%B', $dateObj->getTimestamp());
                   echo $monthName; ?></td>
                    <td class="bg-light text-center " style=" font-family: 'Oswald', sans-serif !important;"><?php echo $data['anio'];?></td>
                    <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important;"><?php if($data['ESTADO']==1) { echo "CERRADO"; }else{ echo "ABIERTO"; } ?>
                    </td>
                    <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important;  text-transform:uppercase;"><?php echo $data['DESC'];?></td>
                    <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important; "><?php echo $data['FEDU'];?></td>           
                    <td class="bg-light text-center" style=" font-family: 'Oswald', sans-serif !important; ">
                    <a class="open-modal btn btn-success text-white text-center"  <?php if($data['ESTADO']==1) { echo 'data-bs-toggle="modal"data-id='.$data["id_meses"].' data-bs-target=#exportarmes'.$data["id_meses"];}  ?> ><i class="bi bi-file-zip"></i> </i></a>                    
                   </td>
                    <td class="bg-light text-center">
                                   
                   <a class="btn btn-dark text-center"  href="./armarplanilla2.php?id=<?php echo $data["id_meses"];?>&es=<?php echo $data["ESTADO"];?>" > <i class="bi bi-arrow-down-short"></i></a> 
                   </td>
                    <!-- reporte excel -->

                   <td class="bg-light text-center">
                                   
                    <a class="btn btn-dark text-center"  href="./excel/areas_excel1.php?m=<?php echo $data["id_meses"];?>" >Rep V2.0 <i class="bi bi-arrow-down-short"></i></a> 
                    </td>


                  <td class="bg-light text-center"> 
                   <a class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#meses12<?php echo $data["id_meses"];?>" > <i class="bi bi-key"></i> </i> </a>   
                 </td>

                 <td class="bg-light text-center">
                  <?php if($data['ESTADO']==0){
                   ?>
                     <a class="btn btn-dark"        href="./desc.php?mes=<?php echo $data["id_meses"];?>&es=<?php echo $data["ESTADO"];?>" > <i class="bi bi-journal-arrow-down"></i></a>
                  <?php }else{
                  ?>
                  <a class="btn btn-dark"        href="./desc.php?mes=<?php echo $data["id_meses"];?>&es=<?php echo $data["ESTADO"];?>" > <i class="bi bi-journal-arrow-down"></i></a>
                  <?php } ?>
                 </td>


                 <!-- archivo txt -->
                 <td class="bg-light text-center">
                 <?php if($data['ESTADO']==0){
                   ?>
                 <a class="btn btn-success"  href='#'   > <i class="bi bi-file-earmark-arrow-up-fill"></i></a>
                 <?php }else{
                  ?> 
                  <a class="btn btn-success"  href='./archivo_txt.php?m=<?php echo $data["id_meses"];?>' > <i class="bi bi-file-earmark-arrow-up-fill"></i></a>
                  <?php } ?>
                </td>

                
                <td class="bg-light text-center">
                 <?php if($data['ESTADO']==0){
                   ?>
                 <a class="btn btn-warning "  data-bs-toggle="modal" data-bs-target="#actualizarmes<?php echo $data["id_meses"];?>" > <i class="bi bi-pencil-square"></i></a>
                 <?php }else{
                  ?> 
                  <a class="btn btn-warning"         > <i class="bi bi-pencil-square"></i></a>
                  <?php } ?>
                </td>
                 <td class="bg-light text-center">
                 <?php if($data['ESTADO']==0){
                   ?>
                 <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['id_meses']; ?>')" > <i class="bi bi-trash3"></i> </a>
                 <?php }else{
                  ?> 
                   <a class="btn btn-danger"        href="#" > <i class="bi bi-trash3"></i></a>
                   <?php } ?>
                 </td>
         
                
                  </tr>
                 
<?php 
  include './desbloquear/desbloquear.php';
  include './Modals/modaleditar.php';
  include './Modals/exportarmes.php';
}}
  }else{
?> 
              <tr>
                <td colspan="16">No existen registros</td>
              </tr>
<?php    
  }
?>
            </tbody><!--tbody -->
         </table>
         <td>
     
           <!-- Paginador-->
        <div aria-label="Page navigation example"  >
            <ul class="pagination" >
                <?php
                    if($pagina != 1)
                    {
                    ?>
                    <li class="page-item"><a  class="page-link" href="?pagina=<?php echo 1; ?>">Anterior</a></li>
                    <li class="page-item"><a  class="page-link" href="?pagina=<?php echo $pagina-1;?>">Siguiente</a></li>
                    <?php
                }
                for($i=1; $i<= $total_paginas; $i++)
                {
                if($i==$pagina)
                {
                    echo '<li   class="page-item active" aria-current="page">  <a class="page-link">'.$i. '</a></li>';
                }
                else{
                    echo '<li class="page-item"> <a class="page-link"   href="?pagina='.$i.'">'.$i.'</a></li>';
                }
                }
                if($pagina != $total_paginas)
                {
                ?>
                    <li  class="page-item"><a  class="page-link" href="?pagina=<?php echo $pagina +1;?>">Siguente</a></li>
                    <li  class="page-item"><a  class="page-link"  href="?pagina=<?php echo $total_paginas; ?>">Final</a></li>
                    <?php } ?>
            </ul>
        </div>
        <div id="loading" class="spinner">
      <div class="spinner-inner"></div>    
    </div>
    </div>
    </div>
    </section>
  </main>
  
  <!-- Modal de registro-->
  <div class="modal fade" id="agregarmes"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light d-flex ">
                          <span class='fw-bold'>  CREAR NUEVO MES </span><button type="button" class="btn-close" id="minimizar" data-bs-dismiss="modal"></button>
                    </div>
                  <div class="modal-body" > 
                      <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" >
                            <label    for=""> <h6  class='fw-bold' style=" padding:1px">Cod. Registro</h6> <input class="form-control" id="id_meses" type="text" name="id_meses" required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" class='fw-bold' >Mes</h6>
                              <select name="mes" class="form-select md-2" id="mes" required>
                                <option value="0">Seleccione</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                              </select>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6  class='fw-bold'style=" padding:1px" >Año</h6><input  name="year"  min="2000" max="2023" autocomplete="off" type="number" class="form-control" id="year"  required > </label>
                          </div>  
                          <?php
                                 include '../../../conecta.php';    
                                 $queryp=mysqli_query($conn,"SELECT id_tiplanil,`DESC` from tiplanil");
                                 $result=mysqli_num_rows($queryp);
                           ?> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 class='fw-bold' style=" padding:1px" >Tipo Planilla</h6>
                          <select name="tiplanil" id="tiplanil" class="form-select">
                          <option value="0" > Seleccione </option>
                          <?php
                                  while($proveedor=mysqli_fetch_array($queryp) ){?>
                                 <option value="<?php echo $proveedor['id_tiplanil']; ?>"><?php echo $proveedor['DESC']; ?> </option>
                                 <?php } ?>
                            </select>
                           </div> 
              
                     
                        <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                          <label for="" class="align-content-center"> <h6 class="fw-bold" style="  padding:1px" >Fedu</h6><input  name="fedu"  autocomplete="off" type="number" class="form-control" id="fedu" value='1' disabled > </label>
                        </div>
                        <?php
                                 $querya=mysqli_query($conn,"SELECT id_modali,`DESC` from modali");
                                 $result=mysqli_num_rows($querya);
                           ?> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" class='fw-bold' >Modalidad</h6>
                          <select name="modali" id="modali" class="form-select">
                          <option value="0" > Seleccione </option>
                          <?php
                                  while($proveedor=mysqli_fetch_array($querya) ){?>
                                 <option value="<?php echo $proveedor['id_modali']; ?>"><?php echo $proveedor['DESC']; ?> </option>
                                 <?php } ?>
                            </select>
                           </div>
                           <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrar"  >Registrar </button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>   
      
      <script src="./meses.js"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src = "https://code.jquery.com/jquery-latest.min.js " type="text/javascript"></script>
<script src="../buscador/buscador.js"></script>

<?php
include_once '../Plantillas/footer.php';
?>
<script>
var openModalLinks = document.getElementsByClassName('open-modal');

for (var i = 0; i < openModalLinks.length; i++) {
    openModalLinks[i].addEventListener('click', function(event) {
        event.preventDefault(); // Evitar la acción por defecto del enlace o botón

        var id = this.getAttribute('data-id');
     

        var modalInput = document.getElementById('id_usuario' + id);
       
        modalInput.addEventListener('keyup', function(event) {
            var inputValue = modalInput.value;
            var formData = new FormData();
            formData.append('mes', id);
            formData.append('cl', inputValue);

            fetch('./Modals/boletapago/boleta.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud AJAX: ' + response.status);
                }
                return response.text();  // Obtener la respuesta como texto en lugar de JSON
            })
            .then(data => {
                if (data) {
                    var jsonData = JSON.parse(data);
                    console.log('Respuesta del servidor:', jsonData);
                    $('#NOMBRE'+id).val(jsonData.NOMBRE);
                    $('#APELLIDOS'+id).val(jsonData.APELLIDOS);
              
                } else 
                {$('#NOMBRE'+id).val("");
                  $('#APELLIDOS'+id).val("");
                    console.log('Respuesta vacía del servidor');
                }
            })
            .catch(error => {
                console.error('Error en la solicitud AJAX:', error);
            }); 
        });
    });
}
const optionsList = document.querySelectorAll('.options-list li');
const tabContents = document.querySelectorAll('.tab-content');

optionsList.forEach((option) => {
  option.addEventListener('click', () => {
    const activeTab = option.getAttribute('data-tab');

    optionsList.forEach((item) => {
      item.classList.remove('active');
    });

    tabContents.forEach((tab) => {
      tab.style.display = 'none';
    });

    option.classList.add('active');
    document.getElementById(activeTab).classList.add('active');
  });
});
</script>  