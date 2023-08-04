<?php
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
$array=array();
// $res=mysqli_query($conn,"SELECT DISTINCT id_categori FROM renumeraciones ORDER BY id_categori");

// while($rest=$res->fetch_assoc())
// {
//  $array[]=$rest;
// }
// foreach($array as $mod)
// {
//   $categori=$mod['id_categori'];
//   $insert=mysqli_query($conn,"INSERT INTO renumeraciones(CODIGO,DESCT,APORTE,id_categori) VALUES ('1040','PEN.CESAN','0.00','$categori')");

// }
?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>REMUNERACIONES</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/sis/sistema.php">Admin</a></li>
          <li class="breadcrumb-item active">Remuneriaciones</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="row row-3">

   
    <div class="col-sm-4"  >
             <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregaraporte" href="" id="nueva_curso" > <i class="fa fa-plus"></i> REGISTRAR VARIABLE DE RENUMERACION </button>
          </div>
          <div class="col-sm-3"  >
             <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregar" href=""    > <i class="fa fa-plus"></i>REGISTRAR RENUMERACION </button>
          </div>
          <div class="col-sm-3"  >
          <button type="button" class="btn btn-danger m-3 text-white " data-bs-toggle="modal"  data-bs-target="#eliminar" href=""    > <i class="fa fa-plus"></i>ELIMINAR RENUMERACION </button>
            <!-- <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['id_registro']; ?>')" >  El iminar Codigo</a> -->
            </div>


          <div class="modal fade" id="agregar"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                  <div class="modal-header bg-light  ">
                    <div class="row justify-content-md-center ">
                      <span class="fw-bold"> REGISTRAR</span> 
                    </div>
                    <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <form  id="frms" method="POST" action="#" enctype="multipart/form-data">
                    
                <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID CATEGORIA</h6></label>
                            <select name="id_categoria" class="form-select" id="id_categoria" required>
                  <option value="null">Seleccione</option>
                  <?php
                  $sqlSL = "SELECT *
                  FROM categori p ";
                  $querySL = mysqli_query($conn, $sqlSL."ORDER BY p.id_categori ASC");
                  while($dataSL=mysqli_fetch_array($querySL)){
                      echo '<option value="'.$dataSL["id_categori"].'">'.$dataSL["DESC"].'</option>';
                  }
                   ?>
                   </select>                          
                          </div>
                          <div class="col-md-6" >
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;" type="button" id="registrarse"  >Registrar Renumeracion</button> </div>
                          </form>
                        </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="eliminar"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                  <div class="modal-header bg-light  ">
                    <div class="row justify-content-md-center ">
                      <span class="fw-bold"> ELIMINAR</span> 
                    </div>
                    <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                  <form  id="frms1" method="POST" action="#" enctype="multipart/form-data">
                    
  <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID CATEGORIA</h6></label>
                            <select name="eliminar_codigo" class="form-select" id="eliminar_codigo" required>
                  <option value="null">Seleccione</option>
                  <?php
                  $sqlSL = "SELECT DISTINCT CODIGO,DESCT FROM renumeraciones WHERE CODIGO NOT IN ('10280') ORDER BY CODIGO";
                  $querySL = mysqli_query($conn, $sqlSL);
                  while($dataSL=mysqli_fetch_array($querySL)){
                      echo '<option value="'.$dataSL["CODIGO"].'">'.$dataSL["CODIGO"].'  '.$dataSL["DESCT"].'</option>';
                  }
                   ?>
                   </select>                          
                          </div>
                          <div class="col-md-6" >
                          <button class=" btn px-3 btn-danger btn  mt-3" style="position:relative;left: 7px;" type="button" id="deletes"  >ELIMINAR CODIGO</button> </div>
                          </form>



                          <form  id="frms2" method="POST" action="#" enctype="multipart/form-data">
                    
                    <div class="col-sm-6" >
                                              <label   for=""> <h6 style=" padding:1px">ID CATEGORIA</h6></label>
                                              <select name="id_categoria_eliminar" class="form-select" id="id_categoria_eliminar" required>
                                    <option value="null">Seleccione</option>
                                    <?php
                                    $sqlSL = "SELECT *
                                    FROM categori p ";
                                    $querySL = mysqli_query($conn, $sqlSL."ORDER BY p.id_categori ASC");
                                    while($dataSL=mysqli_fetch_array($querySL)){
                                        echo '<option value="'.$dataSL["id_categori"].'">'.$dataSL["DESC"].'</option>';
                                    }
                                     ?>
                                     </select>                          
                                            </div>
                                            <div class="col-md-6" >
                                            <button class=" btn px-3 btn-danger btn  mt-3" style="position:relative;left: 7px;" type="button" id="deletear"  >ELIMINAR RENUMERACION</button> </div>
                                            </form>

                        </div>
                </div>
              </div>
            </div>
          </div>
<!-- Buscador-->
 <?php include '../buscador/buscador.php';
?>

    <div class="table-responsive"> 
          <table class="table table_id table-bordered border-blue table-hover table-light mt-3" >
            <thead class='table-primary'>  
              <tr>
                <th>REGISTRO</th>
                <th>CODIGO</th>
                <th>CODIGO CONCEPTO</th>   
                <th>DESCRIPCION</th>
                <th>VALOR</th>
                <th>TRAB/EMPL</th>
                <th>CATEGORÍA</th>  
                <th>DETALLE</th> 
                <th>FORMULA</th>   
                <th>EDITAR</th>   
              </tr>
            </thead>
            <tbody>
<?php
  $columns = ['p.id_registro', 'p.CODIGO', 'p.DESCT', 'p.APORTE','p.DETALLE','p.id_categori','r.DESC'];
  $table = 'renumeraciones p';
  $id = 'p.id_registro';

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
		$where .= ")"; 	
	}

	$sql = "SELECT *
	FROM $table inner join categori r  on r.id_categori=p.id_categori $where";

$por_pagina = 14;
if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$where = '';
if (isset($_GET['enviar'])) {
    $campo = $_GET['busqueda'];
    $where = "WHERE (";
    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM $table inner join categori r on r.id_categori=p.id_categori $where");
$result_register = mysqli_fetch_array($sql_registe);
$total_registro = $result_register['total_registro'];
$total_paginas = ceil($total_registro / $por_pagina);

// Asegúrate de que el número de página actual esté dentro del rango válido
$pagina = max(min($pagina, $total_paginas), 1);

// Cálculo del índice de inicio y fin de los resultados en la página actual
$indice_inicio = ($pagina - 1) * $por_pagina;
$indice_fin = $indice_inicio + $por_pagina;

if ($indice_fin > $total_registro) {
    $indice_fin = $total_registro;
}

$query = mysqli_query($conn, $sql . "ORDER BY r.DESC ASC, p.CODIGO  ASC LIMIT  $indice_inicio, $por_pagina");
$result = mysqli_num_rows($query);
                 if($result>0)
                 {
                     while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr >
                    <td><?php echo $data['id_registro']; ?></td>
                    <td><?php echo $data['CODIGO']; ?></td>
                    <td><?php echo $data['CODIGOSIAF']; ?></td>
                    <td><?php echo $data['DESCT'];?></td>
                    <td><?php echo $data['APORTE'];?></td>
                  
                    <td><?php $ic = $data['id_categori']; echo 'trabajador'; ?></td>
                    <?php
                    $nombreCategoria = "";
                       $sqlSL = "SELECT *
                       FROM categori p where id_categori =$ic ";
                       $querySL = mysqli_query($conn, $sqlSL);
                       
                       while($dataSL=mysqli_fetch_array($querySL)){
                        $nombreCategoria = $dataSL["DESC"];
                       }
                    ?>
                    <td><?php  echo  $nombreCategoria; ?></td>
                    <td><?php echo $data['DETALLE'];?></td>
                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#formula<?php echo $data["id_registro"];?>" > <i class="fa fa-dashboard"> </i>Formula </a>   
                 </td>

                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editaraportes<?php echo $data["id_registro"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                 </td>
                
                  </tr>
                  <?php 
                  include './Modals/modaleditar.php';
                  include './formula.php';
                   }
                  }
                 ?> 
         </table>
         <td>
           <!-- Paginador-->
  <!-- Paginador -->
<div aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        // Cantidad de enlaces numéricos a mostrar antes y después de la página actual
        $enlaces_mostrados = 2;

        // Construir la URL base del paginador
        $base_url = '?';

        // Obtener los parámetros de búsqueda existentes, si los hay
        $parametros_busqueda = array();

        if (isset($_GET['enviar']) && isset($_GET['busqueda'])) {
            $parametros_busqueda['enviar'] = $_GET['enviar'];
            $parametros_busqueda['busqueda'] = $_GET['busqueda'];
        }

        // Agregar los parámetros de búsqueda a la URL base
        $base_url .= http_build_query($parametros_busqueda) . '&';

        if ($pagina != 1) {
            ?>
            <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>pagina=1">Anterior</a></li>
            <?php
        }

        // Lógica para ajustar el rango de enlaces numéricos según la página actual de búsqueda
        $rango_inicio = max($pagina - $enlaces_mostrados, 1);
        $rango_fin = min($pagina + $enlaces_mostrados, $total_paginas);

        for ($i = $rango_inicio; $i <= $rango_fin; $i++) {
            if ($i == $pagina) {
                echo '<li class="page-item active" aria-current="page"><a class="page-link">' . $i . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="' . $base_url . 'pagina=' . $i . '">' . $i . '</a></li>';
            }
        }

        if ($pagina != $total_paginas) {
            ?>
            <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>pagina=<?php echo $total_paginas; ?>">Siguiente</a></li>
            <?php
        }

        // Enlace para volver al paginador general sin parámetros de búsqueda
        $base_url_general = '?';
        ?>
        <li class="page-item"><a class="page-link" href="<?php echo $base_url_general; ?>">Volver al paginador general</a></li>
    </ul>
</div>

</div>
</div>

</div>
    </div>
    </section>
  </main>
<!-- Modal de registro-->
          <div class="modal fade" id="agregaraporte"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                  <div class="modal-header bg-light  ">
                    <div class="row justify-content-md-center ">
                      <span class="fw-bold"> REGISTRAR</span> 
                    </div>
                    <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  id="frm" method="POST" action="#" enctype="multipart/form-data">
                        <div class="row row-col-2">                        
                          <input class="form-control" placeholder="id" type="hidden" name="agregaraporte" value="agregaraporte">

                          <!-- <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID CATEGORIA</h6></label>
                            <select name="id_categoria" class="form-select" id="id_categoria" required>
                                <option value="null">Seleccione</option>
                    <?php
    $sqlSL = "SELECT *
    FROM categori p ";
    $querySL = mysqli_query($conn, $sqlSL."ORDER BY p.id_categori ASC");
    while($dataSL=mysqli_fetch_array($querySL)){
        echo '<option value="'.$dataSL["id_categori"].'">'.$dataSL["DESC"].'</option>';
    }
?>
                            </select>                          
                          </div> -->
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                        <label for="" class="align-content-center"><h6 style=" padding:1px" >CODIGO</h6><input  name="id"  autocomplete="off" type="text" class="form-control" id="id"  required > </label>
                        </div> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >CODIGO CONCEPTO</h6><input  name="cc"  autocomplete="off" type="text" class="form-control" id="cc"  required > </label>
                          </div> 
                       

             
                        <label for="" class="align-content-center"><h6 style=" padding:1px" >DESCRIPCIÓN</h6><input  name="glosa"  autocomplete="off" type="text" class="form-control" id="glosa"  required > </label>
                        

                            
                            <label class="align-content-center"  for=""> <h6 style=" padding:1px">DETALLE</h6> <textarea  class="form-control "id="detalle" type="text" name="detalle" id="" cols="60" rows="10"></textarea></label> 
                        
 
                        <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;" type="button" id="registrar"  >Registrar Aporte</button>
                        </div>  
                      </form>
                    </div>
                </div>
              </div>
            </div>

 

      <script src="./remu.js"></script>
      <script src="../buscador/buscador.js"></script>

  <?php
include_once '../Plantillas/footer.php';
?>