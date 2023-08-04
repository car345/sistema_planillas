<?php
include '../../../../conecta.php';
if(isset($_POST)){
    $id_mes = $_POST['id'];
    $estado = $_POST['estado'];
    $user = $_POST['user'];
    $pass=$_POST['pass']; 
 
//VALIDAR CREDENCIALES
    $query = "SELECT count(*) as valid FROM usuarios WHERE NOMBRE ='$user' AND CLAVE='$pass' " ;
    $resultado = mysqli_query($conn, $query); 
    $doccs = mysqli_fetch_array($resultado);

    if($doccs['valid']==1)
    {        
        if($estado=='1'){
            $estado = 0;
            $delete=" DELETE FROM reportxplanilla where REGMES='$id_mes'";
            $sqldel=mysqli_query($conn,$delete);
            
            $query3="SELECT*FROM reportxmes where id_meses='$id_mes' ";
            $result1=mysqli_query($conn,$query3);   
            while($planillax=mysqli_fetch_assoc($result1))
            {
                $a = $planillax['id_registro'];
                $b = $planillax['id_meses'];
                $c = $planillax['REGPERSO'];
                $d = $planillax['CODIGO'];
                $e = $planillax['DESCT'];
                $f = $planillax['IMPORTE'];
                $g = $planillax['PROPOR'];
                $update="UPDATE formulaxmes SET IMPORTE='$f' where REGMES='$b' and REGPERSON='$c' and DESCT='$e' ";
                $rep=mysqli_query($conn,$update); }
        }
         else {
            $estado = 1;
            $query3="SELECT*FROM reportxmes where id_meses='$id_mes' ";
            $result1=mysqli_query($conn,$query3);
            $arr1=array();
            $ruo=array();

            $queryfetch="SELECT*FROM reportxmes where id_meses='$id_mes' ";
            $resultfetch=mysqli_query($conn,$queryfetch);
            $arr=array();
            $ms=array();
            while($planillas=mysqli_fetch_assoc($resultfetch))
            {
                $a = $planillas['id_registro'];
                $b = $planillas['id_meses'];
                $c = $planillas['REGPERSO'];
                $d = $planillas['CODIGO'];
                $e = $planillas['DESCT'];
                $f = $planillas['IMPORTE'];
                $g = $planillas['PROPOR'];
                $queryG="SELECT*FROM reportxmes where id_meses='$b' and REGPERSO='$c' and PROPOR='1'";
                $resultG = $conn->query($queryG);
                while($arregloG = $resultG->fetch_assoc())
                {
                    $ms[]=$arregloG; 
                }
                $dat=0;
                $dat2=0;
           if(isset($ms))
           {
                foreach ($ms as $k) {
                  if($k['DESCT']=='meses')
                  {
                    $dat=(double)$k['IMPORTE'];
                  }
                  if($k ['DESCT']=='mesesbase')
                  {
                    $dat2=(double)$k['IMPORTE'];
                  }
                }
                }
                unset($ms);
                if($dat==0 || $dat2==0 ||  $dat==0.00 ||$dat2==0.00 )
                {
                }else if( $dat >0 || $dat2>0){ 
                    $upst=$dat/$dat2;
                    $updateR="UPDATE formulaxmes SET IMPORTE='$upst' where REGMES ='$b' and REGPERSON='$c' and DESCT='Factor' ";

                    $reupt= $conn->query($updateR);
                }
                
                $query5="SELECT*FROM formulaxmes where REGMES='$b' and REGPERSON='$c' and id_registro='$a'";
                $result3 = $conn->query($query5);	
                $record=mysqli_num_rows($result3);
                while($arreglo = $result3->fetch_assoc())
                {
                    $arr[]=$arreglo; 
                }
                $first=0;
                $caso=0;
                $dato=1;
                $mas=0;
                $rem=0;
                $x=0;
                $t=0;

                if($record>0)
                {
                // $upd="UPDATE formulaxmes set  where id_registro='$a' and REGMES='$b' and REGPERSON='$c'";
              

                    foreach($arr as $item)
                    {

                        if($item['TIPO']=="MULTIPLICAR")
                        {
                            if($item['DESCT']=='sindu037'){

                                if($item['IMPORTE']=='1'||$item['IMPORTE']=='1.00')
                                {
                                    $dato=(float)$dato*0;
                                    $modal='MULTIPLICAR';
                                }
                                else{
                                    $dato=(float)$dato*(float)$item['IMPORTE'];
                                    $modal='MULTIPLICAR'; 
                                }
   
                            }else{
                                $dato=(float)$dato*(float)$item['IMPORTE'];
                                $modal='MULTIPLICAR';
                            }

                        }
                        if($item['TIPO']=="SUMA")
                        {
                            
                            $mas= (double)$mas+(double)$item['IMPORTE'];   
                            $modal='SUMA';
                        }
                        $x++;

                        if($record==$x){
                            if( (double)$mas > 0 )
                            {
                                $ret=$f*$dato + (double)$mas; 
                            }else{

                                $ret=$f*$dato;
                           
                           
                            }
                            $ret=round($ret,2);
                      
                            $update="UPDATE formulaxmes SET IMPORTE='$ret' where REGMES='$b' and REGPERSON='$c' and DESCT='$e' ";
                            $rep=mysqli_query($conn,$update);
                        }
                    }
                  
                    if($planillas['DESCT']=="cbonoesp")
                    {
                        $first=$mas;
                        $caso=(double)$first+1;
                        $update="UPDATE formulaxmes SET IMPORTE='$mas' where REGMES='$b' and REGPERSON='$c' and DESCT='cbonoesp' ";
                        $rep=mysqli_query($conn,$update);
                        
                    }else if($planillas['DESCT']=="DU090-96")
                    {
                        $rem=round($mas*$f,2);
                        if($rem==0)
                        {
                            $caso=1;
                        }
                        $update="UPDATE formulaxmes SET IMPORTE='$rem' where REGMES='$b' and REGPERSON='$c' and DESCT='DU090-96' ";
                        $rep=mysqli_query($conn,$update);
                        
                    }  
                    if($planillas['DESCT']=="DS051-91")
                    {
                    $ret=round($f*$dato+$mas,2); 
                    $query4="INSERT INTO  reportxplanilla(id_registro,REGMES,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES('$a','$b','$c','$d','$e','$ret','$g')";
                    $result2=mysqli_query($conn,$query4);
                    }else{
                    if($planillas['DESCT']=="DU073-97")
                    {
                        $rem=round($mas*$f,2);
                        if($rem==0)
                        {
                            $caso=1;
                        }
                        $update="UPDATE formulaxmes SET IMPORTE='$rem' where REGMES='$b' and REGPERSON='$c' and DESCT='DU073-97'";
                        $rep=mysqli_query($conn,$update);
                    } 
                    if($planillas['DESCT']=="DU011-99")
                    {
                        $rem=round($mas*$f,2);
                        if($rem==0)
                        {
                            $caso=1;
                        } 
                    } 
                    if($mas > 0 )
                    {
                        $ret=round($f*$dato*$mas,2); 
                    }else{
                        if($caso==1)
                        {
                            $ret=0;
                        }else{
                            $ret=round($f*$dato,2);
                        }
                        
                    }  
                     $query4="INSERT INTO  reportxplanilla(id_registro,REGMES,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES('$a','$b','$c','$d','$e','$ret','$g')";
                     $result2=mysqli_query($conn,$query4);
                     
                   
                        if($planillas['DESCT'] =='BON.FAMILI')
                        {
                         $select="SELECT IMPORTE FROM reportxmes where id_meses='$b' and REGPERSO='$c' and DESCT ='Familia'";
                         $querys=$conn->query($select);
                         $sfe=$querys->fetch_assoc();
                         $dats=(int)$sfe['IMPORTE'];
                        
                         if($dats==1||$dats=='1.00'||$dats=='1'||$dats===1)
                         {
                          
                         }else if($dats=='2' || $dats==2|| $dats>1){
                            $s=0;
                            $update="UPDATE formulaxmes SET IMPORTE='$s' where REGMES='$b' and REGPERSON='$c' and DESCT='BON.FAMILI' ";
                            $rep=mysqli_query($conn,$update); 
                            $updates="UPDATE reportxplanilla SET IMPORTE='$s' where REGMES='$b' and REGPERSO='$c' and DESCT='BON.FAMILI' ";
                            $reps=mysqli_query($conn,$updates);
                            $ret=$f; 
                         }
 
                        }
                    }       
                        unset($arr);
                }else
                {
                    $query4="INSERT INTO  reportxplanilla(id_registro,REGMES,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES('$a','$b','$c','$d','$e','$f','$g')";
                    $result2=mysqli_query($conn,$query4);
                }   

                $id_maxis="SELECT DISTINCT MAX(CODIGO) as codigos FROM renumeraciones ";
                $sql_mxs=mysqli_query($conn,$id_maxis);
                $sql_fetch_mxs=mysqli_fetch_assoc($sql_mxs);

                if($d==$sql_fetch_mxs['codigos'])
                {
                    $id_max="SELECT MAX(id_planilla) as id_max FROM reportxplanilla";
                    $sql_id=$conn->query($id_max);
                    $max_id=$sql_id->fetch_assoc();
                    $maxdate=$max_id['id_max'];
                    $base=(double)$maxdate+1;

                    $sum="SELECT SUM(IMPORTE) as suma FROM reportxplanilla where REGMES='$b' and REGPERSO='$c' and PROPOR='0' AND DESCT NOT IN ('cbonoesp','ESCOLARIDA','DS 276-91') ";
                    $mysqli=$conn->query($sum);
                    $price=$mysqli->fetch_assoc();

                    $prices= round(round((double)$price['suma'],2)*0.04,2);
                    $datinsert="INSERT INTO  reportxplanilla(id_registro,REGMES,REGPERSO,CODIGO,DESCT,IMPORTE,PROPOR) VALUES('$base','$b','$c','2401','Enf.ESSAL','$prices','2')";
                    $queryc=mysqli_query($conn,$datinsert);
                   $fe="SELECT DISTINCT *FROM formulaxmes where REGMES='$b' and REGPERSON='$c' AND DESCT='Factor'";
                   $vasql=mysqli_query($conn,$fe);
                   $vse=mysqli_fetch_assoc($vasql);
                    $variable=round((double)$vse['IMPORTE'],2);
                    $updatere=mysqli_query($conn,"UPDATE reportxplanilla SET IMPORTE=' $variable' where REGMES='$b' and REGPERSO='$c' AND DESCT='Factor'");
                  
                 $upst=0;
                }
            }    
        }
        $query2="UPDATE meses SET ESTADO='$estado' where id_meses='$id_mes'"; 
        $result= mysqli_query($conn,$query2); 
        echo "ok";
    }
    else{
        echo "<script> alert('Contraseña incorrecta'); </script>";
        echo "ERROR";
    }
}

?>