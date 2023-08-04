<?php
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
?>


<main id="main" class="main">
    <div class="pagetitle">
      <h1>DATOS PERSONALES </h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/sis/sistema.php">Admin</a></li>
          <li class="breadcrumb-item active">DATOS PERSONALES</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="card">
            <div class="card-body">
            <h4 class="fw-bold text-primary mt-2 ">TRABAJADORES</h4>
            <hr>
      <div class="row">
    <div class="col-sm-3  mt-2"  >
             <button type="button" class="btn btn-outline-primary  " data-bs-toggle="modal"  data-bs-target="#agregardatperso" href=""  > <i class='bi bi-plus'></i> Agregar Datos Personales</button>
          </div>
          <!-- <div class="col-sm-3 "  >
             <button type="button" class="btn btn-warning m-3  text-white " data-bs-toggle="modal"  data-bs-target="#reportes" href=""  > Reportes </button>
          </div>
          <div class="col-sm-2">
          <form method="post" class="form" action="./excel/areas_excel.php">
             <button type="submit" class="btn btn-success  m-3  text-white bx-pull-right"  href=""><i class="bi bi-file-spreadsheet"></i> GENERAR EXCEL</button> -->
          </form>


            </div>
           
            <hr>
            <?php include '../buscador/buscador.php';?>
           
  
          <!-- Buscador-->
      

<!-- Buscador--> 
          <!-- Faltaaa -->
          <!-- Tabla -->

    <div class="table-responsive  "> 
          <table class="table_id table table-bordered border-blue table-hover " >
            <thead class="table bg-primary">
            <tr>
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">ID</th>
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">CODIGO PLAZA</th>
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">CODIGO</th>
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">NOMBRE</th>
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">A PATERNO</th> 
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">A MATERNO</th> 
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white">SIS PENSION </th>
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">AREA</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">CARGO</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">CLASE</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">SEXO</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">DOCUMENTO</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">FECHA NAC</th>   
              <th style="font-size:13px;" class="tbody_table fw-bold text-white">ESTADO</th>   
              <th style="font-size:13px;"class="tbody_table fw-bold text-white">EDITAR</th>     
              <th  style="font-size:13px;"class="tbody_table fw-bold text-white"> ELIMINAR </th>                      
            </tr>
            </thead>
            <tbody>            
                  <?php
                  $columns = ['p.id_datperso', 'p.CODIGO', 'p.APELLIDOS', 'p.NOMBRE', 'p.APATERNO', 'p.AMATERNO', 
                  'p.id_afps', 'p.id_areas', 'p.id_areas','id_docide', 'p.id_partidas','p.id_activi','p.CARGO', 'p.id_modali', 'p.SEXO', 
                  'p.FECHA_NACI', 'p.id_estado','p.CODIGO_IPS','p.CODIGO_AFP','p.CTA_CTE','p.FECHA_ING','p.FECHA_CESE','p.CODPLAZA'];
                  $table = 'datperso p';
                  $id = 'p.id_datperso';

                  $where = '';
                  if(isset($_GET['enviar'])){
                  $campo = $_GET['busqueda'];
                  $where = "WHERE (";

                  $cont = count($columns);
                  for ($i=0; $i < $cont; $i++) { 
                     $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
                  }
                  $where = substr_replace($where, "", -3 );
                  $where .= ")"; 	
                  }

                  $sql = "SELECT ".implode(", ", $columns) ." ,r.DESCR
                  FROM $table inner join estado r on p.id_estado=r.id_estado
                  $where";  
            
                 $por_pagina = 20;
                 if (empty($_GET['pagina'])) {
                     $pagina = 1;
                 } else {
                     $pagina = $_GET['pagina'];
                 }
                 $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM $table $where ");
                 $result_register=mysqli_fetch_array($sql_registe);
                 $total_registro=$result_register['total_registro'];
                 $total_paginas = ceil($total_registro / $por_pagina);

// Asegúrate de que el número de página actual esté dentro del rango válido
                  $pagina = max(min($pagina, $total_paginas), 1);

                  // Cálculo del índice de inicio y fin de los resultados en la página actual
                  $indice_inicio = ($pagina - 1) * $por_pagina;
                  $indice_fin = $indice_inicio + $por_pagina;


                  if ($indice_fin > $total_registro) {
                     $indice_fin = $total_registro;
                 }
                $query=mysqli_query($conn,$sql."ORDER BY $id ASC LIMIT  $indice_inicio, $por_pagina");
                $result=mysqli_num_rows($query);
                 if($result>0)
                 {
                   while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr >
                  <?php
                  if($data['DESCR']=="ANULACION TEMPORAL")
                  {
                  ?>
                    <td style=" background-color: #ffa500; font-size:12px; " class="fw-bold"><?php echo $data['id_datperso'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['CODPLAZA'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['CODIGO'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php  echo  substr($data['NOMBRE'],0,$max_length="30"); ?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['APATERNO'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['AMATERNO'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['id_afps'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['id_areas'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['CARGO'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['id_modali'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['SEXO'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['id_docide'];?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php  echo  substr($data['FECHA_NACI'],0,$max_length="10"); ?></td>
                    <td style=" background-color: #ffa500;font-size:12px; " class="fw-bold"><?php echo $data['DESCR'];?></td>
                  <?php
                   } 
                   else{
                  ?>
                   <td style="font-size:12px; " class="fw-bold" ><?php echo $data['id_datperso'];?></td>
                   <td style=" font-size:12px; " class="fw-bold"><?php echo $data['CODPLAZA'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['CODIGO'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php  echo  substr($data['NOMBRE'],0,$max_length="30"); ?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['APATERNO'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['AMATERNO'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['id_afps'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['id_areas'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['CARGO'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['id_modali'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['SEXO'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['id_docide'];?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php  echo  substr($data['FECHA_NACI'],0,$max_length="10"); ?></td>
                    <td style="font-size:12px; " class="fw-bold" ><?php echo $data['DESCR'];?></td>
                      <?php
                   }
                  ?>
                    <td> 
                        <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#actualizardatperso<?php echo $data['id_datperso'];?>" > <i class="bi bi-pencil-square"> </i> </a>   
                    </td>
                    <td>
                        <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['id_datperso']; ?>')" > <i class="bi bi-trash3">   </i> </a>
                    </td>
                  </tr>
                  <?php 
                  include './Modals/modaleditar.php';
                   }
                  }
                 ?> 
          </tbody> 
        </table>
         <td>
           <!-- Paginador-->
           <div aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        if ($pagina != 1) {
            ?>
            <li class="page-item"><a class="page-link" href="?pagina=1<?php if (isset($campo)) { echo '&busqueda=' . $campo; } ?>">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina - 1; ?><?php if (isset($campo)) { echo '&busqueda=' . $campo; } ?>">Siguiente</a></li>
            <?php
        }
        for ($i = 1; $i <= $total_paginas; $i++) {
            if ($i == $pagina) {
                echo '<li class="page-item active" aria-current="page"><a class="page-link">' . $i . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '';
                if (isset($campo)) { echo '&busqueda=' . $campo; }
                echo '">' . $i . '</a></li>';
            }
        }
        if ($pagina != $total_paginas) {
            ?>
            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1; ?><?php if (isset($campo)) { echo '&busqueda=' . $campo; } ?>">Siguiente</a></li>
            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?><?php if (isset($campo)) { echo '&busqueda=' . $campo; } ?>">Final</a></li>
            <?php
        }
        ?>
    </ul>
</div>
</div>
</div>

    </section>
  </main>



  <div class="modal fade" id="reportes" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3  "  >
                    <div class="modal-header bg-light  ">
                        <div class="row justify-content-md-center ">
                            <p class=" text-center text-black p-3  m-lg-3 " style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:1.5em; justify-content:center;"> REPORTES DATOS PERSONALES</p>
                      </div>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
              
                     <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                     <div class="col-sm-6" >
                     <button  class="btn btn-success  m-3  text-white  " onclick="modalidad()" href=""><i class="bi bi-file-spreadsheet"></i> ReportexModalidad</button>
                     </div>
                     <div class="col-sm-6" >
                     <button  class="btn btn-success  m-3  text-white  " onclick="afps()" href=""><i class="bi bi-file-spreadsheet"></i>ReportexAfps</button>
                     </div>
                     <div class="col-sm-6" >
                     <button  class="btn btn-success  m-3  text-white  "  onclick="datperso()" type="submit" href=""><i class="bi bi-file-spreadsheet"></i> Datos Personales</button>
                     </div>
                     </div>
              </div>
          </div>
      </div> 
      </div> 
  <!-- Modal de registro-->
  <div class="modal fade" id="agregardatperso" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog  modal-lg">
                <div class="modal-content  "  >
                <div class="modal-header  ">
                     <span class="fw-bold">AGREGAR DATOS DE PERSONA</span>
                          <button type="button" class="btn-close " id="minimizar" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body" >
                        <form  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row" >
                          <div class="col-sm-3 " style="display:none;">
                             <span class="fw-bold" >id</span>
                            <input class="form-control" placeholder="id" type="text" name="id" >
                          </div>
                          <div class="col-sm-3 " >
                             <span  class="fw-bold">CÓDIGO PLAZA</span> 
                             <input class="form-control" id="CODIGO_PLAZA" type="text" name="CODIGO_PLAZA" required> 
                          </div>
                          <div class="col-sm-3 " >
                             <span  class="fw-bold">CÓDIGO</span> <input class="form-control" id="CODIGO" type="text" name="CODIGO" required> 
                          </div>
                          <div class="col-sm-6" >
                             <span  class="fw-bold">NOMBRES</span> <input class="form-control" id="NOMBRE" type="text" name="NOMBRE" required> 
                          </div>
                          <div class="col-sm-6" >
                              <span class="fw-bold"  > APELLIDOS </span><input  name="APELLIDOS"  autocomplete="off" type="text" class="form-control" id="APELLIDOS"  required > 
                          </div>
                          <div class="col-sm-3 " >
                              <span  class="fw-bold" > A. PATERNO</span><input  name="APATERNO"  autocomplete="off" type="text" class="form-control" id="APATERNO"  required > 
                          </div>  
                          <div class="col-sm-3 " >
                              <span class="fw-bold"  > A. MATERNO</span><input  name="AMATERNO"  autocomplete="off" type="text" class="form-control" id="AMATERNO"  required > 
                          </div>    
                          <div class="col-sm-6" ">
                              <span class="fw-bold"  >TIPO DOCUMENTO</span>
                          <select name="tipdoc" id="tipdoc" class="form-select multiple" selected="" >
                          <?php

                                 $query_d=mysqli_query($conn,"SELECT REGISTRO, SIGLA from docide ");
                                 $result_d=mysqli_num_rows($query_d);   
 ?> 
                          
                           <?php
                       if($result_d)
                       { while($d=mysqli_fetch_array($query_d) ){?>
                       <option value="<?php echo $d['REGISTRO'] ;?>" ><?php echo $d['SIGLA']; ?> </option>
                       <?php }}?>
                            </select>
                           </div>
            
                          <div class="col-sm-6" >
                              <span  class="fw-bold" >N° DOCUMENTO</span><input  name="NUMERO_DOC"  autocomplete="off" type="text" class="form-control" id="NUMERO_DOC"  required > 
                          </div>   
                          <div class="col-sm-6" >
                              <span  class="fw-bold" > FECHA DE NAC</span><input  name="FECHA_NACI"  autocomplete="off" type="date" class="form-control" id="FECHA_NACI"  required > 
                          </div>  
                          <div class="col-sm-6" >
                              <span  class="fw-bold" > SEXO </span>
                             <select name="SEXO" id="SEXO" class="form-select">
                           <option value="1">
                              MASCULINO
                           </option>
                           <option value="2">
                              FEMENINO
                           </option>
                            </select>
                          </div>
                          <div class="col-sm-6" >
                              <span class="fw-bold"  > ESTADO </span>
                             <select name="estado" id="estado" class="form-select">
                           <option value="1">
                              NORMAL
                           </option>
                           <option value="2">
                              LICENCIA SALUD
                           </option>
                           <option value="3R" >
                              SIN GOSE DE HABER
                           </option>
                           <option value="4">
                              ANULACION TEMPORAL
                           </option>
                           <option value="5"    >
                              SUSPENSION
                           </option>
                           <option value="6">
                              CESE
                           </option>
                            </select>
                          </div>
                  
                          <?php
                                 include '../../../conecta.php';    
                                 $query_modalidad=mysqli_query($conn,"SELECT id_modali,`DESC` from modali");
                                 $result_modalidad=mysqli_num_rows($query_modalidad);
                           ?> 
                          <div class="col-sm-6" >
                              <span  class="fw-bold"  >MODALIDAD</span>
                          <select name="modalidad" id="modalidad" class="form-select">
                          <?php
                                 if($result_modalidad)
                                 { while($proveedor=mysqli_fetch_array($query_modalidad) ){?>
                                 <option value="<?php echo $proveedor['id_modali']; ?>"><?php echo $proveedor['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>
                           <div class="wrapper">
                           <div class="divider div-transparent"></div>
                           </div>
                          <div class="col-sm-6" >
                              <span  class="fw-bold"  >CARGO </span><input  name="CARGO"  autocomplete="off" type="text" class="form-control" id="CARGO"  required > 
                          </div>  
                             <?php
                                 $query_areas=mysqli_query($conn,"SELECT id_areas,`DESC` from areas");
                                 $result_areas=mysqli_num_rows($query_areas);
                           ?> 
                          <div class="col-sm-6" >
                              <span  class="fw-bold"> AREA</span>
                          <select name="AREA" id="AREA" class="form-select">
                          <?php
                                 if($result_areas)
                                 {
                                 while($area=mysqli_fetch_array($query_areas) )
                                 {
                                 ?>
                                 <option value="<?php echo $area['id_areas']; ?>"><?php echo $area['DESC']; ?>
                                 </option>
                                 <?php
                                    }
                                 }
                                 ?>
                            </select>
                           </div>
                               <?php   
                                 $query_categoria=mysqli_query($conn,"SELECT id_categori,`DESC` from categori");
                                 $result_categoria=mysqli_num_rows($query_categoria);?> 
                          <div class="col-sm-6" >
                              <span class="fw-bold" >CATEGORIA</span>
                          <select name="categoria" id="categoria" class="form-select">
                          <?php
                                 if($result_categoria)
                                 { while($categoria=mysqli_fetch_array($query_categoria) ){?>
                                 <option value="<?php echo $categoria['id_categori']; ?>"><?php echo $categoria['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>
                           <?php   
                                 $query_afps=mysqli_query($conn,"SELECT id_afps,`DESC` from afps");
                                 $result_afps=mysqli_num_rows($query_afps);?> 
                          <div class="col-sm-6" >
                              <span class="fw-bold">SISTEMA PENSIONARIO</span>
                          <select name="afps" id="afps" class="form-select">
                          <?php
                                 if($result_afps)
                                 { while($afps=mysqli_fetch_array($query_afps) ){?>
                                 <option value="<?php echo $afps['id_afps']; ?>"><?php echo $afps['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div> 
                          <div class="col-sm-6" >
                              <span class="fw-bold" > COD IPSSS</span><input  name="CODIGO_IPS"  autocomplete="off" type="text" class="form-control" id="CODIGO_IPS"  required > 
                          </div>  
                          <div class="col-sm-6" >
                              <span class="fw-bold" > CODIGO AFP</span><input  name="CODIGO_AFP"  autocomplete="off" type="text" class="form-control" id="CODIGO_AFP"  required > 
                          </div>  
                          <div class="col-sm-6" >
                              <span class="fw-bold" > FECHA ING</span><input  name="FECHA_ING"  autocomplete="off" type="date" class="form-control" id="FECHA_ING"  required > 
                          </div>  
                          <div class="col-sm-6" >
                              <span class="fw-bold"   > FECHA FALLECIDO</span><input  name="FECHA_CESE"  autocomplete="off" type="date" class="form-control" id="FECHA_CESE"  required > 
                          </div>  
                          <div class="col-sm-6" >
                              <span class="fw-bold"  > CTA CTE</span><input  name="CTA_CTE"  autocomplete="off" type="text" class="form-control" id="CTA_CTE"  required > 
                          </div>  
                          <?php   
                                 $query_activi=mysqli_query($conn,"SELECT REGISTRO,`DESC` from activi");
                                 $result_activi=mysqli_num_rows($query_activi);?> 
                          <div class="col-sm-6" >
                              <span  class="fw-bold">ACTIVIDAD</span>
                          <select name="id_activi" id="id_activi" class="form-select">
                          <?php
                                 if($result_activi)
                                 { while($activi=mysqli_fetch_array($query_activi) ){?>
                                 <option value="<?php echo $activi['REGISTRO']; ?>"><?php echo $activi['DESC']; ?> </option>
                                 <?php }} ?>
                            </select>
                           </div>  
                          <?php   
                                 $query_partida=mysqli_query($conn,"SELECT REGISTRO,NOMBRE from partidas");
                                 $result_partida=mysqli_num_rows($query_partida);?> 
 
                          <button class=" btn px-3  btn-primary btn  mt-3 "     type="button" id="registrar" >Registrar Datos Persona</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div> 
      <script src="./datperson.js"></script>
<?php
include_once '../Plantillas/footer.php';
?>