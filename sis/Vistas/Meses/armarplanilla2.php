<?php 
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
$estado=$_GET['es'];
$cod_mes=$_GET['id'];
if($estado==1)
{
  $e='cerrado';
}else{
  $e='abierto';
}
$mesesEnEspanol = array(
  '1' => 'enero',
  '2' => 'febrero',
  '3' => 'marzo',
  '4' => 'abril',
  '5' => 'Mayo',
  '6' => 'junio',
  '7' => 'julio',
  '8' => 'agosto',
  '9' => 'SETIEMBRE',
'01' => 'enero',
  '02' => 'febrero',
  '03' => 'marzo',
  '04' => 'abril',
  '05' => 'mayo',
  '06' => 'junio',
  '07' => 'julio',
  '08' => 'agosto',
  '09' => 'Setiembre',
  '10' => 'octubre',
  '11' => 'noviembre',
  '12' => 'diciembre'
);
$sql="SELECT*FROM meses where id_meses='$cod_mes'";
$consulta=$conn->query($sql);
$fetch=mysqli_fetch_assoc($consulta);
$monthNum = $fetch['MES'];
$monthName = $mesesEnEspanol[$monthNum];

?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Armar planillas</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
            <div class="row row-2 mt-2 ml-5">
            <h4 class="fw-bold text-primary ">DATOS DE LA PLANILLA</h4>
            <hr>
             <div class="row row-2 py-1">
             <div class="form-group col-lg-2 mb-1">
            <label class="form-label mb-0 fw-bold text-dark" for="numero_documento_titular" >CÓDIGO DEL MES <span class="obligatorio">(*)</span></label>
              <input type="text" class="form-control form-control-sm" disabled value='<?php echo $cod_mes; ?>'>
            </div>
            <div class="form-group col-lg-1 mb-1">
            <label class="form-label mb-0 fw-bold text-dark"" for="numero_documento_titular">MES <span class="obligatorio">(*)</span></label>
              <input type="text" class="form-control form-control-sm" disabled value='<?php echo strtoupper($monthName); ?>'>
            </div>
            <div class="form-group col-lg-1 mb-1">
            <label class="form-label mb-0 fw-bold text-dark"" for="numero_documento_titular">AÑO<span class="obligatorio">(*)</span></label>
              <input type="text" class="form-control form-control-sm" disabled value='<?php echo $fetch['anio']; ?>'>
            </div>
            <div class="form-group col-lg-1 mb-1">
            <label class="form-label mb-0 fw-bold text-dark"" for="numero_documento_titular">ESTADO<span class="obligatorio">(*)</span></label>
              <input type="text" class="form-control form-control-sm" disabled value='<?php echo strtoupper($e); ?>'>
            </div>
          </div>
        <hr>
            <div class="row row-2">
            <?php if($estado=='0') { ?>
              <?php } else { ?>    <span class="text-primary mt-3 fw-bolder px-3">VER PLANILLA</span>  <?php } ?>

            <div class="col-auto ">
              <?php if($estado=='0') { ?>
                <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#agregararea" href="" id="nueva_curso">+ Incluir Trabajador</button>
              <?php } else { ?>  <?php } ?>
            </div>
            <div class="col-auto ms-auto">
              <?php if($estado=='0') { ?>
                <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#agregararea1" id="datos"><i class="bi bi-arrow-clockwise"></i> Recargar Planilla</button>
              <?php } else { } ?>
            </div>
          </div>

          <div id="loading" class="spinner">
      <div class="spinner-inner"></div>
    </div>
      <?php $id_mes =$_GET['id']; ?>
      <?php $tiplanil =$_GET['id']; ?>

        <div class="modal" id="agregararea1"  tabindex="-1">
              <div class="modal-dialog" style="border-radius: 10px;">
                  <div class="modal-content bg-light w-100 m-lg-3 "  >
                      <div class="modal-header bg-light  ">
                        
                            <span class="fw-bold  ">Recarga datos de planilla </span> 
                      
                            <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" >
                    <form  class="row row-col-2"  id="frm2" method="POST" action="#" enctype="multipart/form-data">
                    <div class="col-sm-6" style="display:none" >
                              <label   class="fw-bold" for=""> <h6 style=" padding:1px">CODIGO</h6> <input class="form-control" placeholder="id" id="id_mes" type="text" name="id_mes" value="<?php echo $id_mes; ?>" ></label> 
                            </div>
                    <div class="col-sm-6" >
                              <label   for=""> <span class="fw-bold" style=" padding:1px" >CÓDIGO</span> <input class="form-control" placeholder="id" id="dni_mes" type="text" name="dni_mes" ></label> 
                            </div>
                            <div class="col-sm-6" >
                              <label   for=""> <span class="fw-bold no-input " style=" padding:1px" >Mes</span> <input class="form-control no-input" placeholder="id" id="mes" type="text" name="mes"  ></label> 
                            </div>
                            <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <label for="" class="align-content-center fw-bold no-input"> <span class="fw-bold" style=" padding:1px" >AÑO</span><input  name="anio"  autocomplete="off" type="text" class="form-control no-input" id="anio" > </label>
                            </div>
                            <div class="col-sm-6" style="padding:0px 0px  0px 10px;">
                              <label  for="" class="align-content-center "> <span class="fw-bold" style=" padding:1px" >MODALIDAD</span><input   name="modalidad"  autocomplete="off" type="text" class="form-control no-input" id="modalidad"   > </label>
                            </div>  
                            <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="recargar"  >Registrar datos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
    <div class="table-responsive" > <!--table_id --> 
          <table class="table_id table table-bordered border-blue table-hover table-light mt-3" >
            <thead class="table bg-primary text-white text-center fw-bold"><!--thead -->
              <tr>
                <th class="text-center" >CODIGO</th>
                <th class="text-center">NOMBRES</th>
                <th class="text-center">APELLIDOS</th>
                <th class="text-center">AFP</th>
                <th class="text-center">AREA</th>
                <th class="text-center">CARGO</th>
                <th class="text-center">MODALIDAD</th>
                <th class="text-center">ID_CATEGORIA</th>
                <th class="text-center">CATEGORIA</th>
                <th class="text-center">IMPORTES</th>
                <?php  if($estado=='1')
            {?>  <?php }else{?> <th>ELIMINAR</th> <?php } ?>
                
              </tr>   
            </thead><!--thead -->
            <tbody><!--tbody -->
            <?php

            $columns = ['a.REGMES','a.REGISTRO','a.REGAREA','a.REGCATE','a.CARGO', 'a.REG_AFP','a.REGMODALI','p.CODIGO','p.APELLIDOS','p.id_datperso','p.NOMBRE', 'af.DESC as nombre_afps','m.DESC as nombre_modali','ar.DESC as nombre_areas','c.DESC','c.id_categori'];
            $table = 'persxmes a';
            $id = 'a.REGISTRO';

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

            $sql = "SELECT ".implode(", ", $columns) ."
            FROM $table inner join datperso p on a.REGISTRO=p.id_datperso inner join afps af on a.REG_AFP=af.id_afps inner join modali m on a.REGMODALI=m.id_modali inner join areas ar 
            on a.REGAREA=ar.id_areas inner join categori c on c.id_categori=p.id_categori where a.REGMES='$id_mes'
            $where";
            $por_pagina = 10;
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
            //$sql_register= mysqli_query($conn,$sql);
            //add
            $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM persxmes where REGMES= '$id_mes'");
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

            //add and modify
            $query=mysqli_query($conn, $sql."ORDER BY $id ASC LIMIT $indice_inicio, $por_pagina");
            $result=mysqli_num_rows($query);

            if($result>0){
            while($data=mysqli_fetch_array($query)){
            ?>
                          <tr >
                          <td  class="text-center"><?php echo $data['CODIGO'];?></td>
                            <td class="text-center"><?php echo $data['NOMBRE'];?></td>
                            <td class="text-center"><?php  echo  substr($data['APELLIDOS'],0,$max_length="30"); ?></td>
                            <td class="text-center"><?php echo $data['nombre_afps'];?></td>
                            <td class="text-center"><?php  echo  substr($data['nombre_areas'],0,$max_length="30"); ?></td>
                            <td class="text-center"><?php echo $data['CARGO'];?></td>
                            <td class="text-center"><?php echo $data['nombre_modali'];?></td>
                            <td class="text-center"><?php echo $data['id_categori'];?></td>
                            <td class="text-center"><?php echo $data['DESC'];?></td>
                            <td class="text-center"> 
                            <!-- <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#importe<?php //echo $data["REGISTRO"];?>" > <i class="fa fa-dashboard"> </i>Registrar Importe</a>    -->
                            <a  class="text-success fw-bold text-center" href="ingre_p.php?id=<?php echo $data["id_datperso"];?>&mes=<?php echo $id_mes;?>&cat=<?php echo $data['id_categori'];?>&es=<?php echo $estado; ?>"><?php  if($estado=='1')
            {?>VER<?php }else{?> Registrar Importe <?php } ?></a>
                          </td>
                          <?php  if($estado=='0')
                          {
                          ?>
                           <td>
                          <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['REGISTRO']; ?>', '<?php echo $id_mes;?>')" >  <i class="bi bi-trash text-center"></i> </a>
                          </td>
                          <?php
                          }
                          ?>
                          
                          </tr>
            <?php 
            // include './armarplanilla/ingre_planilla.php';
            }
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
            <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>id=<?php echo $cod_mes; ?>&es=<?php echo $estado; ?>&pagina=1">Anterior</a></li>
            <?php
        }

        // Lógica para ajustar el rango de enlaces numéricos según la página actual de búsqueda
        $rango_inicio = max($pagina - $enlaces_mostrados, 1);
        $rango_fin = min($pagina + $enlaces_mostrados, $total_paginas);

        for ($i = $rango_inicio; $i <= $rango_fin; $i++) {
            if ($i == $pagina) {
                echo '<li class="page-item active" aria-current="page"><a class="page-link">' . $i . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="' . $base_url .'id='.$cod_mes.'&pagina=' . $i .'&es='.$estado.'">' . $i . '</a></li>';
            }
        }

        if ($pagina != $total_paginas) {
            ?>
            <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>id=<?php echo $cod_mes;?>&pagina=<?php echo $total_paginas; ?>&es=<?php echo $estado; ?>">Siguiente</a></li>
            <?php
        }

        // Enlace para volver al paginador general sin parámetros de búsqueda
        $base_url_general = '?';
        ?>
        <li class="page-item"><a class="page-link" href="<?php echo $base_url_general; ?>id=<?php echo $cod_mes; ?>&es=<?php echo $estado; ?>">Volver al paginador general</a></li>
    </ul>
</div>
    </div>
    </div>
    </div>



    </section>
  </main>
  <div class="modal fade" id="agregararea"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    
                            <span class="fw-bold"> DATOS DEL TRABAJADOR</span> 
                     
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <h6 style=" padding:1px">id_meses</h6> <input class="form-control" placeholder="id" type="text" name="id_meses" id="id_meses" value="<?php echo $id_mes; ?>" ></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">DNI</h6> <input class="form-control" id="dni_cliente" type="text" name="dni_cliente" required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  NOMBRE</h6><input  name="NOMBRE"  autocomplete="off" type="text" class="form-control" id="NOMBRE"  required disabled > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" >  APELLIDO</h6><input  name="APELLIDOS"  autocomplete="off" type="text" class="form-control" id="APELLIDOS"  required disabled > </label>
                          </div>  
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrar"  >Incluir al Trabajador</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src = "https://code.jquery.com/jquery-latest.min.js " type="text/javascript"></script>
      <script src="./armarplanill.js"></script>
      <?php
      include_once '../Plantillas/footer.php';
      ?>