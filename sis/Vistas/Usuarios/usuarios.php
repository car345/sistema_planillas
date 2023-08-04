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
          <li class="breadcrumb-item active">USUARIOS</li>
        </ol>
      </nav> 
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="col-sm-6"  >
             <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregarusuario" href="" id="nueva_curso" > Agregar USUARIO</button>
          </div>
          <!-- Buscador -->
          <!-- Faltaaa -->
          <!-- Tabla -->
    <div class="table-responsive"> 
          <table class="table table-bordered border-blue   table-light mt-3" >
            <tr>
              <th class="bg-primary text-white">ID</th>
              <th class="bg-primary text-white">NOMBRE</th>
              <th class="bg-primary text-white">ADMIN</th>
              <th class="bg-primary text-white">EDITAR</th>
              <th class="bg-primary text-white">ELIMINAR</th>   
            </tr>
            <?php
                 $sql_register= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM usuarios where (id_usuarios LIKE '%busqueda')");?>
                  <?php
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
                 $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM usuarios ");
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
                $query=mysqli_query($conn,"SELECT p.id_usuarios, p.NOMBRE,p.CLAVE, p.ADMIN FROM usuarios p  ORDER BY p.id_usuarios ASC LIMIT  $indice_inicio ,$por_pagina");
                $result=mysqli_num_rows($query);
                 if($result>0)
                 {
                   while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr >
                  <td ><?php echo $data['id_usuarios'];?></td>
                    <td><?php echo $data['NOMBRE'];?></td>
                    <td><?php  echo  substr($data['ADMIN'],0,$max_length="30"); ?></td>
                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#actualizarusuario<?php echo $data["id_usuarios"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                 </td>
                 <td>
                 <a class=" btn btn-danger text-center"   onclick="eliminarusuario('<?php echo $data[ "id_usuarios" ]; ?>')" >  Eliminar </a>
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
  <div class="modal fade" id="agregarusuario"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                    <span class="fw-bold">Registrar Usuario</span>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  class="row row-col-2"  id="register-form" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px; display:none;">
                            <label   for=""> <h6 style=" padding:1px">ID</h6> <input class="form-control" placeholder="id" type="text" name="id" ></label> 
                          </div>
                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">ID REGISTRO</h6> <input class="form-control" id="id_usuarios" type="text" name="id_usuarios" required></label> 
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > NOMBRE </h6><input  name="nombre_usuario"  autocomplete="off" type="text" class="form-control" id="nombre_usuario"  required > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > CONTRASEÑA</h6><input  name="clave_usuario"  autocomplete="off" type="text" class="form-control" id="clave_usuario"  required > </label>
                          </div> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                             <label for="" class="align-content-center"> <h6 style=" padding:1px" > ADMIN</h6><input  name="admin_usuario"  autocomplete="off" type="text" class="form-control" id="admin_usuario"  required > </label>
                          </div>   
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="agregar_usuario" onclick="agregarusuario();" >Registrar Nuevo Usuario</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="usuarios.js"></script>
<?php
include_once '../Plantillas/footer.php';
?>