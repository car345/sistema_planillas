<?php
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/sis/sistema.php">Admin</a></li>
          <li class="breadcrumb-item active">Sistema Pensionario</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="container-fluid">
    <div class="row ">
    <div class="col-sm-2"  >
             <button type="button" class="btn btn-warning m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregarafps" href="" id="nueva_curso" ><i class="bi bi-plus-square"></i> AGREGAR AFPS</button>
          </div>
          <!-- <div class="col-sm-2"  >
          <form method="post" class="form" action="./excel/afps_excel.php">
             <button type="submit" class="btn btn-success  m-3 text-white bx-pull-right"  href=""  ><i class="bi bi-file-spreadsheet"></i> GENERAR EXCEL</button>
          </form>
            </div> -->
          </div>
          </div>

<!-- Buscador-->
<?php include '../buscador/buscador.php';?>
<!-- Buscador-->

          <!-- Faltaaa -->
          <!-- Tabla -->
    <div class="table-responsive"> 
          <table class="table table_id table-bordered border-blue table-hover table-light mt-3" >
            <thead><!--thead -->
              <tr>
                <th class="tbody_table bg-primary text-white">REGISTRO </th>
                <th class="tbody_table bg-primary text-white">CODIGO</th>
                <th class="tbody_table bg-primary text-white">DESC</th>
                <th class="tbody_table bg-primary text-white">BASD FEDU</th>
                <th class="tbody_table bg-primary text-white">EDITAR</th>
                <th class="tbody_table bg-primary text-white">ELIMINAR</th>   
              </tr>
              </thead><!--thead -->
              <tbody><!--tbody -->              
            <?php
  $columns = ['p.id_afps', 'p.CODIGO', 'p.DESC', 'p.COD2'];
  $table = 'afps p';
  $id = 'p.id_afps';
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

	$sql = "SELECT ".implode(", ", $columns) ."
	FROM $table
	$where";
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
   
                 $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM $table $where ");
                 $result_register = mysqli_fetch_array($sql_registe);
                 $total_registro = $result_register['total_registro'];
                 $total_paginas = ceil($total_registro / $por_pagina);
                 $indice_inicio = ($pagina - 1) * $por_pagina;
                 $indice_fin = $indice_inicio + $por_pagina;
                 
                 if ($indice_fin > $total_registro) {
                     $indice_fin = $total_registro;
                 }
                 $pagina = max(min($pagina, $total_paginas), 1);
                 
                 // Cálculo del índice de inicio y fin de los resultados en la página actual
                 $indice_inicio = ($pagina - 1) * $por_pagina;
                 $indice_fin = $indice_inicio + $por_pagina;
                 
                 if ($indice_fin > $total_registro) {
                     $indice_fin = $total_registro;
                 }
                $query=mysqli_query($conn,$sql."ORDER BY $id ASC LIMIT  $indice_inicio,$por_pagina");
                $result=mysqli_num_rows($query);
                 if($result>0)
                 {
                     while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr >
                  <td ><?php echo $data['id_afps'];?></td>
                  <td><?php echo $data['CODIGO'];?></td>
                    <td><?php echo $data['DESC'];?></td>
                    <td><?php  echo  substr($data['COD2'],0,$max_length="30"); ?></td>
                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#actualizarafps<?php echo $data["id_afps"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                 </td>
                 <td>
                 <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data["id_afps"]; ?>')" >  Eliminar </a>
                 </td>
                  </tr>
                  <?php 
                  include './Modals/modaleditar.php';
                   }
                  }
                 ?>
            </tbody><!--tbody -->                  
         </table>
         <td>
           <!-- Paginador-->
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
    </section>
  </main>
<!-- Modal de registro-->
<div class="modal fade" id="agregarafps"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold'>Agregar AFPS</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 ">
                          
                            <input class="form-control" placeholder="id" type="hidden" name="agregarafps" value="agregarafps">
                          
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID AFPS</h6> <input class="form-control" id="id_afps" type="text" name="id_afps" required></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">CODIGO</h6> <input class="form-control" id="codigo_afps" type="text" name="codigo_afps" required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  DESCRIPCION</h6><input  name="descripcion_afps"  autocomplete="off" type="text" class="form-control" id="descripcion_afps"  required > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  COD2 </h6><input  name="cod2_afps"  autocomplete="off" type="text" class="form-control" id="cod2_afps"  required > </label>
                          </div>  
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrar"  >Registrar AFPS</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="./afps.js"></script>
      <script src="../buscador/buscador.js"></script>
  <?php
include_once '../Plantillas/footer.php';
?>