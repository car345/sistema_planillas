<?php 
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';

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
      <div class="col-sm-6"  >
        <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregararea" href="" id="nueva_curso" > Incluir Trabajador</button>
          <button>t</button>
      </div>

<!-- Buscador-->
<?php include '../buscador/buscador.php';?>
<!-- Buscador-->
<?php $id_mes =$_GET['id']; ?>
<?php $tiplanil =$_GET['id']; ?>
          <!-- Faltaaa -->
          <!-- Tabla -->
    <div class="table-responsive" > <!--table_id --> 
          <table class="table_id table table-bordered border-blue table-hover table-light mt-3" >
            <thead><!--thead -->
              <tr>
                <th>CODIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>AFP</th>
                <th>AREA</th>
                <th>CARGO</th>
                <th>MODALIDAD</th>
                <th>IMPORTES</th>
                <th>ELIMINAR</th>
              </tr>   
            </thead><!--thead -->
            <tbody><!--tbody -->
            <?php

            $columns = ['a.id_meses','a.id_trabajador','a.codigo_datperso','a.id_meses','a.id_importe','p.CODIGO','p.APELLIDOS','p.NOMBRE','p.id_afps','p.cargo','p.id_categori','p.id_areas','af.DESC','ar.DESC as nombre_areas'];
            $table = 'in_trab a';
            $id = 'a.id_trabajador';

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
            FROM $table inner join datperso p on a.codigo_datperso=p.CODIGO inner join afps af on p.id_afps=af.id_afps
            inner join areas ar on p.id_areas=ar.id_areas where a.id_meses='$id_mes'  
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
            //$sql_register= mysqli_query($conn,$sql);
            //add
            $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM in_trab a $where");
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
            //add and modify
            $query=mysqli_query($conn, $sql."ORDER BY $id ASC LIMIT $desde,$por_pagina");
            $result=mysqli_num_rows($query);

            if($result>0){
            while($data=mysqli_fetch_array($query)){
            ?>
                          <tr >
                          <td ><?php echo $data['CODIGO'];?></td>
                            <td><?php echo $data['NOMBRE'];?></td>
                            <td><?php  echo  substr($data['APELLIDOS'],0,$max_length="30"); ?></td>
                            <td><?php echo $data['DESC'];?></td>
                            <td><?php  echo  substr($data['nombre_areas'],0,$max_length="30"); ?></td>
                            <td><?php echo $data['cargo'];?></td>
                            <td><?php echo $data['id_categori'];?></td>
                            <td> 
                            <!-- <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#importe<?php //echo $data["id_trabajador"];?>" > <i class="fa fa-dashboard"> </i>Registrar Importe</a>    -->
                            <a href="ingre_p.php?id=<?php echo $data["id_trabajador"];?>">Registrar Importe</a>
                          </td>
                          <td>
                          <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['id_trabajador']; ?>')" >  Sacar Trabajador </a>
                          </td>
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
        <div class="paginador" >
            <ul style="padding:15px; list-style:none;background:#fff;margin-top:15px;  display:-webkit-flex; display:-moz-flex; display:-ms-flex; display:-o-flex;display:flex;background-color: #f8f9fa;">
                <?php
                    if($pagina != 1)
                    {
                    ?>
                    <li ><a style="color:#428bca; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;" href="?pagina=<?php echo 1; ?>"><</a></li>
                    <li><a style="color:#428bca; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;" href="?pagina=<?php echo $pagina-1;?>"><<</a></li>
                    <?php
                }
                for($i=1; $i<= $total_paginas; $i++)
                {
                if($i==$pagina)
                {
                    echo '<li style="color:#666; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;"  class="pageSelected">'.$i.'</li>';
                }
                else{
                    echo '<li> <a style="color:#666; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;"  href="?pagina='.$i.'">'.$i.'</a></li>';
                }
                }
                if($pagina != $total_paginas)
                {
                ?>
                    <li><a style="color:#666; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;" href="?pagina=<?php echo $pagina +1;?>">>></a></li>
                    <li><a style="color:#666; border: 1px solid #ddd; padding:5px; display:inline-block;font-size:14px; text-align:center; width:35px;"  href="?pagina=<?php echo $total_paginas; ?>">></a></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
    </section>
  </main>
  <div class="modal fade" id="agregararea"  tabindex="-1">
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