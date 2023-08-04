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
          <li class="breadcrumb-item active">PROGRAMA</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <?php include '../buscador/buscador.php';?>
          <!-- Faltaaa -->
          <!-- Tabla -->
          <div class="container-fluid">
    <div class="row ">
    <div class="col-sm-6"  >
             <button type="button" class="btn btn-warning m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregarplanilla" href="" id="nueva_curso" ><i class="bi bi-plus-square"></i> AGREGAR PROGRAMA</button>
          </div>
          <!-- <div class="col-sm-6"  >
          <form method="post" class="form" action="./excel/programa_excel.php">
             <button type="submit" class="btn btn-success  m-3 text-white bx-pull-right"  href=""  ><i class="bi bi-file-spreadsheet"></i> GENERAR EXCEL</button>
          </form>
            </div> -->
          </div>
          </div>
          <!-- Buscador -->
          <!-- Faltaaa -->
          <!-- Tabla -->
    <div class="table-responsive"> 
          <table class="table table-bordered border-blue  table-light mt-3" >
            <tr>
              <th class="tbody_table bg-primary text-white">REGISTRO </th>
              <th class="tbody_table bg-primary text-white">CODIGO</th>
              <th class="tbody_table bg-primary text-white">DESCRIPCION</th>
              <th class="tbody_table bg-primary text-white">DIVISO</th>             
              <th class="tbody_table bg-primary text-white">EDITAR</th>
              <th class="tbody_table bg-primary text-white">ELIMINAR</th>   
            </tr>
            <?php
                $columns = ['a.id_programa','a.CODIGO', 'a.DESC','a.id_divisio'];
                $table = 'programa a';
                $id = 'a.id_programa';
                //$campo = isset($_POST['campo']) ? mysqli_escape_string($conn, $_POST['campo']) : null;
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

                $sql = "SELECT a.id_programa,a.CODIGO,a.DESC,a.id_divisio from programa a inner join divisio p on
                a.id_divisio=p.id_divisio $where";
                //$sql_register= mysqli_query($conn,$sql);
                //add
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
                $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM programa a  $where");
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
                //add and modify
                $query=mysqli_query($conn,$sql."ORDER BY a.id_programa ASC LIMIT $indice_inicio,$por_pagina");
                $result=mysqli_num_rows($query);
                 if($result>0)
                 {
                   while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr class="table-hover">
                    <td><?php echo $data['id_programa'];?></td>
                    <td><?php echo $data['CODIGO'];?></td>
                    <td><?php  echo  substr($data['DESC'],0,$max_length="30"); ?></td>
                    <td><?php echo $data['id_divisio'];?></td>
                    <td> 
                   <a class="btn btn-success" id=' <?php echo $data['id_divisio'];?>' data-bs-toggle="modal" data-bs-target="#actualizarprograma<?php echo $data["id_programa"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                    </td>
                     <td>
                     <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data["id_programa"]; ?>')" >  Eliminar </a>
                    </td>
                  </tr>
                  <?php 
                  include './Modals/modaleditar.php';
                   }
                  }
                 ?> 
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
  <div class="modal fade" id="agregarplanilla"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class='fw-bold'>Agregar Programa</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 ">
                          
                            <input class="form-control" placeholder="id" type="hidden" name="agregarplanilla" value="agregarplanilla">
                          
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">REGISTRO</h6> <input class="form-control" id="id_programa" type="text" name="id_programa" required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  CODIGO </h6><input  name="CODIGO"  autocomplete="off" type="text" class="form-control" id="CODIGO"  required > </label>
                          </div>  
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  DESCRIPCION</h6><input  name="DESCRIPCION"  autocomplete="off" type="text" class="form-control" id="DESCRIPCION"  required > </label>
                          </div>
                          <?php   
                                 $query_activi=mysqli_query($conn,"SELECT id_divisio,CODIGO from divisio");
                                 $result_activi=mysqli_num_rows($query_activi);?> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px">DIVISO</h6>
                          <select name="id_divisio" id="id_divisio" class="form-select">
                          <?php
                                 if($result_activi)
                                 { while($activi=mysqli_fetch_array($query_activi) ){?>
                                 <option value="<?php echo $activi['id_divisio']; ?>"><?php echo $activi['CODIGO']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>  
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrar"  >REGISTRAR PROGRAMA</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="./programas.js"></script>
  <?php
include_once '../Plantillas/footer.php';
?>