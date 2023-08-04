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
          <li class="breadcrumb-item active">FINALES</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <section class="section dashboard">
    <div class="col-sm-6"  >
             <button type="button" class="btn btn-info m-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregaraporte" href="" id="nueva_curso" > <i class="fa fa-plus"></i> Agregar Aporte</button>
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
                <th>CODIGO</th>
                <th>DESCRIPCION</th>
                <th>VALOR</th>
                <th>TRAB/EMPL</th>
                <th>CATEGORIA</th>   
                <th>TIPOCR</th>   
                <th>Editar</th>
                <th>Eliminar</th>   
              </tr>
            </thead>
            <tbody>
<?php
  $columns = ['p.id_aportes', 'p.DESCT', 'p.APORTE', 'p.TRABA_EMP', 'p.id_categori', 'p.TIPOCR'];
  $table = 'aportes p';
  $id = 'p.id_aportes';

  //$campo = isset($_POST['campo']) ? mysqli_escape_string($conexion, $_POST['campo']) : null;
  	$where = 'where (p.TIPOCR=1) ';
	if(isset($_GET['enviar'])){
    $campo = $_GET['busqueda'];
		$where .= " AND (";

		$cont = count($columns);
		for ($i=0; $i < $cont; $i++) { 
			$where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
		}
		$where = substr_replace($where, "", -3);
		$where .= " )";
    
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
                    <td><?php echo $data['DESCT'];?></td>
                    <td><?php echo $data['APORTE'];?></td>
                    <td><?php echo $data['TRABA_EMP'];?></td>
                    <td><?php  echo  $data['id_categori']; ?></td>
                    <td><?php  echo  $data['TIPOCR']; ?></td>
                    <td> 
                   <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editaraportes<?php echo $data["id_aportes"];?>" > <i class="fa fa-dashboard"> </i>Editar </a>   
                 </td>
                 <td>
                 <a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $data["id_aportes"]; ?>')" >  Eliminar </a>
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
                      <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; "> REGISTRAR APORTE</p>
                    </div>
                    <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" >
                      <form  id="frm" method="POST" action="#" enctype="multipart/form-data">
                        <div class="row row-col-2">                        
                          <input class="form-control" placeholder="id" type="hidden" name="agregaraporte" value="agregaraporte">

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
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" > ID </h6><input  name="id"  autocomplete="off" type="number" class="form-control" id="id"  required > </label>
                          </div>
                        </div>
                        <div class="row row-col-2">
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >CODIGO</h6><input  name="codigo"  autocomplete="off" type="text" class="form-control" id="codigo"  required > </label>
                          </div>
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >CODIGO CONCEPTO</h6><input  name="cc"  autocomplete="off" type="text" class="form-control" id="cc"  required > </label>
                          </div> 
                        </div>
                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >TIPO CONCEPTO REMUNERATIVO</h6><input  name="tcr"  autocomplete="off" type="text" class="form-control" id="tcr"  required > </label>
                          </div>                            
                        </div>
                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >GLOSA</h6><input  name="glosa"  autocomplete="off" type="text" class="form-control" id="glosa"  required > </label>
                          </div>                            
                        </div>
                        <div class="row row-col-1">
                          <div class="col-sm-8" style="padding:0px 0px 0px 10px;">
                            <label for="" class="align-content-center"> <h6 style=" padding:1px" >FORMULA</h6><input  name="formula"  autocomplete="off" type="text" class="form-control" id="formula"  required > </label>
                          </div>                            
                        </div>
                        <div class="row row-col-3">
                          <div class="col-sm-4" style="padding:0px 0px 0px 10px;">
                            <input type="checkbox" class="custom-control-input" name="imprimir" id="imprimir" value="" checked />
                            <label class="custom-control-label" for="defaultUnchecked">Imprimir</label>
                          </div>
                          <div class="col-sm-4" style="padding:0px 0px 0px 10px;">
                            <input type="checkbox" class="custom-control-input" name="leer" id="leer" value="" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Leer</label>
                          </div>
                          <div class="col-sm-4" style="padding:0px 0px 0px 10px;">
                            <input type="checkbox" class="custom-control-input" name="ver" id="ver" checked />
                            <label class="custom-control-label" for="defaultUnchecked">ver</label>
                          </div>                            
                        </div>
                        <div class="row row-col-3 custom-control custom-checkbox">
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="encargado" id="encargado" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Encargado</label>
                          </div>
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="auxiliar" id="auxiliar" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Auxiliar</label>
                          </div>
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="anular" id="anular" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Anular</label>
                          </div>                        
                        </div>
                        <div class="row row-col-3 custom-control custom-checkbox">
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="afecto" id="afecto" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Afecto</label>
                          </div>
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="val" id="val" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Valor Absoluto</label>
                          </div>
                          <div class="col-sm-4" >
                            <input type="checkbox" class="custom-control-input" name="init" id="init" unchecked />
                            <label class="custom-control-label" for="defaultUnchecked">Inicializa</label>
                          </div>                        
                        </div>
                        <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">
                          <div class="col-sm-8" >    
                            <label class="align-content-center"  for=""> <h6 style=" padding:1px">DETALLE</h6> <input class="form-control" id="detalle" type="text" name="detalle" value="" required></label> 
                          </div>
                        </div>
                        <div class="row row-col-1 " style="padding: 0px 0px 0px 10px;">   
                          <div class="col-sm-8" >
                            <select class="form-select" id="traba_emp" name="traba_emp">
                                <option value="1">Trabajador</option>
                                <option value="0">Empleador</option>                                                  
                            </select>
                          </div>
                        </div>
                        <div class="row row-col-2 " style="padding: 0px 0px 0px 10px;">
                          <div class="col-sm-6" >    
                              <label class="align-content-center"  for=""> <h6 style=" padding:1px">FECHA</h6> <input class="form-control" id="fecha" type="date" name="fecha"></label> 
                          </div>
                          <div class="col-sm-6" >    
                              <label class="align-content-center"  for=""> <h6 style=" padding:1px">HASTA</h6> <input class="form-control" id="fecha2" type="date" name="fecha2"></label> 
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
      <script src="./finales.js"></script>
      <script src="../buscador/buscador.js"></script>

  <?php
include_once '../Plantillas/footer.php';
?>