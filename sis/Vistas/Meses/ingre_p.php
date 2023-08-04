<?php 
//Aquí se encuentra la tabla dinámica con su respectivo id para reconocerlo en el script table.js

include '../../../conecta.php';
include_once '../Plantillas/encabezado.php';
$total=0.00;
$totald=0.00;
$totaldmike=0.00;
$datk=0.00;
$descvar=0.00;
  $id_user=$_GET['id'];
  $mes =$_GET['mes'];
  $cat =$_GET['cat'];

?>

<main id="main" class="main">


<div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Importes</li>
        </ol>
      </nav>
    </div><!-- Fin Titulo -->
    <div class="card">
            <div class="card-body">
            <h4 class="fw-bold text-primary mt-3 ">VALORES CONSTANTES</h4>
            <hr>
    <div class="row row-cols-3">
      <?php    $sql_person = "SELECT d.CODIGO ,af.DESC as afps, ar.DESC as areas, ca.DESC as categoria,d.NOMBRE,d.APELLIDOS,d.CARGO FROM datperso d inner join afps af on d.id_afps=af.id_afps inner join categori ca on d.id_categori=ca.id_categori inner join areas ar on d.id_areas=ar.id_areas where id_datperso='$id_user'";
             $sql_pers=mysqli_query($conn,$sql_person); 
             $G= mysqli_fetch_assoc($sql_pers);
             ?>
        <div class="col-sm-2">
            <label class="fw-bold "for=""> CODIGO </label>
            <input  style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['CODIGO']; ?>"></label>
            </div>
            <div class="col-sm-4 ">
            <label class="fw-bold "for="">NOMBRE</label><input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['NOMBRE']; ?>">
            </div>
            <div class="col-sm-5 ">
            APELLIDOS<input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['APELLIDOS']; ?>">
            </div>
            <div class="col-sm-4 ">
            CARGO<input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['CARGO']; ?>">
            </div>
            <div class="col-sm-5 ">
            AREA<input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['areas']; ?>">
            </div>
            <div class="col-sm-5 ">
            AFPS<input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['afps']; ?>">
            </div>
            <div class="col-sm-5 ">
            CATEGORIA<input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['categoria']; ?>">
            </div>
                 </div>
    <div class="row row-2 ">
    <div class="col-sm-6  mt-2 py-2"  >
        <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"  data-bs-target="#importes1" href="" id="importes"><i class="bi bi-plus-circle"></i>VARIABLES</button>
      </div>
    <div class="col-sm-6"  >

        <!-- <button type="button" class="btn btn-info my-3 text-white " data-bs-toggle="modal"  data-bs-target="#agregarImporte" href="" id="nuevo_importe" > <i class="bi bi-plus-circle"></i> Agregar Importe</button> -->
      </div>
     
      </div>
      <div class="modal fade bd-example-modal-lg" id="importes1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
   <label class="fw-bold text-primary">VARIABLES</label>
    <button type="button" class="btn-close bg-light" id="minimizar" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-3">
        <table  id="data_table1" class="table table-bordered table-responsive">
                  <thead class="table-dark">
                    <tr> 
                      <td> CODIGO </td>
                      <td> DESCRIPCIÓN </td>
                      <td> IMPORTE </td>
                      <td> AFECTO </td>
                    </tr>
                  </thead>
                          <?php    
                          $queryH = "SELECT count(*) as vals FROM reportxmes re WHERE re.REGPERSO = '$id_user' and re.id_meses = '$mes' and re.PROPOR ='1'" ;
                          $evento = mysqli_query($conn,$queryH) or die("database error:". mysqli_error($conn));;
                          $evento1 = mysqli_fetch_array($evento);
                          $next1 = "SELECT * from aportes a where a.PROPOR='0' AND a.TIPOCR='0' AND a.id_categori='0' ORDER BY CODIGO";
                          $next2=mysqli_query($conn,$next1)or die("database error:". mysqli_error($conn));
                          $helps ="SELECT*FROM reportxmes re  where re.id_meses='$mes' and re.REGPERSO = '$id_user' and (re.PROPOR= '1' or re.PROPOR='2') ";
                          $result_helps=mysqli_query($conn,$helps);
                          if($evento1['vals']==0){
                          while($record = mysqli_fetch_assoc($next2) ) {                    
                            $a1 = $record['REGISTRO'];
                            $b1 = $record['APORTE'];
                            $c1 = $record['CODIGO'];
                            $d1 = $record['DESCT'];
                            $e1 = $record['AFECTO'];
                            $f1 = $record['id_categori'];
                            $queryU = "INSERT INTO reportxmes(id_meses,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES ('$mes','$id_user','$c1','$d1','$b1','1')";
                            $resultU = mysqli_query($conn, $queryU) or die("database error:". mysqli_error($conn));
                             
                          }
                            }else{
                              while($planillaT=mysqli_fetch_assoc($result_helps))
                            {
                             ?>
                             <tr>
                              <?php if($planillaT['DESCT']=='sobrevive' )
                              {
                                 }else{
                                ?>
                             <td><?php echo $planillaT['id_registro']; ?></td>
                             <td><?php echo $planillaT['CODIGO']; ?></td>
                             <td><?php echo $planillaT['DESCT']; ?></td>
                             <td ><?php 
                       echo  number_format((double)$planillaT['IMPORTE'],2)
                             ?></td>
                             <td><?php echo 'trabajador'; ?></td>
                             <?php 
                              } 
                             }
                             }?>
               </table>           
                  </div>
                </div>
              </div>
            </div>
          </div>
  <?php error_reporting(E_ALL);
  ini_set("display_errors", 1);
 $dato_estado = "SELECT *FROM meses where id_meses='$mes'";
                $imp= mysqli_query($conn, $dato_estado); 
                $des=mysqli_fetch_assoc($imp);?>
            <table id="data_table" class="table table-sm table-bordered table-hover">
              <thead class=" " >
                <tr>
                  <th class="bg-dark text-white text-center">REGISTRO</th> 
                  <th class="bg-dark text-white text-center">CODIGO</th>
                  <th class="bg-dark text-white text-center">DESCRIPCION</th>
                  <th class="bg-dark text-white text-center">IMPORTE</th>
                 
                  <?php if($des['ESTADO']=='0')
                  {
                    ?>
                  
                  <?php   }else{
                    ?>
                     <th class="bg-dark text-white text-center">AFECTO</th>
                    <?php   }
                    ?>
                 
                  <th style="display:none;"  class="bg-dark text-white text-center"> <input type="text" id='month3' value="<?php echo $id_user; ?>" </th>
             
                  
                  <!-- <th class="bg-dark text-white text-center">ELIMINAR</th> -->
                </tr>
              </thead>
              <tbody>
              <?php
                $rec3=array();
                // $sql_query = "SELECT a.REGISTRO, a.CODIGO, a.DESCT, a.APORTE, a.AFECTO FROM aportes a inner join persxmes pm on a.REGAFP = pm.REG_AFP or a.id_categori = pm.REGCATE where pm.REGISTRO = '$id' and pm.REGMES = '$mes'";
                $query = "SELECT count(*) as valid FROM reportxmes re WHERE re.REGPERSO = '$id_user' and re.id_meses = '$mes' and re.PROPOR='0' " ;
                $resultados = mysqli_query($conn, $query); 
                $doccs = mysqli_fetch_array($resultados);


                $sql_query = "SELECT * from renumeraciones a where id_categori='$cat' ORDER BY CODIGO";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                while($aportes = mysqli_fetch_assoc($resultset) ) {       
                  $rec3[]=$aportes;  
                 }

                $p = "SELECT *FROM renumeraciones where id_categori='$cat' ORDER BY CODIGO ";
                $dont=array();
                $pquery=mysqli_query($conn, $p);
                
              
                if($doccs['valid']==0){
                 
                    foreach($rec3 as $aportes ) 
                    { 
                    $a =$aportes['id_registro'];
                    $b = $aportes['APORTE'];
                    $c = $aportes['CODIGO'];
                    $d = $aportes['DESCT'];
                    $f = $aportes['id_categori'];
                    
                    $queryI = "INSERT INTO reportxmes(id_meses,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES ('$mes','$id_user','$c','$d','$b','0')";
                    $resultI = mysqli_query($conn, $queryI);

                  
                    $evt="SELECT MAX(id_registro) AS id_max FROM reportxmes";
                    $resevt=mysqli_query($conn,$evt);

                    $assoc=mysqli_fetch_assoc($resevt);
                    $assocY=$assoc['id_max'];
                 
                    $insert="SELECT * FROM renxformula where id_registro='$a' ";
                    $insertY=$conn->query($insert);
                    $record=mysqli_num_rows($insertY);
                    while($arreglo = $insertY->fetch_assoc())
                    {
                        $dont[]=$arreglo;
                      
                    } 
                    
          if($record>0){
            foreach($dont as $item)
                              {
                                $pa=$item['TIPO'];
                                $pb=$item['CODIGO'];
                                $pc=$item['DESCT'];
                                $pd=$item['IMPORTE'];

                                $registerY="INSERT INTO formulaxmes(id_registro,REGMES,REGPERSON,TIPO,CODIGO,DESCT,IMPORTE) VALUES ('$assocY','$mes','$id_user','$pa','$pb','$pc','$pd')";
                                $sql_registrar=$conn->query($registerY);;
                              }

            }
            unset($dont);
            
            if(mysqli_num_rows($pquery) >0)
                    {  
                    }
                    else{
                      $queryx="INSERT INTO renumeraciones (CODIGO, DESCT,APORTE,id_categori) VALUES ('$c','$d','$b','$cat')";
                      $resultX = mysqli_query($conn, $queryx) or die("database error:". mysqli_error($conn));
                    }       
                   
                    echo "<script> window.location.reload() </script>";
                  }

                }else{ 
                  if($des['ESTADO']=='0')
                  { 
                    $sqlplanitemp = "SELECT p.REGPERSO,p.IMPORTE,p.DESCT,p.CODIGO,p.id_registro  FROM reportxmes p WHERE p.REGPERSO = '$id_user' and p.id_meses = '$mes' and p.PROPOR='0'  ORDER BY CODIGO ";
                    $resultp = mysqli_query($conn, $sqlplanitemp) or die("database error:". mysqli_error($conn));
                while($planillaT = mysqli_fetch_array($resultp) ) {
                  if($planillaT['CODIGO']=='10081' || $planillaT['CODIGO']=='10082'|| $planillaT['CODIGO']=='10083' 
                  || $planillaT['CODIGO']=='10084'|| $planillaT['CODIGO']=='10085'|| $planillaT['CODIGO']=='10089'||
                   $planillaT['CODIGO']=='10280'|| $planillaT['CODIGO']=='10281'|| $planillaT['CODIGO']=='10282'|| 
                   $planillaT['CODIGO']=='10283'||$planillaT['CODIGO']=='1001'||$planillaT['CODIGO']=='1002'||$planillaT['CODIGO']=='1005'||$planillaT['CODIGO']=='1007'||$planillaT['CODIGO']=='1008'||$planillaT['CODIGO']=='1016'){
?>

<?php  
                  }else{
 
            ?>
                <tr>
                  <td><?php echo $planillaT['id_registro']; ?></td>
                  <td class="text-center"><?php echo $planillaT['CODIGO']; ?></td>
                  <td class="text-center"><?php echo $planillaT['DESCT']; ?></td>
                  <td class="text-center"><?php echo $planillaT ['IMPORTE'] ?></td>

                  <?php   
                  }
                  if ($des['ESTADO']=='0') 
                  {
                    ?>
                  <!-- <td class="text-center" ><a class=" btn btn-danger text-center"   onclick="eliminar('<?php echo $planillaT['id_registro']; ?>')" > <i class="bi bi-trash"></i> </a></td> -->
                  <?php  } ?>
                </tr>

                <?php
                 $dato = (double)$planillaT['IMPORTE'];

                 $total= $total+$dato;
                 include './formula.php';    
              }
              
                } 
                $sql_mostrar = "SELECT *FROM aportes where CODIGO='2401'";
                $imprimir= mysqli_query($conn, $sql_mostrar); 
                $descu=mysqli_fetch_assoc($imprimir);
              }
                if ($des['ESTADO']=='1')
                {
                   $dtplanilla="SELECT p.REGPERSO,p.IMPORTE,p.DESCT,p.CODIGO,p.id_registro  FROM reportxplanilla p WHERE p.REGPERSO = '$id_user' and p.REGMES = '$mes' and p.PROPOR='0'";
                   $resplanail=mysqli_query($conn,$dtplanilla);

                   while($planillas = mysqli_fetch_array($resplanail) ) {
                ?>
                <tr>
                  <?php if($planillas['IMPORTE']>0)
                  {?>
                <td><?php echo $planillas ['id_registro']; ?></td>
                  <td class="text-center"><?php echo $planillas ['CODIGO']; ?></td>
                  <td class="text-center"><?php echo $planillas ['DESCT']; ?></td>
                  <td class="text-center"><?php 
                  $nota=(double)$planillas['IMPORTE'];
                  echo number_format(round($nota,2),2);?></td>
                  <td class="text-center"><?php  echo 'trabajador'; ?></td>
                  <?php 
                  if($planillas['DESCT']=="DS 276-91"||$planillas['DESCT']=="ESCOLARIDA")
                  {
                    $mike= $nota;
                    $totaldmike=$totaldmike+$mike;
                    $totaldmike=round($totaldmike,2);
                  }

                  if($planillas['DESCT']=="cbonoesp"|| $planillas['DESCT']=="AFECTO"||$planillas['DESCT']=="Enf.ESSAL" )
                  {

                  }else{
                    $cold = $nota;
  
                    $totald= $totald+round($cold,2);
                    $totald=round($totald,2);
                  }
                }
                } 
              ?> 
                </tr>
                <tr class="bg-success text-white fw-bold">
                <td  class="text-center" ><span>Sasdas</span></td>
                <td  class="text-center"><span>1999</span></td>
                <td  class="text-center  "><span>TOTAL:</span></td>
                <td class="text-center"><span><?php echo $totald ?></span></td>
                <td  class="text-center"><span>trabajador</span></td>
              </tr>
              <tr class="">
                <td  class="text-center" ><span>ESSALUD</span></td>
                <td  class="text-center"><span>2999</span></td>
                <td  class="text-center  "><span>Enf.ESSAL</span></td>
                <td class="text-center"><span><?php
          
                $essalud=($totald-$totaldmike)*0.04; echo round($essalud,2); ?></span></td>
                <td  class="text-center"><span>trabajador</span></td>
              </tr>
          <tr  class="bg-ligth">
                <?php $descuento="SELECT*FROM reportxmes where id_meses='$mes' and REGPERSO='$id_user' and PROPOR='2'" ;
                      $descmysql=mysqli_query($conn,$descuento);
                      while($desct=mysqli_fetch_assoc($descmysql))
                      {      
                ?>
                <td  class="text-center"><span><?php echo $desct['id_registro']; ?></span></td>
              <td  class="text-center"><span><?php echo $desct['CODIGO']; ?></span></td>
                <td  class="text-center"><span><?php echo $desct['DESCT']; ?></span></td>
           
                <td class="text-center"><span><?php echo number_format(round((double)$desct['IMPORTE'],2),2); ?></span></td>
                <td  class="text-center"><span>trabajador</span></td>
              </tr >
  
              <?php
              
             $descvar= $descvar + round((double)$desct['IMPORTE'],2);
            } ?> 
            <tr class="bg-primary text-white fw-bold">
            <td  class="text-center" ><span>ESSALUD</span></td>
            <td  class="text-center"><span>3999</span></td>
            <td  class="text-center  "><span>TOTAL DESC:</span></td>
            <td class="text-center"><span><?php $totdesc3=$descvar+$essalud; echo round($totdesc3,2); ?></span></td>
            <td  class="text-center"><span>trabajador</span></td>
          </tr>
              <tr  class="bg-warning  fw-bold"> 
              <td  class="text-center"><span>NETO</span></td>
                <td  class="text-center"><span>4999</span></td>
                <td  class="text-center"><span>NETO</span></td>
                <td class="text-center"><span><?php $neto =  $totald -$descvar - $essalud; echo round($neto,2); ?></span></td>
                <td  class="text-center"><span>trabajador</span></td>
              </tr>
      <?php }?>

              </tbody>
    
            </table>
            </div>
          </div>   
  <!-- Modal de registro-->
  <div class="modal fade" id="agregarImporte"  tabindex="-1">
            <div class="modal-dialog" style="border-radius: 10px;">
                <div class="modal-content bg-light w-100 m-lg-3 "  >
                    <div class="modal-header bg-light  ">
                        <div class="row justify-content-md-center ">
                            <p class=" text-center text-black p-3 m-lg-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:2.5em; ">Nuevo</p>
                      </div>
                          <button type="button" class="btn-close bg-light" id="minimizar" data-dismiss="modal"></button>
                  </div>
                  <div class="modal-body" > 
                      <form  class="row row-col-2"  id="frm" method="POST" action="#" enctype="multipart/form-data">
                          <div class="row row-col-2 " style="padding:px 40px 10px 10px;">
                          <?php
                                 include '../../../conecta.php';    
                                 $categori =$_GET['cat'];
                                 $que = mysqli_query($conn,"SELECT id_registro, DESCT,CODIGO  from renumeraciones where id_categori='$categori'  order by CODIGO");
                           ?> 
                          <div class="col-sm-6" style="padding:0px 0px 0px 10px;">
                              <h6 style=" padding:1px" >Aporte</h6>
                          <select name="aport" id="aport" class="form-select">
                          <option value="0" > Seleccione </option>
                          <?php
                                  while($aports=mysqli_fetch_array($que) ){?>
                                 <option value="<?php echo $aports['id_registro']; ?>"><?php echo  $aports['CODIGO'].' '.$aports['DESCT']; ?> </option>
                                 <?php } ?>
                            </select>
                           </div> 

                           <div class="col-sm-6" >
                            <label   for="" style="display:none"><input class="form-control" id="id_mes" type="text" name="id_mes" value="<?php echo $mes; ?>" required></label> 
                          </div>
                          <div class="col-sm-6" style="display:none">
                            <label   for=""><input class="form-control" id="id_persona" type="text" name="id_persona" value="<?php echo $id_user; ?>"  required></label> 
                          </div>
                          <br><hr>                                                
                           <button class=" btn px-3 btn-primary btn  mt-3" style="position:relative;left: 7px;"    type="button" id="registrarImporte"  >Registrar Importe</button>
                          <div>
                          <div><button   type="button" style="display:none" id="boton1"></button></div>
                          </div>  
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="./importe.js"></script>
      <script src="./table.js"></script>
      <script src="./table2.js"></script>

  <?php


include_once '../Plantillas/footer2.php';
?>

