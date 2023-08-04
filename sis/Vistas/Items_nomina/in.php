<?php
include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>ITEMS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item active">ITEMS NÓMINA</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="col-sm-6"  >
             <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregaraporte" href="" id="nueva_curso" > <i class="fa fa-plus"></i> Agregar</button>
          </div>

<!-- Buscador-->
 <?php include '../buscador/buscador.php';?>
<!-- Buscador-->

          <!-- Faltaaa -->
          <!-- Tabla -->
    <div class="table-responsive"> 
          <table class="table table_id table-bordered border-blue table-hover table-light mt-3" >
            <thead>  
              <tr>
              <th>REGISTRO</th>
                <th>CODIGO </th>
                <th>DESCRIPCION</th>
                <th>FÓRMULA</th>
                <th>ID TIPO</th> 
                <th>TIPOS</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>   
              </tr>
            </thead>
            <tbody>
<?php
  $columns = ['p.REGISTRO', 'p.CODIGO', 'p.DESC', 'p.FORMULA', 'P.TIPO'];
  $table = 'items_no p';
  $id = 'p.REGISTRO';

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
	FROM $table
	$where";

                 $sql_registe= mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM $table $where ");
                 $result_register=mysqli_fetch_array($sql_registe);
                 $total_registro=$result_register['total_registro'];
                 $por_pagina=9;
                 if(empty($_GET['pagina'])){
                   $pagina=1;
                 }else{
                   $pagina=$_GET['pagina'];
                 }
                $desde=($pagina-1)*$por_pagina;
                $total_paginas=ceil($total_registro/$por_pagina);
                $query=mysqli_query($conn, $sql."ORDER BY $id ASC LIMIT $desde,$por_pagina");
                $result=mysqli_num_rows($query);
                 if($result>0)
                 {
                     while($data=mysqli_fetch_array($query)){
                 ?>
                  <tr >
                  <td><?php echo $data['REGISTRO']; ?></td>
                    <td><?php echo $data['CODIGO']; ?></td>
                    <td><?php echo $data['DESC'];?></td>
                    <td><?php echo $data['FORMULA'];?></td>
                    <td><?php $ic = $data['TIPO']; echo $data['TIPO'];?></td>
                    <?php
                      
                      $a="";
                       
                        if( $ic=='1'){
                          $a="Remuneraciones";
                        }else if( $ic=='2'){
                          $a="Libre";
                        }else if( $ic=='3'){
                          $a="Descuentos";
                       }else{
                        $a="Variables";
                       }
                      
                    ?>
                    <td><?php echo $a;?></td>
                    
                    
                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editar<?php echo $data["REGISTRO"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                 </td>
                 <td>
                 <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data['REGISTRO']; ?>')" >  Eliminar </a>
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
<!-- Modal de registro-->
          <div class="modal fade" id="agregaraporte"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                  <div class="modal-header bg-light  ">
                    <div class="row justify-content-md-center ">
                      <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; "> REGISTRAR</p>
                    </div>
                    <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  id="frm" method="POST" action="#" enctype="multipart/form-data">
                        <div class="row row-col-2">                        
                          

                          <div class="col-sm-6" >
                            <label   for=""> <h6 style=" padding:1px">Código</h6></label>
                            <select class="form-select" id="id_codigo" name="id_codigo" required>
                                <option value="">Seleccione</option>
                    <?php
    $sqlSL = "SELECT a.CODIGO
    FROM items_no a ";
    $querySL = mysqli_query($conn, $sqlSL."ORDER BY a.CODIGO");
    while($dataSL=mysqli_fetch_array($querySL)){
        echo '<option value="'.$dataSL["CODIGO"].'">'.$dataSL["CODIGO"].'</option>';
    }
?>
                        </select>                          
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" > ID </h6><input id="id" name="id"  autocomplete="off" type="text" class="form-control" id="id"  required > </label>
                          </div>

                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >TIPO</h6><input  id="tcr" name="tcr"  autocomplete="off" type="text" class="form-control" id="tcr"  required > </label>
                          </div>                            
                        </div>
                        
                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >DESC</h6><input id="desc"  name="desc"  autocomplete="off" type="text" class="form-control" id="glosa"  required > </label>
                          </div>                            
                        </div>

                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >FORMULA</h6><input id="formula" name="formula"  autocomplete="off" type="text" class="form-control" id="formula"  required > </label>
                          </div>                            
                        </div>
                    
                        <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">
                          <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;" type="button" id="registrar"  >Registrar Aporte</button>
                        </div>  
                      </form>
                    </div>
                </div>
              </div>
            </div>
      <script src="./dv.js"></script>
      <script src="../buscador/buscador.js"></script>

  <?php
include_once '../Plantillas/footer.php';
?>