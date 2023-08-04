<?php

include '../../../../conecta.php';

if (isset($_POST['id_mes'], $_POST['dni_mes'], $_POST['mes'], $_POST['anio'], $_POST['modalidad'])&&
!empty($_POST['dni_mes']) &&
!empty($_POST['mes']) &&
!empty($_POST['anio']) &&
!empty($_POST['modalidad']))
{
    $array=array();
    $ar=array();
    $are=array();

    $id_meses=$_POST['dni_mes'];//Es lo que escribi en el modal el id del mes que quiero buscar
    $id=$_POST['id_mes'];// Es el id del mes con metodo GET osea en el URL

    $queryd="SELECT * FROM persxmes pm inner join datperso d on pm.REGISTRO=d.id_datperso where pm.REGMES='$id_meses' and pm.ESTADO NOT IN ('4', '5')";
    $resultd= mysqli_query($conn,$queryd);
    while($datos = mysqli_fetch_array($resultd))
    {
        $array[]=$datos;

    }
         foreach($array as $dato)
         {

            $a = $dato['id_datperso'];
            $b = $dato['id_areas'];
            $c = $dato['id_categori'];
            $d = $dato['CARGO'];
            $e = $dato['id_afps'];
            $f = $dato['id_estado'];
            $g = $dato['id_modali'];
            $h = $dato['REGCATENC'];
            $i = $dato['id_activi'];
            $j = $dato['id_partidas'];
            $k = $dato['CTA_CTE'];
            $l = $dato['EREFERENC'];

            $queryI ="INSERT INTO persxmes(REGISTRO, REGMES, REGAREA, REGCATE, CARGO, REG_AFP, ESTADO, REGMODALI, REGCATENC, REGACTIVI, REGPART, CTA_CTE, EREFERENC) VALUES ('$a','$id','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";
            $resultado= mysqli_query($conn,$queryI);  
            $select="SELECT * FROM reportxmes where  id_meses ='$id_meses' and REGPERSO='$a'";
            $resultados= mysqli_query($conn,$select); 
            while($evt=mysqli_fetch_array($resultados))
            {
                $ar[]=$evt;                
            }
            if (isset($ar)) {
            foreach($ar as $dat)
            {
                $a2=$dat['id_registro'];
                $a1 = $dat['id_meses'];

                $b2 = $dat['REGPERSO'];
                $c2 = $dat['CODIGO'];
                $d3 = $dat['DESCT'];
                $e4 = $dat['IMPORTE'];
                $f4 = $dat['PROPOR'];                
                $queryx ="INSERT INTO reportxmes(id_meses, REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES ('$id','$b2','$c2','$d3','$e4','$f4')";
                $resultadox= mysqli_query($conn,$queryx); 
               $id_mas="SELECT DISTINCT max(id_registro) as id_max FROM reportxmes";
               $resultadoxu= mysqli_query($conn,$id_mas);
               $fetch=mysqli_fetch_assoc($resultadoxu);
               $valor =$fetch['id_max']; 

               $selectx="SELECT * FROM formulaxmes where id_registro='$a2' and REGMES ='$id_meses' and REGPERSON='$a'";
               $resultadoxua= mysqli_query($conn,$selectx);
                   while($evt1=mysqli_fetch_array($resultadoxua))
            {
                $are[]=$evt1;                
            }
            if (isset($are)) {
            foreach($are as $bot)
            {
                $ab=$bot['id_registro'];
                $ab1=$bot['REGPERSON'];
                $ab2=$bot['REGMES'];
                $ab3=$bot['TIPO'];
                $ab4=$bot['CODIGO'];
                $ab5=$bot['DESCT'];
                $ab6=$bot['IMPORTE'];
                
                $queryx1 ="INSERT INTO formulaxmes(id_registro,REGPERSON,REGMES,TIPO,CODIGO,DESCT,IMPORTE) VALUES ('$valor','$ab1','$id','$ab3','$ab4','$ab5','$ab6')";
                $resultadoxF= mysqli_query($conn,$queryx1); 

                $update="UPDATE formulaxmes SET IMPORTE='$e4' where REGMES='$b' and REGPERSON='$ab1' and DESCT='$d3' ";
                $rep=mysqli_query($conn,$update);
            }
            unset($are);
            }
            else {}}
            unset($ar);
        }else{

        }


        }
            echo "ok"; 
 }else{
    echo "no";
 }
?>